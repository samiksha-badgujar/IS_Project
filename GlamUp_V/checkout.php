<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout - GlamUp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Checkout</h2>
<p>Total items in cart: <?php echo count($_SESSION['cart'] ?? []); ?></p>
<p>Thank you for shopping with GlamUp!</p>
<a href="home.php">Continue Shopping</a>
</body>
</html>
