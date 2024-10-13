<?php
// config.php
$hostname = 'localhost';
$username = 'root';
$password = ''; // replace with your database password if applicable
$database = 're_consultancy';

// Create connection
$con = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
