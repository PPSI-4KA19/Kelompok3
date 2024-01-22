<?php
include("template/header.php");
include("config_query.php");
$db = new database();
$data_portofolio =$db->tampil_data();
?>

<!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manajemen /</span> Portofolio</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">

              <!-- Responsive Table -->
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                    <div class="row">
                      <div class="col-lg-6">
                        <h5>Daftar Portofolio</h5>
                      </div>
                      <div class="col-lg-6">
                        <div class="float-end">
                          <a href="tambah_data.php" class="btn btn-primary">
                            <i class="bx bx-plus"></i>
                            Tambah Data
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th class="text-center bg-primary text-white">No</th>
                        <th class="text-center bg-primary text-white">Gambar Portofolio</th>
                        <th class="text-center bg-primary text-white">Judul Acara</th>
                        <th class="text-center bg-primary text-white">Status Publish</th>
                        <th class="text-center bg-primary text-white">Tanggal Acara</th>
                        <!-- <th class="text-center bg-primary text-white">Tanggal Update</th> -->
                        <th class="text-center bg-primary text-white">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      if($data_portofolio== '0'){
                        echo "Data Tidak Tersedia!";
                      } else {
                      $no = 1;
                      foreach ($data_portofolio as $row) {

                       
                      ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td>
                          <a href="../portofolio/<?= $row['header']; ?>" target="_blank">
                          <img src="../portofolio/<?= $row['header']; ?>" class="img-thumbnail rounded" style="max-width: 80px">
                          </a>
                        </td>
                        <td class="text-center"><?= $row['judul_acara'] ?></td>
                        <td class="text-center"><?= $row['status_publish'] ?></td>
                        <td class="text-center"><?= $row['tanggal_acara'] ?></td>

                        <td>
                          <a href="edit.php?id=<?= $row['id_portofolio']; ?>" class="btn btn-sm btn-warning">Ubah</a>
                          <a href="proses_aksi.php?id=<?= $row['id_portofolio']; ?>&aksi=delete" class="btn btn-sm 
                          btn-danger" onclick="return confirm('Apakah anda yakin akan memghapus artikel ini?');">Hapus</a>
                        </td>
                      </tr>
                    <?php } 
                  }?>

                    </tbody>
                  </table>
                </div>
                </div>
              </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->
<?php
include("template/footer.php");
?>