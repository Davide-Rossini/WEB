<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Campionato</h1>
    <?php
        $serieA = array("Inter" => array(23, 0, 2, 4), "Milan" => array(26,234,0,0), "Juventus" => array(45,1,0,23));
        $stampoRis = array("Punti","Vittorie", "Pareggio", "Sconfitte");
        foreach($serieA as $squadra => $risultati){
            echo "<h2>".$squadra ." : ". $stampoRis[0]. " : " . $risultati[0] ." " . $stampoRis[1]. " : " . $risultati[1] ." ". $stampoRis[2]. " : " . $risultati[2] ." ". $stampoRis[3]. " : " . $risultati[3]."</h2><br>";
        }
        echo "<h1>----------------------Ordinato per nome-----------------------</h1>";
        ksort($serieA, SORT_NATURAL);
        foreach($serieA as $squadra => $risultati){
            echo "<h2>".$squadra ." : ". $stampoRis[0]. " : " . $risultati[0] ." " . $stampoRis[1]. " : " . $risultati[1] ." ". $stampoRis[2]. " : " . $risultati[2] ." ". $stampoRis[3]. " : " . $risultati[3]."</h2><br>";
        }
        arsort($serieA);
        echo "<h1>----------------------Ordinato per punti----------------------</h1>";
        foreach($serieA as $squadra => $risultati){
            echo "<h2>".$squadra ." : ". $stampoRis[0]. " : " . $risultati[0] ." " . $stampoRis[1]. " : " . $risultati[1] ." ". $stampoRis[2]. " : " . $risultati[2] ." ". $stampoRis[3]. " : " . $risultati[3]."</h2><br>";
        }
        asort($serieA);
        echo "<h1>----------------------Ordinato per Punti Inverso----------------------</h1>";
        foreach($serieA as $squadra => $risultati){
            echo "<h2>".$squadra ." : ". $stampoRis[0]. " : " . $risultati[0] ." " . $stampoRis[1]. " : " . $risultati[1] ." ". $stampoRis[2]. " : " . $risultati[2] ." ". $stampoRis[3]. " : " . $risultati[3]."</h2><br>";
        }
    ?>
</body>
<script src="script.js"></script>
</html>