<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form name="esempio1" action="script.php" method="post" enctype="multipart/form-data">
        <label>Nome:<input type="text" id="nome" name="nome"></label>
        <label>Cognome:<input type="text" id="cognome" name="cognome"></label>
        <input type="submit" value="Invia" id="invia" name="invia">
    </form>
</body>
</html>