<?php
    if(isset($_POST["bambino"])){
 
            /*instauro la connessione al database */
            require("config.php");  //file di config con i parametri di connessione
            $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
            if ($mydb->connect_errno) {
                echo "Errore nella connessione a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                exit();  //termina la pagina
            }
 
            $query = "INSERT INTO bambini (nome) VALUES ('".$_POST["bambino"]."')";
            echo $query;
            $mydb->query($query);
            $id_bambino = $mydb->insert_id;
            $query ="INSERT INTO giocattoli (nome, fkBambino) VALUES ('".$_POST["giocattoli1"]."', ".$id_bambino."), ('".$_POST["giocattoli2"]."', ".$id_bambino."), ('".$_POST["giocattoli3"]."', ".$id_bambino.")";
            echo $query;
            $mydb->query($query);
        }