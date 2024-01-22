<?php
//membuat class dengan nama database

class database
{
    var $host ='localhost';
    var $username = "root";
    var $password = "";
    var $database = "db_fdphotography";
    var $koneksi ="";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if(mysqli_connect_errno()){
            echo "Koneksi database Gagal : ". mysqli_connect_error();
        }
    }

    //Get Data tb_admin
    public function get_data_admin($username)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_admin WHERE username ='$username' ");

        return $data;
    }

        // Get Data tb_portofolio halaman landing
        public function tampil_data_landing()
        {
            $data = mysqli_query($this->koneksi, "SELECT id_portofolio, header, judul_acara, tanggal_acara, status_publish, tba.created_at, tba.updated_at, name, tba.id_admin FROM tb_portofolio tba join tb_admin tbu on tba.id_admin = tbu.id_admin
             where status_publish='publish'");
    
            if($data){
                if(mysqli_num_rows($data)>0) {
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }else{
                $hasil = '0';
            }
        
            }
    
            return $hasil;
        }

    // Get Data tb_portofolio halaman admin
    public function tampil_data()
    {
        $data = mysqli_query($this->koneksi, "SELECT id_portofolio, header, judul_acara, tanggal_acara, status_publish, tba.created_at, tba.updated_at, name, tba.id_admin FROM tb_portofolio tba join tb_admin tbu on tba.id_admin = tbu.id_admin");

        if($data){
            if(mysqli_num_rows($data)>0) {
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }else{
            $hasil = '0';
        }
    
        }

        return $hasil;
    }

    public function tambah_data($header,$judul_acara,$tanggal_acara,$status_publish,$id_admin)
    {
        $datetime = date("Y-m-d H:i:s");
        $insert = mysqli_query($this->koneksi, "INSERT into tb_portofolio (header, judul_acara, tanggal_acara, status_publish, id_admin,
        created_at) values ('$header','$judul_acara','$tanggal_acara','$status_publish','$id_admin','$datetime')")
        or die(mysqli_error($this->koneksi));

        return $insert;
    }

    public function get_by_id($id_portofolio)
    {
        $query = mysqli_query($this->koneksi, "SELECT id_portofolio, header, judul_acara, tanggal_acara, status_publish, tba.created_at, tba.updated_at, name, tba.id_admin FROM tb_portofolio tba join tb_admin tbu on tba.id_admin = tbu.id_admin where id_portofolio ='$id_portofolio' ")
        or die(mysqli_error($this->koneksi));
        return $query->fetch_array();
    }

    public function update_data($header, $judul_acara, $tanggal_acara, $status_publish, $id_portofolio, $id_admin) 
    {
        $datetime = date("Y-m-d H:i:s");
        if($header== 'not_set'){
            $query = mysqli_query($this->koneksi,"UPDATE tb_portofolio set judul_acara = '$judul_acara', tanggal_acara = '$tanggal_acara', status_publish = '$status_publish', id_admin = '$id_admin', updated_at = '$datetime' where id_portofolio = '$id_portofolio' ")
            or die(mysqli_error($this->koneksi));
            return $query;

        }else {
            $query = mysqli_query($this->koneksi,"UPDATE tb_portofolio set header = '$header', judul_acara = '$judul_acara', tanggal_acara = '$tanggal_acara', status_publish = '$status_publish', id_admin = '$id_admin', updated_at = '$datetime' where id_portofolio = '$id_portofolio' ")
            or die(mysqli_error($this->koneksi));
            return $query;

        }
        
    }

    public function delete_data($id_portofolio)
    {
        $query = mysqli_query($this->koneksi,"DELETE from tb_portofolio where id_portofolio ='$id_portofolio'")
        or die(mysqli_error($this->koneksi));
        return $query;
    }

}
