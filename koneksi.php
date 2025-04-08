<?php
$host = "localhost:3306/";
$user = "root"; // Sesuaikan dengan username database
$pass = "1sampai8"; // Sesuaikan jika ada password
$db   = "mydb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
