<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Ambil nilai dari formulir
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $nohp = $_POST["no_hp"];

    // Set peran (role) default untuk pelanggan
    $role = 'pelanggan';

    // Lakukan validasi atau verifikasi pendaftaran di sini menggunakan koneksi database
    $query = "INSERT INTO tb_pelanggan (username, email, password, no_hp, role) VALUES ('$username', '$email', '$password', '$nohp', '$role')";
    
    if ($password !== $confirm_password) {
      echo "<script>alert('Password and Confirm Password do not match. Please try again.');</script>";
      // Lakukan tindakan lainnya sesuai kebutuhan
    }else {

    if ($koneksi->query($query) === TRUE) {
        // Pendaftaran berhasil, mungkin arahkan ke halaman login atau lakukan tindakan lainnya
        header("Location: login.php");
        exit(); 
    } else {
        // Pendaftaran gagal, tampilkan pesan kesalahan atau lakukan tindakan lainnya
        $error_message = "Registration failed. Please try again.";
    }
    }
}
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register - Pages | FD Photography</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/admin/assets/img/favicons/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/admin/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/admin/assets/js/config.js"></script>
  </head>

  <body style="background: url('assets/admin/assets/img/backgrounds/bg-batik.png');" >
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.php" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="assets/admin/assets/img/favicons/logo.jpg">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Register at FD Photography👋</h4>
                        <p class="mb-4"></p>

                        <form id="formRegistration" class="mb-3" action="" method="POST" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label for="nohp" class="form-label">Nomor Telepon</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="nohp"
                                    name="no_hp"
                                    placeholder="Enter your Phone Number"
                                    pattern="[0-9]*"
                                    autofocus
                                />
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    placeholder="Enter your username"
                                    autofocus
                                />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email"
                                    autofocus
                                />
                            </div>

                            <!-- Tambahkan field tambahan seperti nama, password, atau konfirmasi password sesuai kebutuhan -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="Enter your password"
                                    aria-describedby="password"
                                />
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    id="confirmPassword"
                                    class="form-control"
                                    name="confirm_password"
                                    placeholder="Confirm your password"
                                    aria-describedby="confirmPassword"
                                />
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" name="register">Register</button>
                            </div>
                        </form>

    <script>
    function validateForm() {
        // Ambil nilai dari bidang formulir
        var nohp = document.getElementById("nohp").value;
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Lakukan validasi
        if (nohp === "" || username === "" || email === "" || password === "" || confirmPassword === "") {
            alert("Data masih ada yang kosong, mohon diisi semua!");
            return false; // Mencegah formulir dikirim jika ada bidang yang kosong
        }

        // Lakukan validasi tambahan jika diperlukan

        return true; // Kirim formulir jika semua validasi berhasil
    }
</script>

              <p class="text-center">
                <a href="login.php">
                  <span>Already Have an account? Login Here</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/admin/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
