<?php
require_once '../controller/patientController.php';

$patients = listPatients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients</title>
</head>
<body>
    <h1>Manage Patients</h1>
    <table border="1">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($patient = mysqli_fetch_assoc($patients)): ?>
            <tr>
                <td><?php echo htmlspecialchars($patient['first_name']); ?></td>
                <td><?php echo htmlspecialchars($patient['last_name']); ?></td>
                <td><?php echo htmlspecialchars($patient['phone']); ?></td>
                <td><?php echo htmlspecialchars($patient['email']); ?></td>
                <td>
                    <a href="../controller/patientController.php?action=delete&id=<?php echo $patient['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
