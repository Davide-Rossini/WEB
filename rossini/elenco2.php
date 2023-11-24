<link rel="stylesheet" href="style.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="data" action="script.php" method="post" enctype="multipart/form-data">
        <button name="serale">Serale</button>
        <button name="pomeridiano">Pomeridiano</button>
    </form>
</body>
</html>
<link rel="stylesheet" href="style.css">
<?php
require("config.php");  //file di config con i parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();  //termina la pagina
}

$sql = "SELECT * FROM concerto ORDER BY id";
$result = $mydb->query($sql);
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Data Ora</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["dataOra"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$mydb->close();
?>