<?php
session_start();
 /*if ($_SESSION['userType'] !== 'admin') {
    header("Location: login.html");
    exit;
}*/
require_once '../model/doctorModel.php';
require_once '../model/patientModel.php';

$doctors = listDoctors();
$patients = listPatients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

 <!-- <a href="../pendingAppoinment/view/login.html">Pending Appointment Page</a> -->

  <a href="../../pendingAppointment/view/login.html">Pending Appointment Page</a>

    <h1>Welcome, Admin</h1>
    <h2>Doctors</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php while ($doctor = mysqli_fetch_assoc($doctors)): ?>
        <tr>
            <td><?= htmlspecialchars($doctor['name']) ?></td>
            <td><?= htmlspecialchars($doctor['phone']) ?></td>
            <td><?= htmlspecialchars($doctor['speciality']) ?></td>
            <td><a href="../controller/doctorController.php?action=delete&id=<?= $doctor['id'] ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="addDoctor.php">Add Doctor</a>

    <h2>Patients</h2>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <?php while ($patient = mysqli_fetch_assoc($patients)): ?>
        <tr>
            <td><?= htmlspecialchars($patient['first_name']) ?></td>
            <td><?= htmlspecialchars($patient['last_name']) ?></td>
            <td><?= htmlspecialchars($patient['phone']) ?></td>
            <td><?= htmlspecialchars($patient['email']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="addPatient.php">Add Patient</a>
</body>
</html>
