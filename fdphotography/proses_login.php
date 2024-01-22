<?php include ('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $emailOrUsername = $_POST["email_or_username"];
    $password = $_POST["password"];

    // Cek login di tabel pelanggan
    $loginField = filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    $pelanggan_query = "SELECT * FROM tb_pelanggan WHERE $loginField = '$emailOrUsername' AND password='$password'";
    $result_pelanggan = $koneksi->query($pelanggan_query);


    if ($result_pelanggan->num_rows > 0) {
        // Jika login berhasil sebagai pelanggan
        session_start();
        
        // Ambil data pelanggan, sesuaikan dengan struktur tabel Anda
        $row_pelanggan = $result_pelanggan->fetch_assoc();
        
        // Simpan id_pelanggan dalam sesi
        $_SESSION["id_pelanggan"] = $row_pelanggan["id_pelanggan"];
        $_SESSION["email_or_username"] = $emailOrUsername;

        // Redirect ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan kesalahan atau lakukan tindakan lainnya
        echo "<script>
            alert('Login gagal. Periksa kembali data anda.');
            window.location.href = 'login.php'; 
         </script>";
    }
}