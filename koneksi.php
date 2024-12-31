<?php
// Mengatur data koneksi
$host = "localhost"; // Alamat server MySQL (biasanya localhost)
$user = "root"; // Username MySQL (default: root)
$pass = ""; // Password MySQL (default: kosong)
$dbname = "belajar_php_kelase"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi Error: ". mysqli_connect_error());
}

// Set karakter set ke UTF-8
mysqli_set_charset($conn, "utf8");

echo "Koneksi Berhasil!";
?>
