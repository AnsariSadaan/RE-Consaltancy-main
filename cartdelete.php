<?php
  require('config.php');
  session_start();
  
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
    exit; // It's a good practice to exit after a redirect
}

if (isset($_POST) && !empty($_POST)) {
    $cart_id = $_POST['cart_id'];

    // No need to connect again, we already have the $con variable from config.php
    $uname = $_SESSION['uname'];

    $query = "DELETE FROM cart WHERE id = $cart_id";
    $date = date('d-m-y');
    
    // Execute the query
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    // Optionally, handle the result here (e.g., redirect or display a message)
    // die; // Remove or comment this line if you want to do more after deletion
}