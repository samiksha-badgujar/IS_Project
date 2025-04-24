<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failed to prepare statement');</script>";
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
