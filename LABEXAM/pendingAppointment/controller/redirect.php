<?php
session_start();

if (isset($_POST['back'])) {
    if ($_SESSION['type'] === 'admin') {
        header('Location: adminDashboard.php');
    } elseif ($_SESSION['type'] === 'doctor') {
        header('Location: doctorDashboard.php');
    }
    exit;
}
?>
