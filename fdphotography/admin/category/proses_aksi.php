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

    if ($aksi == "add") {
        // Cek file sudah dipilih atau belum
    
        if($_FILES["header"]["name"] != ''){
    
            $tmp =explode('.',$_FILES["header"]["name"]); //Memecah nama file dan extension
            $ext = end($tmp); //Mengambil extention
            $filename = $tmp[0]; //Mengambil nilai nama file tanpa extension
            $allowed_ext = array("jpg","png","jpeg","JPG"); // extension file yang diizinkan
    
            if(in_array($ext,$allowed_ext)){ //cek validasi extension
    
                if($_FILES["header"]["size"] <= 5120000000){ //cel ukaran gambar
                    $name = $filename.'_'.rand().'.'.$ext; //Rename nama file gambar
    
                    switch ($_POST['jenis_category']) {
                        case 1:
                            $path = "../../categories/landing/img/engagement/".$name;
                            break;
                        case 2:
                            $path = "../../categories/landing/img/prewedding/".$name;
                            break;
                        case 3:
                            $path = "../../categories/landing/img/wedding/".$name;
                            break;
                        case 4:
                            $path = "../../categories/landing/img/graduation/".$name;
                            break;
                        case 5:
                            $path = "../../categories/landing/img/product/".$name;
                            break;
                    }
    
                    $uploaded = move_uploaded_file($_FILES["header"]["tmp_name"], $path); //Memindahkan File
    
                    
                    if($uploaded){
                        $insertData = $db->tambah_data($name,$_POST["jenis_category"],$_POST["status_publish"],$id_admin); //query insert data
    
                        if($insertData) {
                            echo "<script>alert('Data Berhasil Di Tambahkan!');document.location.href = 'kelola_category.php';</script>";
                        } else{
                            echo "<script>alert('Upss...Data Gagal Di Tambahkan!');document.location.href = 'kelola_category.php';</script>";
                        }
                    }else{
                        echo "<script>alert('Upsss!!! Upload File Gagal!');document.location.href = 'tambah_category.php';</script>";
                    }
                }else{
                    echo "<script>alert('Ukuran gambar lebih dari 5mb!');document.location.href = 'tambah_category.php';</script>";
                }
            }else{
                echo "<script>alert('File yang diupload bukan extensi yang diizinkan!');document.location.href = 'tambah_category.php';</script>";
            } 
        } else {
            echo "<script>alert('Silahkan Pilih File Gambar');document.location.href = 'tambah_category.php';</script>";
        }
    }
    
} elseif ($aksi == "update") {
    $id_category = $_POST['id_category'];
    if (!empty($id_category)) { // Cek apakah id kategori tersedia?

        if ($_FILES["header"]["name"] != '') {

            $tmp = explode('.', $_FILES["header"]["name"]); // Memecah nama file dan extension
            $ext = end($tmp); // Mengambil extention
            $filename = $tmp[0]; // Mengambil nilai nama file tanpa extension
            $allowed_ext = array("jpg", "png", "jpeg", "JPG"); // extension file yang diizinkan

            if (in_array($ext, $allowed_ext)) { // cek validasi extension

                if ($_FILES["header"]["size"] <= 5120000000) { // cek ukuran gambar
                    $name = $filename . '_' . rand() . '.' . $ext; // Rename nama file gambar

                    // Tentukan lokasi berdasarkan jenis_category
                    $jenis_category = $_POST['jenis_category'];
                    switch ($jenis_category) {
                        case 1:
                            $path = "../../categories/landing/img/engagement/" . $name;
                            break;
                        case 2:
                            $path = "../../categories/landing/img/prewedding/" . $name;
                            break;
                        case 3:
                            $path = "../../categories/landing/img/wedding/" . $name;
                            break;
                        case 4:
                            $path = "../../categories/landing/img/graduation/" . $name;
                            break;
                        case 5:
                            $path = "../../categories/landing/img/product/" . $name;
                            break;
                        default:
                            $path = ""; // Tentukan default jika jenis_category tidak dikenali
                    }

                    $uploaded = move_uploaded_file($_FILES["header"]["tmp_name"], $path); // Memindahkan File
                    if ($uploaded) {
                        $updateData = $db->update_data($name, $jenis_category, $_POST["status_publish"], $_POST['id_category'], $id_admin); // Query Update Data
                        if ($updateData) {
                            echo "<script>alert('Data Berhasil Diubah!');document.location.href = 'kelola_category.php';</script>";
                        } else {
                            echo "<script>alert('Upss...Data Gagal Diubah!');document.location.href = 'kelola_category.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Upsss!!! Upload File Gagal!');document.location.href = 'edit.php?id=" . $id_category . "';</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran gambar lebih dari 5mb!');document.location.href = 'edit.php?id=" . $id_category . "';</script>";
                }
            } else {
                echo "<script>alert('File yang diupload bukan extensi yang diizinkan!');document.location.href = 'edit.php?id=" . $id_category . "';</script>";
            }
        } else {
            $jenis_category = $_POST['jenis_category']; // Tambahkan baris ini
            $updateData = $db->update_data('not_set', $jenis_category, $_POST['status_publish'], $_POST['id_category'], $id_admin);

            if ($updateData) {
                echo "<script>alert('Data Berhasil Diubah!');document.location.href = 'kelola_category.php';</script>";
            } else {
                echo "<script>alert('Data Gagal Diubah!');document.location.href = 'kelola_category.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Anda belum memilih Portofolio');document.location.href = 'kelola_category.php';</script>";
    }
} elseif ($aksi == "delete") {
    $id_category = $_GET['id'];
    if(!empty($id_category)){
        $data = $db->get_by_id($id_category);

        // Tentukan path file gambar berdasarkan jenis_category
        $path = "";
        switch ($data['jenis_category']) {
            case 1:
                $path = "../../categories/landing/img/engagement/" . $data['header'];
                break;
            case 2:
                $path = "../../categories/landing/img/preweddingding/" . $data['header'];
                break;
            case 3:
                $path = "../../categories/landing/img/wedding/" . $data['header'];
                break;
            case 4:
                $path = "../../categories/landing/img/graduation/" . $data['header'];
                break;
            case 5:
                $path = "../../categories/landing/img/product/" . $data['header'];
                break;
        }

        // Hapus file jika ada
        if(file_exists($path) && $data['header']) {
            unlink($path);
        }

        // Hapus data dari database
        $deleteData = $db->delete_data($id_category);
        if($deleteData){
            echo "<script>alert('Data Berhasil di Hapus!');document.location.href = 'kelola_category.php';</script>";
        } else {
            echo "<script>alert('Data Gagal di Hapus!');document.location.href = 'kelola_category.php';</script>";
        }

    }else{
        echo "<script>alert('Anda belum memilih Artikel');document.location.href = 'kelola_category.php';</script>";

    }

} else {
    echo "<script>alert('Anda tidak mendapatkan akses untuk operasi ini!');document.location.href = 'kelola_category.php';</script>";
}
