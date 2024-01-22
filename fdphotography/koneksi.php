<?php
$host = 'localhost'; // Ganti dengan host database Anda
$user = 'root'; // Ganti dengan nama pengguna database Anda
$password = ''; // Ganti dengan kata sandi database Anda
$database = 'db_fdphotography'; // Ganti dengan nama database Anda

// Buat koneksi
$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>