<?php
require_once 'databaseConnection.php';

function listPatients() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addPatient($firstName, $lastName, $phone, $email) {
    $conn = connectDatabase();
    $sql = "INSERT INTO user_info (first_name, last_name, phone, email) VALUES ('$firstName', '$lastName', '$phone', '$email')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>
