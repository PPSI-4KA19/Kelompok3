<?php
session_start();
include('koneksi.php');

// Cek status login
if (!isset($_SESSION['id_pelanggan'])) {
    header("Location: login.php");
    exit();
}

// Mengambil data pengguna dari database berdasarkan ID
$id_pelanggan = $_SESSION['id_pelanggan'];
$query_pelanggan = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
$result_pelanggan = $koneksi->query($query_pelanggan);

if ($result_pelanggan->num_rows > 0) {
    // Mengisi data pengguna pada formulir
    $data_pelanggan = $result_pelanggan->fetch_assoc();
    $d_email = $data_pelanggan['email'];
    $d_nohp = $data_pelanggan['no_hp'];
} else {
    // Handle jika data pengguna tidak ditemukan
    echo "Error: User data not found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["konfirmasi"])) {
    // Ambil nilai dari formulir
    $tgl_booking = $_POST["tgl_booking"];
    $id_kategori = $_POST["kategori"];
    $rate_id = intval($_POST["rate"]);
    $metode_pembayaran = $_POST["metode_pembayaran"]; // Ambil nilai metode pembayaran

    // ID Pelanggan dari session
    $id_pelanggan = $_SESSION['id_pelanggan'];

    // Ambil informasi kategori dari tabel kategori
    $query_kategori = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $result_kategori = $koneksi->query($query_kategori);

    if ($result_kategori->num_rows > 0) {
        $data_kategori = $result_kategori->fetch_assoc();
        $kategori = $data_kategori['nama_kategori'];
        $harga_per_jam = $data_kategori['harga_per_jam'];
        
        // Hitung total harga berdasarkan rate
        $total_harga = $harga_per_jam * $rate_id;

        // Generate nomor invoice (contoh, sesuaikan dengan logika Anda)
        $invoice_number = "INV-" . rand(1000, 9999);

        // Lakukan penyimpanan data ke dalam database sesuai kebutuhan
        $query = "INSERT INTO pesanan (id_pelanggan, tgl_booking, id_kategori, rate, total_harga, metode_pembayaran, invoice_number) 
                  VALUES ('$id_pelanggan', '$tgl_booking', '$id_kategori', '$rate_id', '$total_harga', '$metode_pembayaran', '$invoice_number')";

        if ($koneksi->query($query) === TRUE) {
            // Pemesanan berhasil

            // Simpan nomor invoice ke dalam sesi untuk digunakan di halaman pembayaran
            $_SESSION['invoice_number'] = $invoice_number;

            // Simpan ID pesanan ke dalam sesi untuk digunakan di halaman pembayaran
            $_SESSION['id_pesanan'] = $koneksi->insert_id; // Mengambil ID pesanan yang baru saja dimasukkan ke dalam database

            // Arahkan ke halaman pembayaran dengan menyertakan ID pesanan pada URL
            header("Location: pembayaran.php?id_pesanan=" . $_SESSION['id_pesanan']);
            exit();
        } else {
            // Pemesanan gagal
            $error_message = "Pemesanan failed. Please try again.";
            exit();
        }
    }
}
?>
