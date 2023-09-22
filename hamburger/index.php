<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configura il tuo hamburger</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Configura il tuo hamburger</h1>
    </header>
    <main>
        <form name="hamburgerForm" action="script.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="cognome">Cognome:</label>
                <input type="text" name="cognome" id="cognome" required>
            </div>
            <div class="form-group">
                <p>Seleziona gli ingredienti dell'hamburger:</p>
                <label><input type="checkbox" name="ingredienti[]" value="Carne"> Carne</label><br>
                <label><input type="checkbox" name="ingredienti[]" value="Formaggio"> Formaggio</label><br>
                <label><input type="checkbox" name="ingredienti[]" value="Lattuga"> Lattuga</label><br>
                <label><input type="checkbox" name="ingredienti[]" value="Pomodoro"> Pomodoro</label><br>
                <label><input type="checkbox" name="ingredienti[]" value="Cipolla"> Cipolla</label><br>
            </div>
            <button type="submit">Invia</button>
        </form>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Il Tuo Ristorante</p>
    </footer>
</body>
</html>