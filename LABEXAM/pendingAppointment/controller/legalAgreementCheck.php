<?php
session_start();
require_once('../model/userModel.php');
//require_once('../controller/regCheck.php');

if (isset($_POST['agree'])) {
    if (!empty($_SESSION['user_data'])) {
        $userData = $_SESSION['user_data'];
        // Add user to the database
        $status = addUser(
            $userData['firstName'],
            $userData['lastName'],
            $userData['email'],
            $userData['phone'],
            $userData['nid'],
            $userData['pass'],
            $userData['dob'],
            $userData['gender'],
            $userData['address'],
            $userData['medHistory'],
            $userData['emergencyContact']
        );

        if ($status) {
            unset($_SESSION['user_data']);
            header("Location: ../view/login.html");
            exit;
        } else {
            echo "Error adding user.";
        }
    } else {
        echo "No user data found.";
    }
}

if (isset($_POST['cancel'])) {
    // Redirect to registration page
    header("Location: ../view/registration.html");
    exit;
}

?>