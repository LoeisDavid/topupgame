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
    <title>Home - Pilih Game</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div class="container">
        <h1>Pilih Game untuk Top-Up</h1>
        <p>Silakan pilih game favorit Anda untuk melakukan top-up dengan mudah dan cepat!</p>
        
        <div class="game-list">
            <a href="top_ff.php" class="game-card">Free Fire</a>
            <a href="top_ml.php" class="game-card">Mobile Legends</a>
            <a href="top_pubg.php" class="game-card">PUBG</a>
            <a href="top_valo.php" class="game-card">Valorant</a>
        </div>

        <a href="dashboard.php" class="back-btn">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>
