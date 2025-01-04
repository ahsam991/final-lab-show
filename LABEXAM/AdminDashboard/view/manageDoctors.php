<?php
require_once '../controller/doctorController.php';

$doctors = listDoctors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>
</head>
<body>
    <h1>Manage Doctors</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Specialty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($doctor = mysqli_fetch_assoc($doctors)): ?>
            <tr>
                <td><?php echo htmlspecialchars($doctor['name']); ?></td>
                <td><?php echo htmlspecialchars($doctor['phone']); ?></td>
                <td><?php echo htmlspecialchars($doctor['speciality']); ?></td>
                <td>
                    <a href="../controller/doctorController.php?action=delete&id=<?php echo $doctor['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
