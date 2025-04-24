<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
session_start();
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product'])) {
    $_SESSION['wishlist'][] = $_POST['product'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wishlist - GlamUp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Your Wishlist</h2>
<ul>
<?php foreach ($_SESSION['wishlist'] as $item): ?>
    <li><?php echo htmlspecialchars($item); ?></li>
<?php endforeach; ?>
</ul>
</body>
</html>
