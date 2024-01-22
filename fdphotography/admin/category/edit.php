<?php 
include('config_query.php');
$db= new database ();
$id_category =$_GET['id'];
if(!empty($id_category)){
  $data = $db->get_by_id($id_category);
  if(empty($data)){
    echo "<script>alert('Id Category tidak ditemukan!');document.location.href='kelola_category.php';</script>";

  }
}else{
  echo "<script>alert('Anda Belum memilih Category!');document.location.href='kelola_category.php';</script>";
}
// var_dump($db);
// die;
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/admin/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin FD Photography</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/admin/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/admin/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/admin/assets/js/config.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="../index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="../../assets/admin/assets/img/favicons/logo.jpg">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">FD Photography</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="../index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item active">
              <a href="kelola_category.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Kelola Galery Category</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="../price/kelola_price.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Tables">Kelola Price</div>
              </a>
            </li>
          </ul>

          
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                Admin FD Phtography
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->


                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/admin/assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../assets/admin/assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">ADMIN</span>
                            <!-- <small class="text-muted">Admin</small> -->
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">


<!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="kelola_category.php"> Manajemen Category </a>/</span> Ubah data</h4>

              <div class="row">
                <!-- Form controls -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header">
                        <h4>Ubah Category Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="proses_aksi.php?aksi=update" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id_category" value="<?= $data['id_category']; ?>">
                            <div class="row">
                               <div class="col-lg-9">
                               <div class="mb-3">
                               <select class="form-control" id="exampleselect" name="jenis_category" placeholder="Select category" value="<?= $data['jenis_category']; ?>" required>
                                                    <option value="<?= $data['jenis_category']; ?>">Select Category</option>
                                                    <option value="1">Engagement</option>
                                                    <option value="2">Prewedding</option>
                                                    <option value="3">Wedding</option>
                                                    <option value="4">Graduation</option>
                                                    <option value="5">Product</option>
                                                </select>
                                </div>
                                <div class="col-lg-3">
                               <div class="col-md mb-3">
                                <small class="form-label d-block">Status Publish*</small>
                                <div class="form-check mt-3">
                                    <input name="status_publish" class="form-check-input" type="radio" value="publish" id="defaultRadio1" <?= ($data['status_publish'] == 'publish') ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="defaultRadio1"> Publish </label>
                                </div>
                                <div class="form-check">
                                    <input name="status_publish" class="form-check-input" type="radio" value="draft" id="defaultRadio2" <?= ($data['status_publish'] == 'draft') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="defaultRadio2"> Draft </label>
                                </div>
                                </div>
                               </div>
                               <div class="mb-3">
                                <label for="uploadHeader" class="form-label">Gambar Header*</label>
                                <input
                                    type="file"
                                    name="header"
                                    class="form-control"
                                    id="uploadHeader"
                                    <?= ($data['header'] == '') ? 'required' : ''; ?>
                                />
                                <small class="text-danger">Mark Size 5Mb, ext. png, jpeg</small>
                            </div>
                            <div class="mb-3">
                                <label for="preview" class="form-label">Preview Gambar</label>
                                <?php if ($data['header'] != "") { ?>
                                    <a href="../../categories/landing/img/<?= $data['jenis_category']; ?>/<?= $data['header']; ?>" target="_blank">
                                        <img src="../../categories/landing/img/<?= $data['jenis_category']; ?>/<?= $data['header']; ?>" class="img-thumbnail rounded" style="max-width: 80px">
                                    </a>
                                <?php } else {
                                    echo '<i class="text-danger">File Not Set!</i>';
                                } ?>
                            </div>

                            </div>
                            <hr>
                            <div class="mb-3 float-end">
                                <a href="kelola_category.php" class="btn btn-danger">Batalkan</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. FD Photography</a>, All right reserved.
                </div>
                <div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../assets/admin/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.summernote').summernote({
          placeholder: 'Inputkan Keterangan Acara disini!',
          tabsize: 2,
          height: 280,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      });
    </script>
  </body>
</html>