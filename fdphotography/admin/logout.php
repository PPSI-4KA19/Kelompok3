<?php
session_start();

//unset semua session variabel
unset($_SESSION['username']);
unset($_SESSION['id_user']);

if(isset($_GET['pesan']) && $_GET['pesan'] == 'logout') {
    $pesan = "Anda telah berhasil logout.";
    echo "<script>alert('$pesan');</script>";
}

//Unset All
session_unset();

//Destroy Session
session_destroy(); 

//Arahkan ke halaman Login
header('location: ../login.php?pesan=logout');
exit;