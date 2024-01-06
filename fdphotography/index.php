<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Utama</title>
	<link rel="icon" href="./image/logo.jpg">
</head>
<body>

<section class="konten">
	<?php include 'navbar.php'; ?><br><br><br>
	<div class="container"><br>
		
		<?php include 'slider.php'; ?><br>
		<?php include 'categories.php';?><br><br>
		<?php include 'price.php';?>
	</div>	
</section>
<style>
	h1{
		display: fixed;
		text-align: center;
	}
</style>

<?php include 'footer.php'; ?>
</body>
</html>
