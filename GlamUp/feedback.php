<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input directly from POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message']; // XSS vulnerable

    // Sanitize inputs for security (escaping HTML entities)
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); // Prevent XSS

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message); // 'sss' denotes 3 strings

    // Execute the statement
    if ($stmt->execute()) {
        $submitted = true;
    } else {
        $error = "Error: " . $stmt->error;
    }

    $stmt->close();  // Close the statement
    mysqli_close($conn);  // Close the connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback - GlamUp</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff8f9;
            padding: 20px;
        }
        .feedback-form {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .feedback-form h2 {
            color: #e91e63;
            text-align: center;
        }
        .feedback-form input, .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .feedback-form button {
            background-color: #e91e63;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .response {
            background: #fff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 10px;
            border-left: 5px solid #e91e63;
        }
    </style>
</head>
<body>

<div class="feedback-form">
    <h2>Feedback Form</h2>
    <?php if (!empty($submitted)): ?>
        <div class="response">
            <h3>Thank you for your feedback!</h3>
            <p><strong>Name:</strong> <?= $name ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Message:</strong><br><?= $message ?></p> <!-- Secure display with XSS protection -->
        </div>
    <?php elseif (!empty($error)): ?>
        <div class="response">
            <p style="color: red;"><?= $error ?></p>
        </div>
    <?php else: ?>
        <form action="feedback.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Feedback" rows="5" required></textarea>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
