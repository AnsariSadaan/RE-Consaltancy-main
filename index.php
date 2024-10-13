<?php
require('config.php');
if (isset($_POST['register'])) {
    $uname = $_POST['username'];
    $fname = $_POST['fname'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $s = "SELECT * FROM users WHERE username =  '$uname'";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    if ($num >= 1) {
        echo '<script type="text/javascript"> ';

        echo '  if (confirm("Username already exist")) {';
        echo '    document.location = "index.php";';
        echo '  }';

        echo '</script>';
    } else {
        session_start();
        $reg = "INSERT INTO users(username, fname, phno, email, pwd) VALUES ('$uname', '$fname', '$phno', '$email', '$pwd')";
        mysqli_query($con, $reg);
        echo '<script type="text/javascript"> ';
        echo ' if (confirm("Registration successfull!")) {';
        echo ' document.location = "login.php";';
        echo ' }';
        echo '</script>';
    }
} ?>
<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery-3.4.1.slim.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            body{
                    overflow-x: hidden;
                    background-image: url('./img/bk15c.jpg');
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                }
            .vform
                {
                    width:65%;
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
                    width:80%;
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
                    width:80%;
                }
            .form-group input[type=email]
                {
                    padding:0.7%;
                    background-color: rgba(0, 0, 0, 0.10);
                    color:white;
                    border:0.5px solid teal;
                    padding-left:5%;
                    font-size:19px;
                    letter-spacing:0.2mm;
                    width:80%;
                }
            label
                {
                    font-size:22px;
                    color:white;
                    letter-spacing:0.2mm;
                }
            td
                {

                    padding:1.5%;
                }
            table
                {
                    margin-left:10%;
                    width:90%;
                }
            button
                {
                    margin-top:6%;
                    float:right;
                    margin-right:20%;
                }
        </style>
    </head>
    <body>
    <div style="background-color: #9FC088 ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><span><h2 style="text-transform:uppercase; color:aqua; font-weight:bold; font-family:Copperplate Gothic Bold Copperplate Gothic Bold; letter-spacing:0.7mm; font-size:20;">RE Consultancy</h2></span></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        
                    </li>
                </ul>
                </div>
            </div>
            </nav>
        <br>
        <!--row for form-->
        <div class="row"">
            <div class="container" >
                <div class="owner" style="padding:1%;background-color:black; font-size:25px; letter-spacing:0.1rem;color:white;">
                    <p>FOR BUYING, SELLING AND RENTAL OF FLATS, SHOPS, PLOTS, ETC.</p>
                    <p>ALSO FURNITURE AND INTERIOR WORK</p>
                </div>
            </div>
        </div><br>
        <div class="container">
            <div class="text-center" style="margin-top: 2vh;">
                <div class="imgs">
                    <img src="img/bc1.jpg" width="180" height="180" style="border-radius: 100px;">
                    <img src="img/bc2.jpg" width="180" height="180" style="border-radius: 100px; margin-left: 20px;">
                    <img src="img/bc3.jpg" width="180" height="180" style="border-radius: 100px; margin-left: 20px;">
                    <img src="img/bc6.jpg" width="180" height="180" style="border-radius: 100px; margin-left: 20px;">
                    <img src="img/bc7.jpg" width="180" height="180" style="border-radius: 100px; margin-left: 20px;">
                </div>
            </div>
            <hr width="30">
        </div>
        <div class="container" >
        <br>
        <div class="row">
            <div class="vform" style="background-color: rgba(0, 0, 0, 0.99);">
                <h1 style="Font-size:25px; color:white; font-family:times new roman;font-weight:bold;text-align:center;  text-transform:uppercase; letter-spacing:0.4mm;">Registration</h1><br>    
                <form action="index.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr class="form-group">
                        <td><label for="uname">Username</label></td>
                        <td><input type="text" name="username" placeholder=" Enter the Username" class="form-control" id="fname" required ></td>
                    </tr>
                    <tr class="form-group">
                        <td><label for="fname">Full Name</label></td>
                        <td><input type="text" name="fname" placeholder=" Enter your Name" class="form-control" id="fname" required ></td>
                    </tr>
                    <tr class="form-group">
                        <td><label for="phno">Contact No</label></td>
                        <td><input type="text" name="phno" placeholder=" Enter your Contact " pattern="[0-9]{4}[0-9]{3}[0-9]{3}"  class="form-control" id="fname" required ></td>
                    </tr>
                    <tr class="form-group">
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" placeholder=" Enter your Email"class="form-control" id="email" required ></td>
                    </tr>
                    <tr class="form-group">
                        <td><label for="inputPassword3" >Password</label></td>
                        <td><input type="password" placeholder=" Enter the Password "name="password" class="form-control" id="inputPassword3" maxlength="10" required ></td>
                    </tr>

                    <tr >

                    <td colspan="2">
                            <button href="login.php" type="submit" class="btn btn-primary" name="register" value="register">Register</button>
                    </td>
                    </tr>
                        <tr class="form-group">
                                <td colspan="2" >
                                    <span style="color:white;">Already Have An Account?    <a id="lo" href="login.php">Login</a></span>
                                </td>
                        </tr>
                </table>

            </form>
            </div>
        </div>
        </div>      
        <br>      
        
        <!-- footer and modal files -->
        <?php
        require './screen/footer.php';
        require './screen/modal.php';
        ?>
    </body>
</html>