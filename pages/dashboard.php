<?php
session_start();
if (!isset($_SESSION['iduser'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="home.php" class="btn">Mulai Top-Up</a>
        <a href="history.php" class="btn">Riwayat Transaksi</a>
        <a href="login.php" class="btn">Logout</a>
    </div>
</body>
</html>
