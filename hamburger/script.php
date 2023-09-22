<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];

            if (isset($_POST["ingredienti"]) && is_array($_POST["ingredienti"])) {
                $ingredienti = $_POST["ingredienti"];
            } else {
                $ingredienti = array();
            }

            echo "<h2>Riepilogo:</h2>";
            echo "<p>Nome: $nome</p>";
            echo "<p>Cognome: $cognome</p>";

            if (!empty($ingredienti)) {
                echo "<p>Ingredienti selezionati:</p>";
                echo "<ul>";
                foreach ($ingredienti as $ingrediente) {
                    echo "<li>$ingrediente</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nessun ingrediente selezionato.</p>";
            }
        }
        ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Il Tuo Ristorante</p>
    </footer>
</body>
</html>