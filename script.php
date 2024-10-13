<?php
session_start();
require('config.php'); // Include the database configuration file

$order_id = $_POST['order_id'];
$uname = $_SESSION['uname'];

// Fetch seller details based on order_id
$query = "SELECT * FROM sellers WHERE id = $order_id";
$date = date('d-m-y');
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

// Check if the order is already in the wishlist
$query1 = "SELECT id FROM wishlist WHERE order_id = '".$row['id']."' AND user_id = '".$_SESSION['id']."'";
$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
$count = mysqli_num_rows($result1);

if ($count < 1) {
    // Insert into wishlist if not already present
    $res = "INSERT INTO wishlist(order_id, user_id, date, status) VALUES ('".$row['id']."', '".$_SESSION['id']."', '".$date."', 'Y')";
    $result = mysqli_query($con, $res) or die(mysqli_error($con));
    echo 1; // Successfully added to wishlist
} else {
    echo 2; // Already exists in wishlist
}

// Optionally, you can redirect or display a message
// header("location:mywishlist.php");
?>
