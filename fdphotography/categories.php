<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price</title>
</head>
<body>
    <h1>categories<h1>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white;
            color: black;
            text-align: center;
            padding: 20px;
        }

        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .category {
            width: 200px;
            margin: 20px;
            text-align: center;
        }

        .category img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            cursor: pointer;
        }

        .category p {
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <header>
        <h1>Select Category</h1>
    </header>

    <div class="category-container">
        <div class="category" onclick="showDetails('engagement')">
            <img src="./image/slide3.jpg" alt="Engagement Photography">
            <p>Engagement Photography</p>
        </div>
        <div class="category" onclick="showDetails('prewedding')">
            <img src="prewedding.jpg" alt="Prewedding Photography">
            <p>Prewedding Photography</p>
        </div>
        <div class="category" onclick="showDetails('wedding')">
            <img src="wedding.jpg" alt="Wedding Photography">
            <p>Wedding Photography</p>
        </div>
        <div class="category" onclick="showDetails('graduate')">
            <img src="graduate.jpg" alt="Graduate Photography">
            <p>Graduate Photography</p>
        </div>
        <div class="category" onclick="showDetails('product')">
            <img src="product.jpg" alt="Product Photography">
            <p>Product Photography</p>
        </div>
    </div>

    <script>
        function showDetails(category) {
            alert('Klik pada kategori: ' + category);
            // Tambahkan logika atau navigasi ke halaman detail kategori
        }
    </script>

</body>
</html>
