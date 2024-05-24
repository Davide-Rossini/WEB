<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "impiccato";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM utenti WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($pass, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $user;
        header('Location: index.php');
        exit;
    } else {
        echo "Username o password non corretti.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(90deg, #4b6cb7, #182848);
        color: #fff;
        text-align: center;
        padding: 50px;
    }
    h2 {
        font-size: 2em;
        margin-bottom: 20px;
    }
    input[type="text"], input[type="password"], input[type="submit"] {
        padding: 10px;
        font-size: 16px;
        margin: 10px;
        width: 80%;
        border: none;
        border-radius: 5px;
    }
    input[type="submit"] {
        background-color: #28a745;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #218838;
    }
    form {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        display: inline-block;
    }
    a {
        color: #fff;
        text-decoration: none;
        margin-top: 20px;
        display: inline-block;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>
    <p>Non hai un account? <a href="register.php">Registrati</a></p>
</body>
</html>
