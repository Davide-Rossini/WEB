<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzone</title>
</head>
<body>
    <form action="quiz.php" method="post">
    <p>Domanda 1:</p>
        <p>Che colore è il limone?</p>
        <input type="radio" name="domanda1" value="1">Giallo
        <input type="radio" name="domanda1" value="2">Verde
        <input type="radio" name="domanda1" value="3">Rosso
        <input type="radio" name="domanda1" value="4">Blu
        <a href="quiz.php">Invia</a>
    </form>
</body>
</html>