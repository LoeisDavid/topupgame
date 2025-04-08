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
    <title>Konfirmasi</title>
    <link rel="stylesheet" href="../css/konfirmasi.css">
</head>
<body>
    <div class="container">
        <h1>Top-Up Berhasil!</h1>
        <p>Silakan cek riwayat transaksi Anda.</p>
        <a href="history.php" class="btn">Cek History</a>
        <a href="dashboard.php" class="btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>
