<html>
<head>
    <title>Doctor - View Appointments</title>
</head>
<body>
    <h1>Doctor - Pending Appointments</h1>
    <table border="1" cellspacing="0">
        <tr>
            <th>Appointment ID</th>
            <th>Name</th>
            <th>Email</th>
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
                    <td><?= $appointment['appointment_time']; ?></td>
                    <td><?= $appointment['appointment_date']; ?></td>
                    <td><?= $appointment['problem']; ?></td>
                    <td><?= $appointment['token']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">No appointments found</td>
            </tr>
        <?php endif; ?>
    </table>
    <form method="post" action="../controller/redirect.php">
        <input type="submit" name="back" value="Go Back">
    </form>
</body>
</html>
