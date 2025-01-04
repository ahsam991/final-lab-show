<?php
function connectDatabase() {
    $conn = mysqli_connect("localhost", "root", "", "web_project");
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
