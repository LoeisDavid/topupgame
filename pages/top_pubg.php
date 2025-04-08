<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['iduser'])) {
    header("Location: login.php");
    exit();
}

$iduser = $_SESSION['iduser']; 

if (isset($_POST['topup'])) {
    $idplayer = mysqli_real_escape_string($conn, $_POST['idplayer']);
    $metodePembayaran = mysqli_real_escape_string($conn, $_POST['metode']);
    $tanggal = date("Y-m-d");

    $queryId = "SELECT MAX(idtransaksi) AS max_id FROM transaksi";
    $result = mysqli_query($conn, $queryId);
    $row = mysqli_fetch_assoc($result);
    $newId = $row['max_id'] ? $row['max_id'] + 1 : 1;

    $query = "INSERT INTO transaksi (idtransaksi, idplayer, game, metodePembayaran, tanggal, user_iduser) 
              VALUES (?, ?, 'PUBG', ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "isssi", $newId, $idplayer, $metodePembayaran, $tanggal, $iduser);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: konfirmasi.php");
            exit();
        } else {
            $error = "Gagal melakukan top-up! " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = "Kesalahan dalam query: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top-Up PUBG</title>
    <link rel="stylesheet" href="../css/top_pubg.css">
</head>
<body>
    <div class="container">
        <h1>Top-Up PUBG</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="idplayer" placeholder="Masukkan ID Player" required>
            <select name="metode" required>
                <option value="GoPay">GoPay</option>
                <option value="OVO">OVO</option>
                <option value="Dana">Dana</option>
            </select>
            <button type="submit" name="topup">Top-Up Sekarang</button>
        </form>
        <a href="dashboard.php" class="back-btn">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>
