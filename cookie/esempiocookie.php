<?php
    setcookie("prova", "cookie di prova", time()+60*60*24*30);

    if(isset($_COOKIE["prova"])){
        echo $_COOKIE["prova"];
    }
    else{
        echo "Non ho trovato il tuo cookie!";
    }
?>