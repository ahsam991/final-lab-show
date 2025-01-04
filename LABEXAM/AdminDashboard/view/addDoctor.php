<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="../asset/dashboard_style.css">
</head>
<body>
    <form action="../controller/doctorController.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="speciality">Specialty:</label>
        <input type="text" id="speciality" name="speciality" required>
        <button type="submit">Add Doctor</button>
        <a href="adminDashboard.php">Go Back</a>
    </form>
</body>
</html> 





































<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
</head>
<body>
    <form action="../controller/doctorController.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="speciality">Specialty:</label>
        <input type="text" id="speciality" name="speciality" required>
        <button type="submit">Add Doctor</button>
        <a href="adminDashboard.php">Go Back</a>
    </form>
</body>
</html> -->
