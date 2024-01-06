<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="./image/logo.jpg">
	<title>Halaman Utama Fd Photography</title>
	<style>
 	*{
        --nav-height: 70px;
 		margin:0; 
 		padding:0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
 	}
    #navbar{
        overflow: hidden;
    }

	nav {
        margin:auto;
		text-align: center;
		width: 100%;
		font-family: arial;
        display: grid;
        grid-template-columns: auto 1fr;
        grid-auto-flow: column;
        place-content: center;
        gap: 0.1em;

	} 
	nav>a img,
    nav>a {
        height : calc(var(--nav-height));
        border-radius: 0 0.5em 0.5em 0;
    }
	nav ul {
		background:#6D6B6C;
		padding: 0 20px;
		list-style: none;
		display: grid;
        grid-auto-flow: column;
        grid-auto-columns: auto;
        place-content : center end;
        padding-right : 0.2emn;
		width: 100%;
	 }

	nav ul li{
        display : grid;
		place-content : center;
	}

	nav ul li:hover{
		background:#565656;
	}

	nav ul li:hover a{
	 	color:#000;
	}

	nav ul li a{
	 	display: grid;
	 	padding: 25px;
	 	color: #fff;
	 	text-transform: uppercase;
        height: var(--nav-height);
        place-content: center;
        padding: 0 1vw;
	}

    .logo {
        width: 100px;
        height: 50px;
        position: absolute;
        top: 10px;
        left: 5px;
    }
    .content {
    padding: 16px;
    }

	</style>

</head>
<body>
<script>
    // When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
<nav>
    <a href="index.php">
    <img src="./image/logo.jpg" alt="logo">
</a>
    <div id="navbar">
 	<ul>
	 	<li><a href="index.php">HOME</a></li>
	 	<li><a href="categories.php">CATEGORIES</a></li>
	 	<li><a href="price.php">PRICE</a></li>
        <li><a href="portofolio.php">PORTOFOLIO</a></li>
		<li><a href="login.php">LOGIN</></li>
 	</ul>
    </div>
</nav>
</body>
</html>
