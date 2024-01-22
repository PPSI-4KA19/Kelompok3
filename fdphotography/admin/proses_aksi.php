<?php 
include('config_query.php');
$db = new database();
session_start();
$id_admin = $_SESSION['id_admin'];
$aksi = $_GET['aksi'];

if ($aksi == "add") {
    // Cek file sudah dipilih atau belum

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    // die;

    if($_FILES["header"]["name"] != ''){

        $tmp =explode('.',$_FILES["header"]["name"]); //Memecah nama file dan extension
        $ext = end($tmp); //Mengambil extention
        $filename = $tmp[0]; //Mengambil nilai nama file tanpa extension
        $allowed_ext = array("jpg","png","jpeg","JPG"); // extension file yang diizinkan

        if(in_array($ext,$allowed_ext)){ //cek validasi extension

            if($_FILES["header"]["size"] <= 5120000000){ //cel ukaran gambar, maks 5mb
                $name = $filename.'_'.rand().'.'.$ext; //Rename nama file gambar
                $path = "../portofolio/".$name; //lokasi upload file
                $uploaded = move_uploaded_file($_FILES["header"]["tmp_name"], $path); //Memindahkan File

                
                if($uploaded){
                    $insertData = $db->tambah_data($name,$_POST["judul_acara"],$_POST["tanggal_acara"],$_POST["status_publish"],$id_admin); //query insert data

                    if($insertData) {
                        echo "<script>alert('Data Berhasil Di Tambahkan!');document.location.href = 'index.php';</script>";
                    } else{
                        echo "<script>alert('Upss...Data Gagal Di Tambahkan!');document.location.href = 'index.php';</script>";
                    }
                }else{
                    echo "<script>alert('Upsss!!! Upload File Gagal!');document.location.href = 'tambah_data.php';</script>";
                }
            }else{
                echo "<script>alert('Ukuran gambar lebih dari 5mb!');document.location.href = 'tambah_data.php';</script>";
            }
        }else{
            echo "<script>alert('File yang diupload bukan extensi yang diizinkan!');document.location.href = 'tambah_data.php';</script>";
        } 
    } else {
        echo "<script>alert('Silahkan Pilih File Gambar');document.location.href = 'tambah_data.php';</script>";
    }
} elseif ($aksi == "update") {
    $id_portofolio = $_POST['id_portofolio'];
    if(!empty($id_portofolio)){ //Cek apakah id artikel tersedia?

        if($_FILES['header']['name']!=''){ //Cek apakah melakukan upload file?
           
            $data = $db->get_by_id($id_portofolio);

            //Operasi Hapus File
            if(file_exists('../portofolio/' . $data['header']) && $data['header'])
                unlink('../portofolio/' . $data['header']);

                $tmp =explode('.',$_FILES["header"]["name"]); //Memecah nama file dan extension
                $ext = end($tmp); //Mengambil extention
                $filename = $tmp[0]; //Mengambil nilai nama file tanpa extension
                $allowed_ext = array("jpg","png","jpeg","JPG"); // extension file yang diizinkan
        
                if(in_array($ext, $allowed_ext)){ //cek validasi extension
        
                    if($_FILES["header"]["size"] <= 5120000){ //cek ukaran gambar, maks 5mb
                        $name = $filename . '_' . rand() . '.' . $ext; //Rename nama file gambar
                        $path = "../portofolio/".$name; //lokasi upload file
                        $uploaded = move_uploaded_file($_FILES["header"]["tmp_name"], $path); //Memindahkan File
        
                        
                        if($uploaded){
                            $updateData = $db->update_data($name, $_POST["judul_acara"], $_POST["isi_artikel"], $_POST["status_publish"], $_POST['id_portofolio'], $id_admin); //Query Update Data
                            if($updateData) {
                                echo "<script>alert('Data Berhasil Di Tambahkan!');document.location.href = 'index.php';</script>";
                            } else{
                                echo "<script>alert('Upss...Data Gagal Di Tambahkan!');document.location.href = 'index.php';</script>";
                            }
                        }else{
                            echo "<script>alert('Upsss!!! Upload File Gagal!');document.location.href = 'edit.php?id=". $id_portofolio ."';</script>";
                        }
                    }else{
                        echo "<script>alert('Ukuran gambar lebih dari 5mb!');document.location.href = 'edit.php?id=". $id_portofolio ."';</script>";
                    }
                }else{
                    echo "<script>alert('File yang diupload bukan extensi yang diizinkan!');document.location.href = 'edit.php?id=". $id_portofolio ."';</script>";
                }

        }else {
            $updateData = $db->update_data('not_set',$_POST['judul_acara'],$_POST['tanggal_acara'],$_POST['status_publish'],$_POST['id_portofolio'],$id_admin);

            if($updateData){
                echo "<script>alert('Data Berhasil di Ubah!');document.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Data Gagal di Ubah!');document.location.href = 'index.php';</script>";
            }
        }
    }else{
        echo "<script>alert('Anda belum memilih Portofolio');document.location.href = 'index.php';</script>";
    }
} elseif ($aksi == "delete") {
    $id_portofolio = $_GET['id'];
    if(!empty($id_portofolio)){
        $data = $db->get_by_id($id_portofolio);
      
        //Operasi Hapus File
        if(file_exists('../portofolio/' . $data['header']) && $data['header'])
        unlink('../portofolio/' . $data['header']);
        
        $deleteData = $db->delete_data($id_portofolio);
        if($deleteData){
            echo "<script>alert('Data Berhasil di Hapus!');document.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Data Gagal di Hapus!');document.location.href = 'index.php';</script>";
        }

    }else{
        echo "<script>alert('Anda belum memilih Artikel');document.location.href = 'index.php';</script>";

    }


} else {
    echo "<script>alert('Anda tidak mendapatkan akses untuk operasi ini!');document.location.href = 'index.php';</script>";
}
