<link rel="stylesheet" href="style.css">
<?php
require("config.php");  //file di config con i parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();  //termina la pagina
}

if (isset($_GET["citta"])) {
    $citta = $_GET["citta"];
    $sql = "SELECT * FROM concerto WHERE fkCitta = (SELECT id FROM citta WHERE nome = ?)";
    $stmt = $mydb->prepare($sql);
if (isset($citta)) {
    $stmt->bind_param("s", $citta);
    $stmt->execute();
}else {
    $stmt->execute();
}

$result = $stmt->get_result();

while ($row = $result->fetch_assoc())
{
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<table>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Data Ora</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["dataOra"] . "</td>";
        echo "</tr>";
        echo "</table>";
    }
    else{
        echo "ERRORE!";
    }
}
}else{
    echo "ERRORE!";
}




$mydb->close();
?>