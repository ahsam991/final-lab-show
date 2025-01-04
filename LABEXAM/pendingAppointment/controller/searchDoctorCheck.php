<?php
    session_start();
    require_once('../model/doctorModel.php');

    // Initialize doctors array
    $doctors = [];

    if (isset($_POST['search'])) {
        $searchType = $_POST['searchType'];
        $searchQuery = $_POST['searchQuery'];

        // Get filtered doctor data
        $doctors = searchDoctors($searchType, $searchQuery);
    }

    // Store the filtered doctors in the session
    $_SESSION['doctors'] = $doctors;

    // Redirect back to the searchDoctor.php page
    header("Location: ../view/searchDoctor.php");
    exit();
?>
