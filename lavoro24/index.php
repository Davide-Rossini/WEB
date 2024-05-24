<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gioco dell'Impiccato</title>
    <h2>Gioco dell'Impiccato</h2>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(90deg, #4b6cb7, #182848);
        color: #fff;
        text-align: center;
        padding: 50px;
    }
    h2 {
        font-size: 2em;
        margin-bottom: 20px;
    }
    input[type="text"], input[type="password"], input[type="submit"] {
        padding: 10px;
        font-size: 16px;
        margin: 10px;
        width: 80%;
        border: none;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #28a745;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #218838;
    }
    form {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        display: inline-block;
    }
    a {
        color: #fff;
        text-decoration: none;
        margin-top: 20px;
        display: inline-block;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>
    
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "impiccato";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];


$result = $conn->query("SELECT punteggio FROM punteggi WHERE user_id = $user_id");
$punteggio = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $punteggio = $row['punteggio'];
} else {
    $conn->query("INSERT INTO punteggi (user_id, punteggio) VALUES ($user_id, 0)");
}

if (!isset($_SESSION['parola'])) {
    $result = $conn->query("SELECT parola FROM parole ORDER BY RAND() LIMIT 1");
    $row = $result->fetch_assoc();
    $_SESSION['parola'] = $row['parola'];
    $_SESSION['tentativi'] = 6;
    $_SESSION['lettere_indovinate'] = [];
    $_SESSION['lettere_sbagliate'] = [];
}

$parola = $_SESSION['parola'];
$tentativi = $_SESSION['tentativi'];
$lettere_indovinate = $_SESSION['lettere_indovinate'];
$lettere_sbagliate = $_SESSION['lettere_sbagliate'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lettera = $_POST['lettera'];
    if (in_array($lettera, $lettere_indovinate) || in_array($lettera, $lettere_sbagliate)) {
        echo "Hai già inserito questa lettera.";
    } else if (strpos($parola, $lettera) !== false) {
        $lettere_indovinate[] = $lettera;
    } else {
        $lettere_sbagliate[] = $lettera;
        $tentativi--;
    }
    $_SESSION['lettere_indovinate'] = $lettere_indovinate;
    $_SESSION['lettere_sbagliate'] = $lettere_sbagliate;
    $_SESSION['tentativi'] = $tentativi;
}

$parola_attuale = '';
foreach (str_split($parola) as $lettera) {
    if (in_array($lettera, $lettere_indovinate)) {
        $parola_attuale .= $lettera;
    } else {
        $parola_attuale .= '_';
    }
}

if ($parola_attuale == $parola) {
    echo "Hai vinto! La parola era: $parola";
    $conn->query("UPDATE punteggi SET punteggio = punteggio + 1 WHERE user_id = $user_id");
    $result = $conn->query("SELECT parola FROM parole ORDER BY RAND() LIMIT 1");
    $row = $result->fetch_assoc();
    $_SESSION['parola'] = $row['parola'];
    $_SESSION['tentativi'] = 6;
    $_SESSION['lettere_indovinate'] = [];
    $_SESSION['lettere_sbagliate'] = [];
    $result = $conn->query("SELECT punteggio FROM punteggi WHERE user_id = $user_id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $punteggio = $row['punteggio'];
    }
} else if ($tentativi <= 0) {
    echo "Hai perso! La parola era: $parola";
    $result = $conn->query("SELECT parola FROM parole ORDER BY RAND() LIMIT 1");
    $row = $result->fetch_assoc();
    $_SESSION['parola'] = $row['parola'];
    $_SESSION['tentativi'] = 6;
    $_SESSION['lettere_indovinate'] = [];
    $_SESSION['lettere_sbagliate'] = [];
    $result = $conn->query("SELECT punteggio FROM punteggi WHERE user_id = $user_id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $punteggio = $row['punteggio'];
    }
} else {
    echo "Parola: $parola_attuale<br>";
    echo "Tentativi rimanenti: $tentativi<br>";
    echo "Lettere sbagliate: " . implode(', ', $lettere_sbagliate) . "<br>";
    echo "Punteggio totale: $punteggio<br>";
    ?>

    <form method="post">
        Inserisci una lettera: <input type="text" name="lettera" maxlength="1" required>
        <input type="submit" value="Invia">
    </form>
    <p><a href="logout.php">Logout</a></p>

    <?php
}

$conn->close();
?>
