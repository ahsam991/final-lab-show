<?php
session_start();
require_once('../Model/appointmentHistoryModel.php');

// Function to validate and archive appointments
function archiveExpiredAppointments() {
    $currentDate = date('Y-m-d'); // Today's date

    // Fetch expired appointments
    $expiredAppointments = fetchExpiredAppointments($currentDate);

    if (!empty($expiredAppointments)) {
        // Archive expired appointments
        $success = archiveAppointments($expiredAppointments);

        if ($success) {
            echo "Expired appointments archived successfully.";
        } else {
            echo "Error archiving expired appointments.";
        }
    } else {
        echo "No expired appointments to archive.";
    }
}

// Call the function
//archiveExpiredAppointments();

if(isset($_REQUEST['back']))
{
    $userType = $_SESSION['type'];
    if ($userType === 'patient')
    {
        header("Location: ../view/patientDashboard.php");

    }
    
    if ($userType === 'doctor')
    {
        header("Location: ../view/doctorDashboard.php");
    }
    
    if ($userType === 'admin')
    {
        header("Location: ../view/adminDashboard.php");
    }
}

?>
