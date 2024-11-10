<?php

$host = "localhost";
$username = "root";
$password = ""; 
$database = "contact_db";


$con = mysqli_connect($host, $username, $password, $database);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// when we click on confirm buttom
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    // Get the appointment ID from the form data
    $appointment_id = $_POST['appointment_id'];
    
    // Update the database as confirmed from 0 to 1
    $query = "UPDATE contact_form SET confirmed = 1 WHERE id = $appointment_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        // confirmed redirect to admin page
        header("Location: admin.php");
        exit(); 
    } else {
        
        echo "Error: " . mysqli_error($con);
    }
}


mysqli_close($con);
?>
