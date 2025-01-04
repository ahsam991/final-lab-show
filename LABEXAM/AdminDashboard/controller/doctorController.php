<?php
require_once '../model/doctorModel.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'add') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $specialty = $_POST['speciality'];
        addDoctor($name, $phone, $speciality);
        header("Location: ../view/adminDashboard.php");
    } elseif ($action === 'delete') {
        $id = $_GET['id'];
        deleteDoctor($id);
        header("Location: ../view/adminDashboard.php");
    }
}
?>
