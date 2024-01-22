<?php 

include('template/header.php');
include('config_query.php');
$db= new database ();
$id_portofolio =$_GET['id'];
if(!empty($id_portofolio)){
  $data = $db->get_by_id($id_portofolio);
  if(empty($data)){
    echo "<script>alert('Id Portofolio tidak ditemukan!');document.location.href='index.php';</script>";

  }
}else{
  echo "<script>alert('Anda Belum memilih Portofolio!');document.location.href='index.php';</script>";
}
// var_dump($db);
// die;
?>
<!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="index.php"> Manajemen Portofolio </a>/</span> Ubah data</h4>

              <div class="row">
                <!-- Form controls -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header">
                        <h4>Ubah Portofolio Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="proses_aksi.php?aksi=update" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id_portofolio" value="<?= $data['id_portofolio']; ?>">
                            <div class="row">
                               <div class="col-lg-9">
                               <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Judul Portofolio*</label>
                                <input
                                type="text"
                                name="judul_acara"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="Judul Acara" value="<?= $data['judul_acara']; ?>" required>
                                </div>
                                <div class="form-group">
                                      <label for="exampleFormControlInput2" class="form-label">Tanggal Acara</label>
                                      <input type="date" class="form-control py-3 border-0" id="exampleFormControlInput2" placeholder="Judul Acara" value="<?= $data['tanggal_acara']; ?>" name="tanggal_acara"required>
                                </div>
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
                                  <?php 
                                  if($data['header']!=""){ ?>
                                  <a href="../portofolio/<?= $data['header']; ?>" target="_blank">
                                    <img src="../portofolio/<?= $data['header']; ?>" class="img-thumbnail rounded" style="max-width:160px" >
                                  </a>
                                  <?php
                                  }else{
                                    echo '<i class="text-danger">File Not Set!</i>';
                                  }
                                  ?>
                                </div>
                               </div> 
                            </div>
                            <hr>
                            <div class="mb-3 float-end">
                                <a href="index.php" class="btn btn-danger">Batalkan</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

 <?php 
include('template/footer.php');
?>