<!-- 
    ?php
require_once('vendor/autoload.php'); // Path ke autoload.php TCPDF

if (isset($_POST['invoice_number'])) {
    // Data dari permintaan POST
    $invoiceNumber = $_POST['invoice_number'];
    $namaKategori = $_POST['nama_kategori'];
    $totalHarga = $_POST['total_harga'];
    $metodePembayaran = $_POST['metode_pembayaran'];

    // Inisialisasi TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Tambahkan konten ke PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Invoice Pembayaran', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nomor Invoice: ' . $invoiceNumber, 0, 1);
    $pdf->Cell(0, 10, 'Kategori: ' . $namaKategori, 0, 1);
    $pdf->Cell(0, 10, 'Total Harga: ' . $totalHarga, 0, 1);
    $pdf->Cell(0, 10, 'Metode Pembayaran: ' . $metodePembayaran, 0, 1);

    // Simpan PDF (dalam folder yang sesuai)
    $pdfFileName = 'invoices/' . $invoiceNumber . '.pdf';
    $pdf->Output($pdfFileName, 'F');

    // Keluarkan URL PDF yang dibuat
    echo $pdfFileName;
} else {
    echo "Error: Invalid request.";
}
?> -->