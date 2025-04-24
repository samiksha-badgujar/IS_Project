<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('Location: home.php');
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GlamUp - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Login to GlamUp</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br/>
        <input type="password" name="password" placeholder="Password" required><br/>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </form>
</div>
</body>
</html> 