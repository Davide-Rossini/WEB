<?php
    session_start();
    if(!isset($_COOKIE["record"])){
        setcookie("record", 0, strtotime("+30 days"));
    }

    if(!isset($_SESSION["giocatore"])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="salvanome.php" method="post">
                <p>Inserisci il nome: <input type="text" name="nome"></p>
                <p><input type="submit" name="invia" value="invia"></p>
            </form>
        </body>
        </html>
        <?php
    }
    else{
        require("class.domanda.php");
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
        <form action="controllarisposta.php" method="post">
                <p><?php echo $domande[$_SESSION["num_domanda"]]->getTesto();?></p>
                <?php 
                    foreach($domande[$_SESSION["num_domanda"]]->getRisposte() as $risposta){
                        echo '<p><input type="radio" name="risp" value="'.$risposta.'">'.$risposta.'</p>';
                    }
                ?>
                <p><input type="submit" name="invia" value="invia"></p>
            </form>
        </body>
        </html>
        <?php
    }
?>
