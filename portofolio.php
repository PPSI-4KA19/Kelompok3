<?php include 'koneksi.php'; ?>
<?php include 'navbar.php'; ?><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
</head>
<style> 
        .logo-container {
            text-align: center;
            display: fixed;
        }

        .logo {
            width: 100px;
            height: auto; 
        }

        .logo-name {
            margin-top: 20px;
            font-size: 18px; 
            color: black; 
            font-family: 'Playfair Display Extrabold',sans-serif;
        }
.row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    flex: 100%;
    max-width: 100%;
  }
}


</style>

<body>
<div class="logo-container">
        <img src="./image/logo.jpg" alt="Logo Fd" class="logo">
        <div class="logo-name">FdPhotography adalah sebuah wadah photography untuk anda yang ingin mengabadikan
            <br> momen indah dalam hidup anda dengan potret yang memukau.<br><br></div>

    <div class="row">
  <div class="column">
    <img src="./image/slide1.jpeg">
    <img src="./image/slide2.jpg">
    <img src="./image/slide3.jpg">
    <img src="./image/slide4.jpg">
    <img src="./image/slide5.png">
    <img src="./image/slide6.jpg">
    <img src="./image/slide7.jpg">
  </div>
  <div class="column">
    <img src="./image/slide6.jpg">
    <img src="./image/slide2.jpg">
    <img src="./image/slide4.jpg">
    <img src="./image/slide13.jpg">
    <img src="./image/slide3.jpg">
    <img src="./image/slide2.jpg">
  </div>
  <div class="column">
    <img src="./image/slide12.jpg">
    <img src="./image/slide9.jpg">
    <img src="./image/slide11.jpg">
    <img src="./image/slide6.jpg">
    <img src="./image/slide7.jpg">
    <img src="./image/slide8.jpg">
    <img src="./image/slide9.jpg">
  </div>
  <div class="column">
    <img src="./image/slide10.jpeg">
    <img src="./image/slide11.jpg">
    <img src="./image/slide12.jpg">
    <img src="./image/slide13.jpg">
    <img src="./image/slide14.webp">
    <img src="./image/slide15.jpeg">
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>