<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['iduser'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: history.php");
    exit();
}

$idtransaksi = mysqli_real_escape_string($conn, $_GET['id']);
$iduser = $_SESSION['iduser'];

// Cek apakah transaksi milik user yang login
$query = "SELECT * FROM transaksi WHERE idtransaksi='$idtransaksi' AND user_iduser='$iduser'";
$result = mysqli_query($conn, $query);
$transaksi = mysqli_fetch_assoc($result);

if (!$transaksi) {
    header("Location: history.php");
    exit();
}

// Proses update metode pembayaran
if (isset($_POST['update'])) {
    $metodeBaru = mysqli_real_escape_string($conn, $_POST['metode']);
    $queryUpdate = "UPDATE transaksi SET metodePembayaran='$metodeBaru' WHERE idtransaksi='$idtransaksi' AND user_iduser='$iduser'";

    if (mysqli_query($conn, $queryUpdate)) {
        header("Location: history.php");
        exit();
    } else {
        $error = "Gagal mengupdate transaksi!";
    }
}

// Proses hapus transaksi
if (isset($_POST['delete'])) {
    $queryDelete = "DELETE FROM transaksi WHERE idtransaksi='$idtransaksi' AND user_iduser='$iduser'";
    if (mysqli_query($conn, $queryDelete)) {
        header("Location: history.php");
        exit();
    } else {
        $error = "Gagal menghapus transaksi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>
    <div class="container">
        <h1>Edit Transaksi</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <label>ID Transaksi: <?= htmlspecialchars($transaksi['idtransaksi']); ?></label>
            <label>ID Player: <?= htmlspecialchars($transaksi['idPlayer']); ?></label>
            <label>Game: <?= htmlspecialchars($transaksi['game']); ?></label>
            <label>Metode Pembayaran:</label>
            <select name="metode">
                <option value="GoPay" <?= $transaksi['metodePembayaran'] == 'GoPay' ? 'selected' : ''; ?>>GoPay</option>
                <option value="OVO" <?= $transaksi['metodePembayaran'] == 'OVO' ? 'selected' : ''; ?>>OVO</option>
                <option value="Dana" <?= $transaksi['metodePembayaran'] == 'Dana' ? 'selected' : ''; ?>>Dana</option>
            </select>
            <button type="submit" name="update">Update</button>
        </form>

        <!-- Form untuk menghapus transaksi -->
        <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
            <button type="submit" name="delete" class="btn-delete">Hapus Transaksi</button>
        </form>

        <a href="history.php" class="btn">Batal</a>
    </div>
</body>
</html>
