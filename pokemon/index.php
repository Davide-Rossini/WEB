<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pokemon</title>
</head>
<body>
    <h1>Pokemon</h1>
    <?php 
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
            $query1 = "SELECT id, nome, tipo, tipo2 FROM pokemon";
			//eseguo la query
			$risultato1 = $mydb->query($query1);
            if($risultato1->num_rows > 0){  
				//ciclo i risultati, cioè l'elenco delle mamme presenti nel database
				while($pokemon = $risultato1->fetch_assoc()){
					//per ogni mamma stampo il nome 
					echo "<h2>".$pokemon["nome"]." ".$pokemon["tipo"]." ".$pokemon["tipo2"]."</h3>";
                }
            }
            else{
                echo "Non ci sono pokemon";
            }
    ?>
</body>
</html>