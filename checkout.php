<?php
// Include the config file to use the existing database connection
require 'config.php'; 
session_start();

if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
}

$username = $_SESSION['uname'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['card_cvc'];
    $card_exp_month = $_POST['card_exp_month'];
    $card_exp_year = $_POST['card_exp_year'];

    $pay = "INSERT INTO payment(name, email, card_num, card_cvc, card_exp_month, card_exp_year) 
            VALUES ('$name', '$email', '$card_num', '$card_cvc', '$card_exp_month', '$card_exp_year')";
    
    mysqli_query($con, $pay) or die(mysqli_error($con));
}
?>
<html>

<head>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery-3.4.1.slim.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <script src="https://kit.fontawesome.com/d1173fa82e.js" crossorigin="anonymous"></script>
        <style>
                body {
                        background-image: url(img/bk4c.jpg);
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        background-size: cover;
                    }
                .nav-link
                    {
                        font-size:18px;
                    }

                    .form-group input[type=text]
                        {
                            padding:0.7%;
                            background-color: rgba(0, 0, 0, 0.10);
                            color:white;
                            border:0.5px solid teal;
                            padding-left:5%;
                            font-size:19px;
                            letter-spacing:0.2mm;
                        }
                        .form-group input[type=password]
                        {
                            padding:0.7%;
                            background-color: rgba(0, 0, 0, 0.10);
                            color:white;
                            border:0.5px solid teal;
                            padding-left:5%;
                            font-size:19px;
                            letter-spacing:0.2mm;
                        }
                        .form-group input[type=email]
                        {
                            padding:0.7%;
                            background-color: rgba(0, 0, 0, 0.10);
                            color:white;
                            border:0.5px solid teal;
                            padding-left:5%;
                            font-size:19px;
                        }

                        label
                        {
                            font-size:22px;
                            color:white;
                            padding-left:10%;

                            letter-spacing:0.2mm;
                        }
                        td
                        {

                        padding:1%;

                       }
                       table
                       {
                        margin-left:5%;
                       }
                       button
                       {
                        float:right;

                       }

            </style>
</head>
<body>
 <div >
        <?php
            require('./screen/header.php')
        ?>
</div>

<div class="container" >
            <h3 style="color:#FFF98A; FONT-FAMILY:TIMES NEW Roman; FONT-SIZE:30PX; LETTER-SPACING:0.1MM;"><center>
                Welcome! <?php
                $u1 = $_SESSION['uname'];
                echo "<font color=white>@$u1</font>";
                ?></b>
            </h3></center>
        </div>
        <br>
        <div class="container"  >
            <!--row for form-->
            <div class="row" style="width:80%;">
                <div class="container"  >

                    <div class="vform"  style="background-color: rgba(0, 0, 0, 0.97); width:80%;">
                    <h1 style="Font-size:25px; font-weight:bold;text-align:center;  text-transform:uppercase;letter-spacing:0.4mm;">Payment</h1><br>
                        <form method="POST" action="paysuccess.php" enctype="multipart/form-data">
                            <table >
                                    <tr class="form-group">
                                         <td><label for="name">Name </label></td>
                                         <td> <input type="text" class="form-control" style="width:150%;" id="name" name="name" placeholder=" Name On Card" required></td>
                                    </tr>
                                    <tr class="form-group">
                                         <td><label for="email">Email </label></td>
                                         <td><input type="email"  class="form-control" style="width:150%;" name="email" placeholder=" Enter your Email" required></td>
                                    </tr>
                                     <tr class="form-group">
                                          <td><label for="card_num">Card Number </label></td>
                                          <td><input type="text"  class="form-control"style="width:150%;" name="card_num" pattern="[0-9]{4}[' '][0-9]{4}[' '][0-9]{4}" placeholder=" 0000 0000 0000"required></td>
                                     </tr>

                                      <tr class="form-group">
                                          <td><label for="card_cvc">CVC</label></td>
                                          <td><input type="password" class="form-control"  style="width:70%;" pattern="[0-9]{3}" name="card_cvc" placeholder=" XXX" required></input></td>
                                     </tr>
                                       <tr class="form-group">
                                            <td>  <label for="card_exp_year"    for="card_exp_month">Expiration (MM/YYYY)</label></td>
                                            <td><input type="text" name="card_exp_month"   placeholder=" MM " style="width:90%;" class="form-control" required/></td>
                                            <td><input type="text" name="card_exp_year"    placeholder=" YYYY " style="width:90%;" class="form-control" required/></td>
                                       </tr>

                            </table>

                            <br>  <br>

                            <button type="submit"  style="font-size:18px; margin-right:3%;"class="btn btn-primary " name="submit" value="submit">Payment</button>
                        </form>
                    </div>
                </div>
            </div><br>
        </div>

        <!-- footer and modal files -->
        <?php
        require('./screen/footer.php');
        require('./screen/modal.php');
        ?>

                <script type="text/javascript">
    $(document).ready(function(){
        $(".button").click(function(){
          var numb_data = $(this).attr('name');
          alert("payment successful!");
          jQuery.ajax({
                type: 'POST',
                url: 'scriptpayment.php',
                data: { order_id: numb_data, action: 'setcvdownloads' },
                success: function(data) {
                    //alert(data);
                    //$("p").text(data);
                    window.location.href = "paysuccess.php";
                }
            });
   });
});
</script>        

</body>
</html>