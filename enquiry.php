<?php

require('config.php'); // Included the config.php file for database connection

if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    // Prepare the SQL statement
    $reg = "INSERT INTO enquiries (name, email, description) VALUES ('$name', '$email', '$desc')";

    // Execute the query
    if (mysqli_query($con, $reg)) {
        echo "<center><h3>Message sent successfully!</h3></center>"; 
        header("Location: home.php");
        exit(); 
    } else {
        echo "<center><h3>Error: " . mysqli_error($con) . "</h3></center>";
    }
} else {
    echo "<center><h3>No data submitted.</h3></center>";
}
?>
