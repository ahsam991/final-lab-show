<?php
// Function to get database connection
function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Function to fetch user data by email
function fetchUserDataByEmail($email) {
    $conn = getConnection();

    // Escape the input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // SQL query to fetch user data by email
    $sql = "SELECT * FROM user_info WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); // Return user data as an associative array
    }

    return null;
}

// Function to update only the email and password (plain text password)
function updateUserEmailAndPassword($currentEmail, $newEmail, $newPassword) {
    $conn = getConnection();

    // Escape the inputs to prevent SQL injection
    $currentEmail = mysqli_real_escape_string($conn, $currentEmail);
    $newEmail = mysqli_real_escape_string($conn, $newEmail);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    // SQL query to update email and password (storing plain text password)
    $sql = "UPDATE user_info 
            SET email = '$newEmail', password = '$newPassword' 
            WHERE email = '$currentEmail'";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn); // Close connection

    return $result; // Return true if update was successful
}
?>
