<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $_SESSION['cart'][] = $_POST['product'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart - GlamUp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Your Cart</h2>
<ul>
<?php foreach ($_SESSION['cart'] as $item): ?>
    <li><?php echo htmlspecialchars($item); ?></li>
<?php endforeach; ?>
</ul>
<a href="checkout.php">Proceed to Checkout</a>
</body>
</html>
