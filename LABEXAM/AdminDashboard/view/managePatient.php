<?php
include('../control/config.php'); // Ensure proper database connection

// Fetch all patient data
$patients = mysqli_query($conn, "SELECT * FROM patients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Admin Dashboard</header>
        <ul>
            <li><a href="managePatient.php"><i class="fas fa-user"></i> Manage Patients</a></li>
            <li><a href="manageDoctor.php"><i class="fas fa-user-md"></i> Manage Doctors</a></li>
            <li><a href="#"><i class="fas fa-calendar-check"></i> Manage Appointments</a></li>
            <li><a href="#"><i class="fas fa-money-bill-alt"></i> View Payment History</a></li>
        </ul>
    </div>
    <section>
        <div class="container-content">
            <h1>Manage Patients</h1>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>NID</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Medical History</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($patient = mysqli_fetch_assoc($patients)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($patient['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($patient['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($patient['phone']); ?></td>
                        <td><?php echo htmlspecialchars($patient['nid']); ?></td>
                        <td><?php echo htmlspecialchars($patient['email']); ?></td>
                        <td><?php echo htmlspecialchars($patient['date_of_birth']); ?></td>
                        <td><?php echo htmlspecialchars($patient['gender']); ?></td>
                        <td><?php echo htmlspecialchars($patient['address']); ?></td>
                        <td><?php echo htmlspecialchars($patient['medical_history']); ?></td>
                        <td>
                            <a href="../control/edit_patient.php?id=<?php echo $patient['id']; ?>">Edit</a> |
                            <a href="../control/delete_patient.php?id=<?php echo $patient['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
