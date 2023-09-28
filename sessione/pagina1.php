<?php
    session_start();

    $_SESSION["prova"] = "Test della sessione";

    //echo $_SESSION["prova"];
    unset($_SESSION["prova"]);
    //session_unset(); svuota l'array di sessione
    //session_destroy(); distrugge la sessione
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessione</title>
</head>
<body>
    <?php 
        if(isset($_SESSION["nome"])){
            echo "<p>Ciao ".$_SESSION["nome"]."</p>";
        }
        else{
            ?>
            <form action="salva.php" method="post">
                <p>Inserisci il nome: <input type="text" name="nome" id="nome"></p>
                <p><input type="submit" value="invia"></p>
            </form>
            <?php 
            }

            print_r($_SESSION);
        ?>
</body>
</html>