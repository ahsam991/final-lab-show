<?php
session_start();
require_once('../model/appointBookingModel.php');
if (isset($_REQUEST['book']))
{
    $problem = $_REQUEST['problem'];
    $doctorID = $_REQUEST['doctor'];
    $date = $_REQUEST['date'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    if (empty($problem) || empty($doctorID) || empty($date))
    {
        echo "All fields are required!";
        exit;
    }

    $tokenCount = checkAppointmentSlot($doctorID, $date);

    if ($tokenCount >= 3)
    {
        echo "Sorry, the slot is full";
    }

    else
    {
        $result = bookAppointment($name, $email, $doctorID, $date,  $problem, $tokenCount + 1);
        if($result)
        {
            echo "Appointment booked successfully. Your token number is: " . ($tokenCount + 1);
        }

        else
        {
            echo "Error booking the appointment Or you have already requested for an appointment.";
        }
    }
}

if (isset($_REQUEST['cancel']))
{
    header("Location: ../view/patientDashboard.php");
}
?>
