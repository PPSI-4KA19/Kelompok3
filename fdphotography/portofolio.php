<?php
include('admin/config_query.php');
$db = new database();
$data_portofolio = $db->tampil_data_landing();

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// Cek apakah pengguna sudah login
if (isset($_SESSION["email_or_username"])) {
    // Tampilkan navbar "logout"
    include('template/header_logout.php');
} else {
    // Tampilkan navbar "login"
    include('template/header.php');
}
?>

        <!-- Gallery Start -->
        <div class="container-fluid gallery position-relative py-5" id="portofolio" style="background: url('assets/landing/img/bg-batik.png')" >
            <div class="container position-relative py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-2 text-dark">PORTOFOLIO</h1>
                    <p class="fs-5 text-dark">Fdphotography adalah sebuah wadah photography untuk anda yang ingin mengabadikan
                        momen indah dalam  hidup anda dengan potret yang memukau.</p>
                </div>
                <div class="row g-4">
                <?php
				foreach($data_portofolio as $row) {
				?>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="gallery-item">
                            <div class="gallery-img" style="max-height: 200px;">
                                <img class="img-fluid w-100" src="portofolio/<?= $row['header']; ?>" alt="Image">
                                <div class="hover-style"></div>
                                <div class="search-icon">
                                    <a href="portofolio/<?= $row['header']; ?>" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-plus btn-primary btn-primary-outline-0 p-3"></i></a>
                                </div>
                            </div>
                            <div class="gallery-overlay bg-light border-secondary border-top-0 p-4" style="border-style: double;">
                                <h5><?= $row['judul_acara']; ?></h5>
                                <p class="text-dark mb-0"><?= $row['tanggal_acara']; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
				} // kurung kurawal penutup untuk foreach
				?>

                    <div class="col-12 text-center wow fadeIn" data-wow-delay="0.2s">
                        <a class="btn btn-primary btn-primary-outline-0 py-3 px-5 me-2" href="#">View All <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Gallery end -->
<?php
include('template/footer.php');
?>