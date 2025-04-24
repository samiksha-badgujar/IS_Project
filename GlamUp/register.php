<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registered successfully. You can now login.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Registration failed.');</script>";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>GlamUp - Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Create Account</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br/>
        <input type="password" name="password" placeholder="Password" required><br/>
        <button type="submit">Sign Up</button>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </form>
</div>
</body>
</html>