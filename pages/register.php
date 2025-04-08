<?php
include "../koneksi.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil ID terbesar dari tabel user
    $queryId = "SELECT MAX(iduser) AS max_id FROM user";
    $result = mysqli_query($conn, $queryId);
    $row = mysqli_fetch_assoc($result);
    
    // Tentukan iduser baru
    $newId = $row['max_id'] ? $row['max_id'] + 1 : 1;

    // Insert data dengan iduser baru
    $query = "INSERT INTO user (iduser, username, password) VALUES ('$newId', '$username', '$password')";
    if (mysqli_query($conn, $query)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Gagal mendaftar!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
