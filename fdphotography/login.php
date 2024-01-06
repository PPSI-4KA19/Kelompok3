<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
	<?php 
	if (isset($_POST["LOGIN"]))
	{
		$email=$_POST ["email"];
		$password=$_POST ["password"];
		$cek=$koneksi->query("SELECT * FROM pelanggan
			WHERE email='$email' AND password='$password'");
		$akunada=$cek->num_rows;
		if($akunada==1)
		{
			$akun =$cek->fetch_assoc();
			$_SESSION["pelanggan"]=$akun;
			echo "<script> alert('anda sukses login');</script>";
			echo "<script> location ='index.php';</script>";
		}
		else
		{
			echo "<script> alert('anda gagal login, cek akun anda');</script>";
			echo "<script> location ='login.php';</script>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Login</p>
 
		<form  method="post">
			<label>email</label>
			<input type="text" name="email" class="form_login"  required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" required="required">
 
			<input type="submit" class="tombol_login" name="LOGIN">
			
			 Don't have account?<a href="signup.php">Sign Up</a>
			<br/>
			<br/>
		</form>
		
	</div>
 
 
</body>
</html>
