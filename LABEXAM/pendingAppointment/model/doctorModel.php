<?php
// Establish a connection to the database
function getConnection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Fetch doctor data from the database
function fetchDoctorData()
{
    $conn = getConnection();

    $sql = "SELECT name, speciality, available_time, hospital FROM doctor_info";
    $result = mysqli_query($conn, $sql);

    $doctors = [];
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $doctors[] = $row;
        }
    }
    
    else
    {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    return $doctors;
}

function searchDoctors($searchType, $searchQuery)
{
    $conn = getConnection();

    // Escape the search query to prevent SQL injection
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

    // Prepare SQL query based on search type, make it case-insensitive and allow partial matching
    if ($searchType == 'speciality') {
        $sql = "SELECT name, speciality, available_time, hospital 
                FROM doctor_info 
                WHERE LOWER(speciality) LIKE LOWER('%$searchQuery%')";
    } else {
        $sql = "SELECT name, speciality, available_time, hospital 
                FROM doctor_info 
                WHERE LOWER(hospital) LIKE LOWER('%$searchQuery%')";
    }

    $result = mysqli_query($conn, $sql);

    $doctors = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $doctors[] = $row;
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    return $doctors;
}
