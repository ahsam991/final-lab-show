<?php
session_start();
require_once('../model/appointmentModel.php');

if ($_SESSION['type'] !== 'doctor') {
    header('Location: ../view/login.html');
    exit;
}

$currentDate = date('Y-m-d');
$appointments = fetchAppointments('doctor', $_SESSION['email'], $currentDate);
include('../view/doctorAppointments.php');
?>
