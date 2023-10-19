<html>
	<head>
		<title>Elenco genitori</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>Elenco genitori</h1>
		<?php
			/*instauro la connessione al database */
			require("config.php");  //file di config con i parametri di connessione
			$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
			if ($mydb->connect_errno) {
				echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				exit();  //termina la pagina
			}
			
			//query per prelevare l'elenco delle mama
			$query1 = "SELECT id, nome, cognome FROM mamme";
			//eseguo la query
			$risultato1 = $mydb->query($query1);
			
			//controllo se ci sono effettivamente dei risultati, nel caso voglia fare qualcosa in caso contrario
			if($risultato1->num_rows > 0){  
				//ciclo i risultati, cioè l'elenco delle mamme presenti nel database
				while($mamma = $risultato1->fetch_assoc()){
					//per ogni mamma stampo il nome 
					echo "<h2>".$mamma["nome"]." ".$mamma["cognome"]."</h3>";
				
					//per ogni mamma devo prelevare i figli.
					//compongo la query sostituendo l'id della mamma corrente ad ogni iterazione del ciclo,
					//in modo da estrarre ogni volta solo i figli della mamma corretta
					$query2="SELECT nome, cognome, eta 
							FROM figli 
							WHERE fkMamma = ".$mamma["id"]."
							ORDER BY eta DESC ";
					//eseguo la seconda query
					$risultato2 = $mydb->query($query2);
					//verifico se ci sono dei risultati, altrimenti stampo che la mamma non ha figli associati
					if($risultato2->num_rows > 0){  
						//ci sono dei risultati, quindi inizio ad impostare la tabella
						echo "<table>";
						echo "<tr><td>Nome</td><td>Cognome</td><td>Età</td></tr>";
						//stampo le singole righe della tabella
						while($figlio = $risultato2->fetch_assoc()){
							echo "<tr>";
							echo "<td>".$figlio["nome"]."</td>";
							echo "<td>".$figlio["cognome"]."</td>";
							echo "<td>".$figlio["eta"]."</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else{
						echo "<p>Non risultano figli per questa mamma.</p>";
					}
				}
			}
			else{
				echo "<p>Non ci sono mamme nel database.</p>";
			}
			
		?>
	</body>
</html>