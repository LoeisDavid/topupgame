<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['iduser'])) {
    header("Location: login.php");
    exit();
}

$iduser = $_SESSION['iduser']; // Ambil iduser dari sesi login
$query = "SELECT * FROM transaksi WHERE user_iduser='$iduser'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Transaksi</title>
    <link rel="stylesheet" href="../css/history.css">
</head>
<body>
    <div class="container">
        <h1>History Transaksi</h1>
        <table>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Player</th>
                <th>Game</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['idtransaksi']; ?></td>
                    <td><?= $row['idPlayer']; ?></td>
                    <td><?= $row['game']; ?></td>
                    <td><?= $row['metodePembayaran']; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td>
                        <a href="edit_transaksi.php?id=<?= $row['idtransaksi']; ?>" class="btn-edit">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="dashboard.php" class="btn">🔙 Kembali ke Dashboard</a>
    </div>
</body>
</html>
