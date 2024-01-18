<?php

session_start();

// Connessione al database
$conn = new PDO('mysql:host=localhost;dbname=film', 'root', '');

// Seleziona tutti i film
$film = $conn->query("SELECT * FROM film")->fetchAll();

// Visualizza i film
echo '<ul>';
foreach ($film as $f) {
  echo '<li><a href="visualizza_attori.php?id_film=' . $f['id'] . '">' . $f['titolo'] . '</a></li>';
}
echo '</ul>';

// Controlla se è presente un messaggio di errore
if (isset($_SESSION['errore'])) {
  echo '<div class="errore">' . $_SESSION['errore'] . '</div>';
  unset($_SESSION['errore']);
}

?>
