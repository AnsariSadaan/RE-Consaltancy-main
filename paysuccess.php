<?php
    session_start();
    
    require('config.php');
    
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['card_cvc'];
    $card_e_m = $_POST['card_exp_month'];
    $card_e_y = $_POST['card_exp_year'];
    $date = date('d-m-y'); 
    
    // Insert the payment record into the database
    $p = "INSERT INTO payment(name, email, card_num, card_cvc, card_exp_month, card_exp_year, created, modified) 
VALUES ('$name', '$email', '$card_num', '$card_cvc', '$card_e_m', '$card_e_m', '$date', '$date')";
    
    if (mysqli_query($con, $p)) {
        // Display the alert and redirect using JavaScript
        echo "<script>
                alert('Your payment is successful');
                window.location.href = 'home.php';
            </script>";
    } else {
        // Display an error if insertion fails
        echo "Error: " . mysqli_error($con);
    }
    
    mysqli_close($con);
?>
