<?php

// $pass = password_hash('fdphotography12', PASSWORD_DEFAULT);
// var_dump($pass);
// die;

include('admin/config_query.php');
$db = new database();

//inisialisasi session
session_start();

//Cek Session aktif
if(isset($_SESSION['$username']) || isset($_SESSION['id_admin'])){
    header('Location: admin/index.php');
} else {

    //Cek apakah form disubmit?
if(isset($_POST['submit'])){

    //Menghilangkan backshlases
    $username = stripcslashes($_POST['username']);
    $password = stripcslashes($_POST['password']);

    //Cek Nilai username password apakah kosong?
    if(!empty(trim($username)) && !empty(trim($password))) {
        //Select data tb_users berdasarkan username

        $query = $db->get_data_admin($username);

        if($query){
            $rows =mysqli_num_rows($query);
        }else{
            $rows = 0;
        }

        //Cek ketersediaan data username
        if($rows != 0) {
            $getData = $query->fetch_assoc();

            if (password_verify($password, $getData['password'])){

                $_SESSION['username']= $username;
                $_SESSION['id_admin']= $getData['id_admin'];

                header('location: admin/index.php');
            }else{
                header("location:login.php?pesan=gagal");
            }


        } else {
            header("location:login.php?pesan=notfound");
        }

    }else{
        header("location:login.php?pesan=empty");
    }
} else {
    header("location:login.php?pesan=empty");
}
}
