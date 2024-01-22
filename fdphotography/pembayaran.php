<?php
session_start();
include('koneksi.php');

// Ambil ID pesanan dari parameter GET
$id_pesanan = isset($_GET['id_pesanan']) ? $_GET['id_pesanan'] : null;

if (!$id_pesanan) {
// Handle jika ID pesanan tidak ditemukan dalam parameter GET
echo "Error: ID pesanan not found in GET parameter.";
exit();
}

    // Retrieve invoice number from the session
     $invoice_number = isset($_SESSION['invoice_number']) ? $_SESSION['invoice_number'] : '';

    // Query untuk mendapatkan data pesanan berdasarkan ID pesanan
    $query_pesanan = "SELECT p.*, k.nama_kategori FROM pesanan p JOIN kategori k ON p.id_kategori = k.id_kategori WHERE id_pesanan = ?";
    $stmt = $koneksi->prepare($query_pesanan);
    $stmt->bind_param("s", $id_pesanan);
    $stmt->execute();
    $result_pesanan = $stmt->get_result();

    if ($result_pesanan->num_rows > 0) {
            $data_pesanan = $result_pesanan->fetch_assoc();
            $tgl_booking = $data_pesanan['tgl_booking'];
            $nama_kategori = $data_pesanan['nama_kategori'];
            $rate = $data_pesanan['rate'];
            $total_harga = $data_pesanan['total_harga'];
            $metode_pembayaran = $data_pesanan['metode_pembayaran'];
        } else {
            // Handle jika data pesanan tidak ditemukan
            echo "Error: Invoice not found.";
            exit();
        }
        ?>




        <!-- RSVP Form Start -->
        <html>
        <head>
        <meta charset="utf-8">
        <title>Fd Photography</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="shortcut icon" href="assets/landing/img/favicon.ico">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            <!-- Bootstrap JavaScript (optional) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <!-- Include jsPDF library -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

            
            <script> window.jsPDF = window.jspdf.jsPDF;</script>

            <style>
                @media print {
                /* Sembunyikan tombol cetak pada tampilan cetak */
                    .btn-print {
                    display: none;
                    }
                }
                <>
                @media only screen and (max-width: 600px) {
                    .responsif-text {
                        max-width: 90%;
                        font-size: 18px;
                    }
                }
            </style>
        </head>
        <body style="background: url('assets/landing/img/bg-batik.png')">
            <div class="container-fluid RSVP-form py-5" id="weddingRsvp">
                    <div class="container py-5">

                        <div class="row justify-content-center">
                        <div class="col-md-10">
                         <div class="p-5 border-secondary bg-white position-relative" style="border-style: double;">
                         <div class="invoice-info">
                         <div class="mb-5 text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;">
                        <h1 class="text-warning font-weight-bold mb-3">Konfirmasi Pemesanan</h1>
                        <p class="lead mb-4">Kami sangat senang mendapat kesempatan untuk melayani Anda. Konfirmasikan pemesanan Anda untuk pengalaman yang lebih baik.</p>
                    </div>
                            <h3>Invoice Information</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Invoice Number</th>
                                        <td><?php echo $invoice_number; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?php echo $nama_kategori; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu</th>
                                        <td><?php echo $rate; ?> Jam</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga</th>
                                        <td>Rp.<?php echo $total_harga; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Metode Pembayaran</th>
                                        <td><?php echo $metode_pembayaran; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

<p class="text-start mb-3">
<!-- Tombol untuk mencetak -->
<button type="button" class="btn btn-primary btn-print btn-warning" onclick="cetakPemesanan()">Cetak</button>


<!-- Tombol atau Tautan WhatsApp -->
<a href="https://wa.me/6282285578685?text=Halo%20saya%20ingin%20mengkonfirmasi%20pemesanan%20dengan%20invoice%20number%20<?php echo $invoice_number; ?>%20dan%20total%20harga%20Rp.<?php echo $total_harga; ?>" target="_blank" id="whatsappBtn" class="btn btn-success" >Hubungi Kami di WhatsApp untuk melakukan konfirmasi pembayaran</a>

</p>
<p class="text-start mt-3">
    <a class="text-danger" href="index.php">
        <span class="text-danger" >Back to Home</span>
    </a>
</p>

<!-- JavaScript untuk membuat PDF dan mencetaknya -->
<script>
function cetakPemesanan() {
    // Membuat objek jsPDF
    var doc = new jsPDF();

    var invoiceNumber = "<?php echo $invoice_number; ?>";
    var kategori = "<?php echo $nama_kategori; ?>";
    var waktu = "<?php echo $rate; ?> Jam";
    var totalHarga = "Rp.<?php echo $total_harga; ?>";
    var metodePembayaran = "<?php echo $metode_pembayaran; ?>";

      // Set properties, including the title
      doc.setProperties({
        title: 'Pemesanan',
        keywords: 'invoice, payment, confirmation',
        creator: 'fdphotography'
    });

    // Set font size and style
    doc.setFontSize(12);
    doc.setFont("helvetica", "normal");

    // Menambahkan konten ke PDF
    doc.text("Detail Pemesanan:", 10, 10);
    doc.text("Invoice Number: <?php echo $invoice_number; ?>", 10, 20);
    doc.text("Kategori: <?php echo $nama_kategori; ?>", 10, 30);
    doc.text("Waktu: <?php echo $rate; ?> Jam", 10, 40);
    doc.text("Total Harga: Rp.<?php echo $total_harga; ?>", 10, 50);
    doc.text("Metode Pembayaran: <?php echo $metode_pembayaran; ?>", 10, 60);

    // Menyimpan atau menampilkan PDF
    doc.autoPrint(); // Mencetak langsung
    doc.output("dataurlnewwindow"); // Menampilkan dalam jendela baru
    
    // Tampilkan tombol WhatsApp setelah mencetak
    document.getElementById("whatsappBtn").style.display = "inline-block";
}
</script>

                <!-- RSVP Form End -->

        <!-- JavaScript Libraries -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="assets/landing/lib/wow/wow.min.js"></script>
            <script src="assets/landing/lib/easing/easing.min.js"></script>
            <script src="assets/landing/lib/waypoints/waypoints.min.js"></script>
            <script src="assets/landing/lib/lightbox/js/lightbox.min.js"></script>
            

            <!-- Template Javascript -->
            <script src="assets/landing/js/main.js"></script>


    </body>
</html>