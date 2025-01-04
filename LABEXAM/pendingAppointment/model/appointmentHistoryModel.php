<?php
// Database connection
function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Fetch all appointments

// Fetch expired appointments
function fetchExpiredAppointments($currentDate) {
    $conn = getConnection();
    $email = $_SESSION['email'];

    if($_SESSION['type'] == 'admin')
    {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date < '$currentDate'";
    }

    if($_SESSION['type'] == 'patient')
    {
        $sql = "SELECT * FROM appointment_request WHERE appointment_date < '$currentDate' AND email='{$email}'";
    }

    if($_SESSION['type'] == 'doctor')
    {
        $doctorID = null;
        $fetchSql = "SELECT id FROM doctor_info WHERE email='{$email}'";
        $conn = getConnection();
        $checkResult = mysqli_query($conn, $fetchSql);

        if($checkResult) {
            while ($row = mysqli_fetch_assoc($checkResult)) {
                $doctorID = $row['id'];
            }
        }

        $sql = "SELECT * FROM appointment_request WHERE appointment_date < '$currentDate' AND doctor_id='{$doctorID}'";
    }
    
    $result = mysqli_query($conn, $sql);

    $expiredAppointments = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $expiredAppointments[] = $row;
        }
    }
    
    mysqli_close($conn);
    return $expiredAppointments;
}

// Archive expired appointments
function archiveAppointments($expiredAppointments) {
    $conn = getConnection();
    $success = true;

    foreach ($expiredAppointments as $appointment) {
        // Insert into archive table
        $sqlInsert = "INSERT INTO appointment_history
                      (appointment_id, name, email, doctor_id, doctor_name, appointment_time, appointment_date, problem, token) 
                      VALUES 
                      ('{$appointment['appointment_id']}', '{$appointment['name']}', '{$appointment['email']}', 
                      '{$appointment['doctor_id']}', '{$appointment['doctor_name']}', '{$appointment['appointment_time']}', 
                      '{$appointment['appointment_date']}', '{$appointment['problem']}', '{$appointment['token']}')";

        if (!mysqli_query($conn, $sqlInsert)) {
            $success = false;
        }

        // Delete from original table
        /*$sqlDelete = "DELETE FROM appointment_request WHERE appointment_id = '{$appointment['appointment_id']}'";
        if (!mysqli_query($conn, $sqlDelete)) {
            $success = false;
        }*/
    }

    mysqli_close($conn);
    return $success;
}
?>
