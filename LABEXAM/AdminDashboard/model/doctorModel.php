<?php
require_once 'databaseConnection.php';

function listDoctors() {
    $conn = connectDatabase();
    $sql = "SELECT * FROM doctor_info";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addDoctor($name, $phone, $speciality) {
    $conn = connectDatabase();
    $sql = "INSERT INTO doctor_info (name, phone, speciality) VALUES ('$name', '$phone', '$speciality')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function deleteDoctor($id) {
    $conn = connectDatabase();
    $sql = "DELETE FROM doctor_info WHERE id = $id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>
