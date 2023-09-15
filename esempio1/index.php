<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Esempio1</title>
</head>
<body>
<h1>Esempio 1</h1>
        <?php
            $x = 1;
            $y = 2;
            echo "<p>".$x."</p>";
            $z = 2;
            if($y%$z==0){
                echo "<p> $y (y) è pari </p>";
            }

            //$animali = array("Gatto", "Cane", "Mucca");
            $animali =["Gatto", "Cane", "Mucca"];
            $animali[0] = "Gallina";
            $animali[4] = "Tifer";
            $animali["ciao"] = "Karandip";
            foreach($animali as $i => $animale){
                echo $i." ".$animale. ", ";
            }

            echo "<br><br>";

            $fattoria =array("Gatto" => array("Il","Miao"),"Cane" => array("Il", "Bau"), "Mucca" => array("La","Muu"));
            foreach($fattoria as $animale => $versi){
                echo "<p>".$versi[0]." ".$animale." fa ".$versi[1]."</p>";
            }
            echo "<p>".$fattoria["Mucca"][1];
        ?>
</body>
<script src="script.js"></script>
</html>