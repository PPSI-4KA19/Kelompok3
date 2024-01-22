<?php
include('admin/price/config_query.php');
$db = new database();
$data_price = $db->tampil_data_landing();

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

        <!-- Carousel Start -->
        <div class="container-fluid carousel-header px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="assets/landing/img/prewed-1.jpg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">WELCOME TO</h4>
                                </div>
                                <h1 class="display-1 text-capitalize text-white mb-3">FD Photography</h1>
                                <div class="d-flex align-items-center justify-content-center">
                                <a class="btn btn-gold btn-gold-outline-0 py-3 px-5" href="book.php">Book Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/landing/img/slide1.jpeg" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">WELCOME TO</h4>
                                </div>
                                <h1 class="display-1 text-capitalize text-white mb-3">FD Photography</h1>
                                <div class="d-flex align-items-center justify-content-center">
                                <a class="btn btn-gold btn-gold-outline-0 py-3 px-5" href="book.php">Book Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/landing/img/slide3.jpg" class="img-fluid bg-secondary" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3 mx-auto animated zoomIn" style="max-width: 900px;">
                                <div class="d-inline-block border-end-0 border-start-0 border-secondary p-2 mb-4" style="border-style: double;">
                                    <h4 class="text-white text-uppercase fw-bold mb-0" style="letter-spacing: 3px;">WELCOME TO</h4>
                                </div>
                                <h1 class="display-1 text-capitalize text-white mb-3">FD Photography</h1>
                                <div class="d-flex align-items-center justify-content-center">
                                <a class="btn btn-gold btn-gold-outline-0 py-3 px-5" href="book.php">Book Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->

<!--- Bridesmaids & Groomsmen start -->
        <div class="container-fluid team position-relative py-5 " id="category" style="background: url('assets/landing/img/bg-batik.png')">
            <div class="container py-5">
                <div class="mb-5 text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-2 text-dark">Select Category</h1>
                </div>
                <div class="row g-4 justify-content-md-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item" style="max-height: 450px;">
                            <div class="team-img">
                                <div class="team-img-main" style="max-height: 450px;">
                                    <img src="assets/landing/img/bg-engangement.jpeg" class="img-fluid w-100 max-width-00" alt="">
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="d-flex flex-column p-4 align-self-center">
                                    <h5 class="text-white display-6 mb-1"><a href="categories/engagement.php">Engagement <br>Photography</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img" style="max-height: 450px;">
                                <div class="team-img-main" style="max-height: 450px;">
                                    <img src="assets/landing/img/bg-prewed.jpeg" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="d-flex flex-column p-4 align-self-center">
                                    <h5 class="text-white display-6 mb-1"><a href="categories/prewedding.php">Prewedding <br>Photography</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item" style="max-height: 450px;">
                            <div class="team-img">
                                <div class="team-img-main" style="max-height: 450px;">
                                    <img src="assets/landing/img/bg-wedding2.jpeg" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="d-flex flex-column p-4 align-self-center">
                                    <h5 class="text-white display-6 mb-1"><a href="categories/wedding.php">Wedding <br>Photography</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 justify-content-md-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item" style="max-height: 305px;">
                            <div class="team-img">
                                <div class="team-img-main" style="max-height: 305px;">
                                    <img src="assets/landing/img/slide4.jpg" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="d-flex flex-column p-4 align-self-center">
                                    <h5 class="text-white display-6 mb-1"><a href="categories/graduate.php">Graduate <br>Photography</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <div class="team-img-main">
                                    <img src="assets/landing/img/bg-product.jpg" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="d-flex flex-column p-4 align-self-center">
                                    <h5 class="text-white display-6 mb-1"><a href="categories/product.php">Product <br>Photography</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bridesmaids & Groomsmen End -->
        
<div>

</div>

        <!-- Price -->
        <div class="container-fluid wedding-timeline position-relative overflow-hidden py-5" id="price" style="background: url('assets/landing/img/bg-batik.png')">
            <div class="container py-5">
            <div class="text-center mb-5">
            <h1 class="display-3 text-richblack">Price</h1>
            </div>
        <div class="position-relative wedding-content">
            <div class="row g-4">
            <?php
				foreach($data_price as $row) {
				?>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 border-content border-bottom-0">
                    <div class="text-center p-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="mb-4 p-3 d-inline-flex">
                            <i class="fas fa-camera text-dark fa-3x"></i>
                        </div>
                        
                        <h3 class="text-dark"><?= $row['hour']; ?></h3>
                        <p class="text-dark"><?= $row['enhanced_photos']; ?></p>
                    </div>
                </div>

                <?php
				} // kurung kurawal penutup untuk foreach
				?>

                <div class="d-flex align-items-center justify-content-center">
                    <a class="btn btn-gold btn-gold-outline-0 py-3 px-5" href="book.php">Book Now</a>
                </div>

            </div>
        </div>
    </div>
</div>

        <!-- Wedding Timeline End -->

<?php
include('template/footer.php');
?>