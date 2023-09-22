<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classi</title>
</head>
<body>
    <?php
        //include("rettangolo.php"); //include il file, se non lo trova da WARNING
        //require("rettangolo.php"); //include il file, se non lo trova da ERROR
        //include_once("rettangolo.php");//come include ,ma non ripete l'inclusione se è gia incluso
        require_once("rettangolo.php");//come require ma non ripete

        $r1 = new Rettangolo(10,2);
        echo "<h1>l'area del rettangolo è: ".$r1->getArea();

        $q1 = new Quadrato(10);
        echo "<h1>l'area del quadrato è: ".$q1->getArea();
        echo $q1->stampa("ITA");
    ?>
</body>
</html>