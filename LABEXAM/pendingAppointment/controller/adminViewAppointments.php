<?php
session_start();
require_once('../Model/appointmentModel.php');

// Check if the "back" button was pressed
if (isset($_REQUEST['back'])) {
    $userType = $_SESSION['type'];
    if ($userType === 'patient') {
        header("Location: ../view/patientDashboard.php");
    } elseif ($userType === 'doctor') {
        header("Location: ../view/doctorDashboard.php");
    } elseif ($userType === 'admin') {
        header("Location: ../view/adminDashboard.php");
    }
    exit();
}
