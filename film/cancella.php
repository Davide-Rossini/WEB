<?php

session_start();

// Connessione al database
$conn = new PDO('mysql:host=localhost;dbname=film', 'root', '');

// Controlla se è stata passata una query parametrica
if (!isset($_GET['titolo'])) {
  $_SESSION['errore'] = 'Inserisci il titolo del film da cancellare';
  header('Location: index.php');
  exit;
}

// Estrae il titolo del film dalla query parametrica
$titolo = $_GET['titolo'];

// Cancella il film
$query = "DELETE FROM film
              WHERE titolo LIKE '%$titolo%'";
$conn->exec($query);

// Cancella gli attori che recitano nel film
$query = "DELETE FROM recita
              WHERE fk_film IN (
                SELECT id
                FROM film
                WHERE titolo LIKE '%$titolo%'
              )";
$conn->exec($query);

// Reindirizza alla pagina principale
header('Location: index.php');

?>
