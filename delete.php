<?php

$con = mysqli_connect("localhost", "root", "", "contact_db");


if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// when we click delete button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Get the appointment ID from the form data
    $appointment_id = $_POST['appointment_id'];

    // Delete the appointment from the database
    $query = "DELETE FROM contact_form WHERE id = $appointment_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        //successfully deleted redirect to admin.php
        header("Location: admin.php");
        exit(); 
    } else {
        
        echo "Error: " . mysqli_error($con);
    }
}


mysqli_close($con);
?>
