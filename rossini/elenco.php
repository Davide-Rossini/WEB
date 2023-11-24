<link rel="stylesheet" href="style.css">
<?php
require("config.php");  //file di config con i parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();  //termina la pagina
}

$sql = "SELECT * FROM concerto ORDER BY dataOra ASC";
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