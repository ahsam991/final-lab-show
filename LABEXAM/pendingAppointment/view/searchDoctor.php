<?php
    session_start();
    require_once('../model/doctorModel.php');

    // Get doctors from session or default fetch
    if (isset($_SESSION['doctors'])) {
        $doctors = $_SESSION['doctors'];
    } else {
        $doctors = fetchDoctorData();
    }
?>
<html>
    <head>
        <title>View Doctors</title>
    </head>

    <body>
        <div>
            <div>View Doctors</div>
            <!-- Action to send data to searchDoctorCheck.php for processing -->
            <form method="post" action="../controller/searchDoctorCheck.php">
                <label>Search by:</label>
                <select name="searchType" id="searchType">
                    <option value="speciality">Speciality</option>
                    <option value="hospital">Hospital</option>
                </select>
                
                <label>Search:</label>
                <input type="text" name="searchQuery" id="searchQuery" value="" />
                <input type="submit" name="search" value="search">

                <a href='../view/patientDashboard.php'>Go Back</a>

            <div class="doctors">
                <table border="1" cellspacing="0">
                    <tr>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Hospital</th>
                        <th>Available Time</th>
                    </tr>
                    <?php if (!empty($doctors)): ?>
                        <?php foreach ($doctors as $doctor): ?>
                            <tr>
                                <td><?=$doctor['name']; ?></td>
                                <td><?=$doctor['speciality']; ?></td>
                                <td><?=$doctor['hospital']; ?></td>
                                <td><?=$doctor['available_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center;">No doctors available</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        </form>
    </body>
</html>
