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
?>

<?php
include('template/header_logout.php');
?>

<!-- RSVP Form Start -->
        <div class="container-fluid RSVP-form py-5" id="weddingRsvp" style="background: url('assets/landing/img/bg-batik.png')">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="p-5 border-secondary bg-white position-relative" style="border-style: double;">
                        <form class="" action="proses_order.php" method="POST" onsubmit="return validateForm()">
                                    <div class="row gx-4 gy-3 justify-content-center">
                                    <div class="mb-5 text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;">
                                        <h1 class="display-2 text-primary">Form Order</h1>
                                    </div>
                                        <!-- <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                                            <div class="form-group">
                                                <input type="text" class="form-control py-3 border-0" id="Examplename" placeholder="Type your name here...">
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                                            <div class="form-group">
                                                <input type="tel" class="form-control py-3 border-0 bg-gray text-dark" id="Examplename" name="no_hp" value="<?php echo $d_nohp; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                                            <div class="form-group">
                                                <input type="text" class="form-control py-3 border-0 bg-gray text-dark" id="Examplename" name="email" value="<?php echo $d_email; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                            <div class="form-group">
                                                <select class="form-control bg-gray text-dark py-3 border-0" id="exampleselect1" name="kategori" placeholder="Select category">
                                                    <option value="">Select Category</option>
                                                    <option value="1">Engagement</option>
                                                    <option value="2">Prewedding</option>
                                                    <option value="3">Wedding</option>
                                                    <option value="4">Graduation</option>
                                                    <option value="5">Product</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                            <div class="form-group">
                                                <select class="form-control bg-gray text-dark py-3 border-0" id="exampleselect2" name="rate" placeholder="Select rate" required>
                                                <option value="">Select Rate</option>
                                                    <option value="1">1 hour</option>
                                                    <option value="2">2 hours</option>
                                                    <option value="4">4 hours</option>
                                                    <option value="6">6 hours</option>
                                                    <option value="8">8 hours</option>
                                                    <option value="10">10 hours</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 wow fadeIn " data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="tanggal_booking" class="form-label text-dark">Tanggal Acara</label>
                                            <input type="date" class="form-control bg-gray text-dark py-3 border-0" id="tanggal_booking" name="tgl_booking" placeholder="Tanggal Acara" value="Tanggal Acara" required>
                                        </div>
                                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="form-group">
                                            <label for="metode_pembayaran" class="form-label"></label>
                                                <select class="form-control bg-gray text-dark py-3 border-0" id="metode_pembayaran" name="metode_pembayaran">
                                                <option value="">Payment Method</option>
                                                    <option value="bank_transfer">Bank Transfer</option>
                                                    <option value="e_money">E-Money</option>
                                                    <option value="cash">Cash</option>
                                                    <!-- Tambahkan opsi metode pembayaran lainnya sesuai kebutuhan -->
                                                </select>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="col-12 text-center wow fadeIn" data-wow-delay="0.1s">
                                            <button class="btn btn-primary btn-primary-outline-0 py-3 px-5" type="submit" name="konfirmasi" >Confirm to pay</a></button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>



<script>
  function validateForm() {
    var selectedOption1 = document.getElementById("exampleselect1").value;
    var selectedOption2 = document.getElementById("exampleselect2").value;
    var selectedOption3 = document.getElementById("metode_pembayaran").value;

    // Periksa apakah select option sudah dipilih
    if (selectedOption1 === "" || selectedOption2 === "" || selectedOption3 === "") {
      alert("Opsi masih kosong.");
      return false; // Menghentikan pengiriman formulir
    }

    // Jika validasi berhasil, formulir akan dikirim
    return true;
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