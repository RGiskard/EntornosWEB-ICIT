<?php
    ob_start();
    session_start();

    // Configure timezone --> PST
    $timezone = date_default_timezone_set("America/Los_Angeles");
    
    // Set up connection with the database
    $con = mysqli_connect("localhost", "root", "", "spoticit");
    if(mysqli_connect_errno()) {
        echo "Error: Failed to connect: " . mysqli_connect_errno();
    }
?>