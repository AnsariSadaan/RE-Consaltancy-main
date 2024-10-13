<?php
// Include the database configuration file
require('config.php');

if (isset($_POST['register'])) {
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    // Check if username already exists
    $s = "SELECT * FROM users WHERE username = '$uname'";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        echo '<script type="text/javascript"> ';
        echo '  if (confirm("Email already exists")) {';
        echo '    document.location = "register.php";';
        echo '  }';
        echo '</script>';
    } else {
        // Insert new user into the database
        $reg = "INSERT INTO users (username, fname, phno, email, pwd) VALUES ('$uname', '$fname', '$phno', '$email', '$pwd')";
        if (mysqli_query($con, $reg)) {
            echo "<center><h3>Registration successful!</h3></center>"; 
            // Optionally, redirect to login page
            // header("location:login.php");
        } else {
            echo "<center><h3>Error: " . mysqli_error($con) . "</h3></center>";
        }
    }
}
?>
