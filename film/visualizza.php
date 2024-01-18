<?php

session_start();

// Connessione al database
$conn = new PDO('mysql:host=localhost;dbname=film', 'root', '');

// Seleziona il film in base all'id passato nella GET
$id_film = $_GET['id_film'];
$film = $conn->query("SELECT * FROM film WHERE id = $id_film")->fetch();

// Se il film non esiste, mostra un messaggio di errore
if (!$film) {
  $_SESSION['errore'] = 'Film non trovato';
  header('Location: index.php');
  exit;
}

// Seleziona gli attori che recitano nel film
$attori = $conn->query("SELECT a.nome, a.cognome
                          FROM recita r
                          INNER JOIN attore a
                          ON r.fk_attore = a.id
                          WHERE r.fk_film = $id_film");

// Visualizza gli attori
echo '<ul>';
foreach ($attori as $attore) {
  echo '<li>' . $attore['nome'] . ' ' . $attore['cognome'] . '</li>';
}
echo '</ul>';

?>
