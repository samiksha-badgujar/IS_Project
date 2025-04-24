<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GlamUp - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff8f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #e91e63;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        .hero {
            background: url('images/dashboard1.webp') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .btn {
            background: white;
            color: #e91e63;
            padding: 12px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 25px;
        }
        h2 {
            text-align: center;
            color: #e91e63;
            margin-top: 40px;
        }
        .products, .modern {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px 20px;
        }
        .product {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 20px;
            width: 220px;
            text-align: center;
            padding: 15px;
        }
        .product img {
            width: 100%;
            border-radius: 10px;
            height: 180px;
            object-fit: cover;
        }
        .product h3 {
            margin-top: 15px;
        }
        .actions {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .actions a {
            text-decoration: none;
            padding: 8px;
            background-color: #e91e63;
            color: white;
            border-radius: 5px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo"><strong>GlamUp</strong></div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="products.php">Products</a>
        <a href="#">Modern Jewels</a>
        <a href="wishlist.php">Wishlist</a>
        <a href="cart.php">Cart</a>
        <a href="logout.php">Logout</a>
        <a href="feedback.php">Feedback</a>
    </div>
</div>

<div class="hero">
    <h1>Welcome to GlamUp</h1>
    <p>Your one-stop destination for the most glamorous jewellery products</p>
    <a href="products.php" class="btn">Shop Now</a>
</div>

<h2>Traditional Jewellery</h2>
<div class="products">
    <?php
    $products = [
        ["name" => "Earings", "price" => "₹499", "img" => "tra_earings.jpg"],
        ["name" => "Necklace", "price" => "₹799", "img" => "tra_necklace.jpg"],
        ["name" => "Rings", "price" => "₹899", "img" => "tra_rings.webp"],
        ["name" => "Bangles", "price" => "₹699", "img" => "tra_bangles.jpg"],
        ["name" => "Noserings", "price" => "₹199", "img" => "tra_nosering.jpg"],
        ["name" => "Anklets", "price" => "₹249", "img" => "tra_anklets.webp"],
        ["name" => "Headpiece", "price" => "₹599", "img" => "tra_headpiece.jpeg"]
    ];

    foreach ($products as $product) {
        echo "<div class='product'>
                <img src='images/{$product['img']}' alt='{$product['name']}'>
                <h3>{$product['name']}</h3>
                <p>{$product['price']}</p>
                <div class='actions'>
                    <a href='wishlist.php?item=" . urlencode($product['name']) . "'>Add to Wishlist</a>
                    <a href='cart.php?item=" . urlencode($product['name']) . "'>Add to Cart</a>
                    <a href='checkout.php?item=" . urlencode($product['name']) . "'>Buy Now</a>
                </div>
              </div>";
    }
    ?>
</div>

<h2 id="modern">Modern Jewellery</h2>
<div class="modern">
    <?php
    $modern = [
        ["name" => "Earings", "price" => "₹549", "img" => "mo_earings.webp"],
        ["name" => "Necklace", "price" => "₹399", "img" => "mo_necklace.jpg"],
        ["name" => "Rings", "price" => "₹150", "img" => "mo_rings.jpg"],
        ["name" => "Anklets", "price" => "₹449", "img" => "mo_anklets.jpg"],
        ["name" => "Bracelets", "price" => "₹799", "img" => "mo_bracelets.jpg"]
    ];

    foreach ($modern as $product) {
        echo "<div class='product'>
                <img src='images/{$product['img']}' alt='{$product['name']}'>
                <h3>{$product['name']}</h3>
                <p>{$product['price']}</p>
                <div class='actions'>
                    <a href='wishlist.php?item=" . urlencode($product['name']) . "'>Add to Wishlist</a>
                    <a href='cart.php?item=" . urlencode($product['name']) . "'>Add to Cart</a>
                    <a href='checkout.php?item=" . urlencode($product['name']) . "'>Buy Now</a>
                </div>
              </div>";
    }
    ?>
</div>

</body>
</html>

