<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Italia</title>
</head>
<body>
    <h1>Italia</h1>
    <?php 
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
            $query1 = "SELECT id, nome, zona FROM regioni";
			//eseguo la query
			$risultato1 = $mydb->query($query1);
            if($risultato1->num_rows > 0){  
				//ciclo i risultati, cioè l'elenco delle mamme presenti nel database
				while($regioni = $risultato1->fetch_assoc()){
					//per ogni mamma stampo il nome 
					echo "<h2>".$regioni["nome"]." ".$regioni["zona"]."</h3>";
				
					//per ogni mamma devo prelevare i figli.
					//compongo la query sostituendo l'id della mamma corrente ad ogni iterazione del ciclo,
					//in modo da estrarre ogni volta solo i figli della mamma corretta
					$query2="SELECT nome, abitanti, fkRegione 
							FROM citta 
							WHERE fkRegione = ".$regioni["id"];
					//eseguo la seconda query
					$risultato2 = $mydb->query($query2);
					//verifico se ci sono dei risultati, altrimenti stampo che la mamma non ha figli associati
					if($risultato2->num_rows > 0){  
						//ci sono dei risultati, quindi inizio ad impostare la tabella
						echo "<table>";
						echo "<tr><td>Nome</td><td>Abitanti</td><td>Regione</td></tr>";
						//stampo le singole righe della tabella
						while($citta = $risultato2->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$citta["nome"]."</td>";
							echo "<td>".$citta["abitanti"]."</td>";
							echo "<td>".$citta["fkRegione"]."</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
				}
			}
			else{
				echo "<p>Non ci sono cose nel database.</p>";
			}
    ?>
</body>
</html>