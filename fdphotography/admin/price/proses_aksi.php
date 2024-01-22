<?php
include('config_query.php');
$db = new database();
session_start();
$id_admin = $_SESSION['id_admin'];
$aksi = $_GET['aksi'];

if ($aksi == "add") {
    // ...
    // Bagian upload gambar dihapus
    // ...

    $insertData = $db->tambah_data($_POST["hour"], $_POST["enhanced_photos"], $_POST["status_publish"], $id_admin); //query insert data

    if ($insertData) {
        echo "<script>alert('Data Berhasil Di Tambahkan!');document.location.href = 'kelola_price.php';</script>";
    } else {
        echo "<script>alert('Upss...Data Gagal Di Tambahkan!');document.location.href = 'kelola_price.php';</script>";
    }
} elseif ($aksi == "update") {
    // ...
    // Bagian upload gambar dihapus
    // ...

    $updateData = $db->update_data($_POST["hour"], $_POST["enhanced_photos"], $_POST["status_publish"], $_POST['id_price'], $id_admin); //Query Update Data
    if ($updateData) {
        echo "<script>alert('Data Berhasil Di Tambahkan!');document.location.href = 'kelola_price.php';</script>";
    } else {
        echo "<script>alert('Upss...Data Gagal Di Tambahkan!');document.location.href = 'kelola_price.php';</script>";
    }
} elseif ($aksi == "delete") {
    // Bagian upload gambar dihapus
    // ...

    $id_price = $_GET['id']; 
    $deleteData = $db->delete_data($id_price);
    if ($deleteData) {
        echo "<script>alert('Data Berhasil di Hapus!');document.location.href = 'kelola_price.php';</script>";
    } else {
        echo "<script>alert('Data Gagal di Hapus!');document.location.href = 'kelola_price.php';</script>";
    }
} else {
    echo "<script>alert('Anda tidak mendapatkan akses untuk operasi ini!');document.location.href = 'kelola_price.php';</script>";
}
?>
