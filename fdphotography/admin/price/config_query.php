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

        // Get Data tb_price halaman landing
        public function tampil_data_landing()
        {
            $data = mysqli_query($this->koneksi, "SELECT id_price, hour, enhanced_photos, status_publish, name, tba.id_admin FROM tb_price tba join tb_admin tbu on tba.id_admin = tbu.id_admin
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

    // Get Data tb_price halaman admin
    public function tampil_data()
    {
        $data = mysqli_query($this->koneksi, "SELECT id_price, hour, enhanced_photos, status_publish, name, tba.id_admin FROM tb_price tba join tb_admin tbu on tba.id_admin = tbu.id_admin");
    
        $hasil = array(); // Tambahkan inisialisasi $hasil sebagai array
    
        if ($data) {
            if (mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            } else {
                $hasil = '0';
            }
        }
    
        return $hasil;
    }

    public function tambah_data($hour,$enhanced_photos, $status_publish,$id_admin)
    {
        $insert = mysqli_query($this->koneksi, "INSERT into tb_price (hour, enhanced_photos, status_publish, id_admin) values ('$hour','$enhanced_photos','$status_publish','$id_admin')")
        or die(mysqli_error($this->koneksi));

        return $insert;
    }

    public function get_by_id($id_price)
    {
        $query = mysqli_query($this->koneksi, "SELECT id_price, hour, enhanced_photos, status_publish, name, tba.id_admin FROM tb_price tba join tb_admin tbu on tba.id_admin = tbu.id_admin where id_price ='$id_price' ")
        or die(mysqli_error($this->koneksi));
        return $query->fetch_array();
    }

    public function update_data($hour, $enhanced_photos, $status_publish, $id_price, $id_admin) 
    {
        if($hour== 'not_set'){
            $query = mysqli_query($this->koneksi,"UPDATE tb_price set enhanced_photos = '$enhanced_photos', status_publish = '$status_publish', id_admin = '$id_admin' where id_price = '$id_price' ")
            or die(mysqli_error($this->koneksi));
            return $query;

        }else {
            $query = mysqli_query($this->koneksi,"UPDATE tb_price set hour = '$hour', enhanced_photos = '$enhanced_photos', status_publish = '$status_publish', id_admin = '$id_admin' where id_price = '$id_price' ")
            or die(mysqli_error($this->koneksi));
            return $query;

        }
        
    }

    public function delete_data($id_price)
    {
        $query = mysqli_query($this->koneksi,"DELETE from tb_price where id_price ='$id_price'")
        or die(mysqli_error($this->koneksi));
        return $query;
    }

}
