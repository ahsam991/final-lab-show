<?php
session_start();
require_once('../Model/appointmentHistoryModel.php');
$currentDate = date('Y-m-d');
//var_dump($_SESSION['email']);
$appointments = fetchExpiredAppointments($currentDate);
?>

<html>
<head>
    <title>View Appointments</title>
</head>
    <body>
        <form method="post" action="../controller/appointmentHistoryCheck.php">
            <h1>Appointment History</h1>
            <table border="1" cellspacing="0">
                <tr>
                    <th>Appointment ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Appointment Time</th>
                    <th>Appointment Date</th>
                    <th>Problem</th>
                    <th>Token</th>
                </tr>
                <?php if (!empty($appointments)): ?>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= $appointment['appointment_id']; ?></td>
                            <td><?= $appointment['name']; ?></td>
                            <td><?= $appointment['email']; ?></td>
                            <td><?= $appointment['doctor_id']; ?></td>
                            <td><?= $appointment['doctor_name']; ?></td>
                            <td><?= $appointment['appointment_time']; ?></td>
                            <td><?= $appointment['appointment_date']; ?></td>
                            <td><?= $appointment['problem']; ?></td>
                            <td><?= $appointment['token']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">No appointments found</td>
                    </tr>
                <?php endif; ?>
            </table>

            <input type="submit" name="back" value="Go Back">
        </form>
    </body>
</html>