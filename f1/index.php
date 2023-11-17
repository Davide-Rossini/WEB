<?php
// Includi il file di configurazione
require_once('config.php');

// Connessione al database
$connessione = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);

// Verifica della connessione
if ($connessione->connect_error) {
    die("Connessione al database fallita: " . $connessione->connect_error);
}

// Query per la classifica dei piloti che hanno vinto almeno una gara
$queryPiloti = "SELECT pilota.nome, pilota.cognome, COUNT(partecipa.fkPilota) AS vittorie
                FROM pilota
                INNER JOIN partecipa ON pilota.id = partecipa.fkPilota
                WHERE partecipa.posizione = 1
                GROUP BY pilota.id
                HAVING vittorie > 0
                ORDER BY vittorie DESC";
$resultPiloti = $connessione->query($queryPiloti);

// Query per la classifica delle scuderie che hanno vinto almeno una gara
$queryScuderie = "SELECT scuderia.nome, COUNT(partecipa.fkPilota) AS vittorie
                  FROM scuderia
                  INNER JOIN pilota ON scuderia.id = pilota.fkScuderia
                  INNER JOIN partecipa ON pilota.id = partecipa.fkPilota
                  WHERE partecipa.posizione = 1
                  GROUP BY scuderia.id
                  HAVING vittorie > 0
                  ORDER BY vittorie DESC";
$resultScuderie = $connessione->query($queryScuderie);

// Query per la classifica dei piloti che hanno vinto almeno 3 gare
$queryPilotiTreVittorie = "SELECT pilota.nome, pilota.cognome, COUNT(partecipa.fkPilota) AS vittorie
                           FROM pilota
                           INNER JOIN partecipa ON pilota.id = partecipa.fkPilota
                           WHERE partecipa.posizione = 1
                           GROUP BY pilota.id
                           HAVING vittorie >= 3
                           ORDER BY pilota.nome ASC";
$resultPilotiTreVittorie = $connessione->query($queryPilotiTreVittorie);

$queryScuderieIntroiti = "SELECT scuderia.nome, SUM(sponsorizza.importo) AS introiti
                          FROM scuderia
                          INNER JOIN sponsorizza ON scuderia.id = sponsorizza.fkScuderia
                          GROUP BY scuderia.id
                          ORDER BY introiti DESC";
$resultScuderieIntroiti = $connessione->query($queryScuderieIntroiti);

// Chiudi la connessione al database
$connessione->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiche Formula 1</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4; /* Light background color */
            margin: 20px;
        }

        h1 {
            color: #2c3e50; /* Dark blue color for heading */
            border-bottom: 2px solid #2c3e50; /* Border color */
            padding-bottom: 5px;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: colorChange 1s ease-in-out, fadeIn 1s ease-in-out;
        }

        @keyframes colorChange {
            from {
                color: #3498db; /* Light blue color, similar to your initial color */
            }

            to {
                color: #2c3e50; /* Dark blue color */
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            animation: fadeIn 1s ease-in-out;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2c3e50; /* Dark blue color for header */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #34495e; /* Darker blue color on hover */
            color: #fff;
        }

        ul {
            list-style-type: none;
            padding: 0;
            animation: fadeIn 1s ease-in-out;
        }

        li {
            margin-bottom: 5px;
            background-color: #2c3e50; /* Dark blue color */
            color: #fff;
            padding: 8px;
            border-radius: 4px;
        }

        .no-data {
            color: #777;
        }
    </style>
</head>
<body>

    <h1>Classifica Piloti</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Vittorie</th>
        </tr>
        <?php while ($row = $resultPiloti->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cognome']; ?></td>
                <td><?php echo $row['vittorie']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Classifica Scuderie</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Vittorie</th>
        </tr>
        <?php while ($row = $resultScuderie->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['vittorie']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Piloti con almeno 3 vittorie</h1>
    <ul>
        <?php while ($row = $resultPilotiTreVittorie->fetch_assoc()): ?>
            <li><?php echo $row['nome'] . ' ' . $row['cognome']; ?></li>
        <?php endwhile; ?>
    </ul>

    <h1>Scuderie in ordine di introiti dagli sponsor</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Introiti</th>
        </tr>
        <?php
        // Verifica se $resultScuderieIntroiti contiene dati prima di eseguire il ciclo
        if ($resultScuderieIntroiti && $resultScuderieIntroiti->num_rows > 0) {
            while ($row = $resultScuderieIntroiti->fetch_assoc()):
        ?>
                <tr>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['introiti']; ?></td>
                </tr>
        <?php
            endwhile;
        } else {
            // Messaggio nel caso in cui non ci siano dati
            echo "<tr><td colspan='2' class='no-data'>Nessun dato disponibile</td></tr>";
        }
        ?>
    </table>

</body>
</html>
