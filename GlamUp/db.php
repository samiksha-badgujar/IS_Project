<?php
$conn = mysqli_connect("localhost", "root", "", "glamup");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>