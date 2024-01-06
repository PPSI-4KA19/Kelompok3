<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
	<?php 
	if (isset($_POST["Signup"])) 
    {
        $nama = $_POST['nama_pelanggan'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nohp = $_POST['no_hp'];

        //cek email apakah sudah terpakai
        $cek=$koneksi->query("SELECT * FROM pelanggan 
            WHERE email='$email'");
        $ada=$cek->num_rows;
        if ($ada==1) 
        {
            echo "<script>alert('pendaftaran gagal, email sudah digunakan')</script>";
            echo "<script>location='signup.php';</script>";
        }
        else
        {
            $koneksi->query("INSERT INTO pelanggan (nama_pelanggan, email, password, no_hp) 
            VALUES ('$nama','$email','$password','$nohp')");

            echo "<script>alert('pendaftaran berhasil')</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Sign Up</p>
 
		<form method="post">
			<label>Nama</label>
			<input type="text" name="nama_pelanggan" class="form_login" required="required">
 
			<label>Email</label>
			<input type="text" name="email" class="form_login" required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" required="required">

            <label>Nomor Hp</label>
            <input type="int" name="no_hp" class="form_login" required="required">
 
			<input type="submit" class="tombol_login" name="Signup" value="Signup">
			
			 Already have account?<a href="login.php">Login</a>
			<br/>
			<br/>
		</form>
		
	</div>
 
 
</body>
</html>
