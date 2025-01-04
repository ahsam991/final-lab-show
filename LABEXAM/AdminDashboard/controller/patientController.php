<?php
require_once '../model/patientModel.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'add') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        addPatient($firstName, $lastName, $phone, $email);
        header("Location: ../view/adminDashboard.php");
    }
}
?>
