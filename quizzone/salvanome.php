<?php 
    session_start();
    if(isset($_POST["invia"])){
        $_SESSION["giocatore"] = $_POST["nome"];
        $_SESSION["punteggio"] = 0;
        $_SESSION["num_domanda"] = 0;
    }
    header("Location: index.php");
    exit();
?>
