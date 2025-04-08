<?php
session_start();
if (isset($_SESSION['iduser'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Top Up Game</h1>
        <p>Layanan top-up game favoritmu dengan mudah dan cepat!</p>
        <a href="../pages/login.php" class="btn">Login</a>
        <a href="../pages/register.php" class="btn">Daftar</a>
    </div>
</body>
</html>
