<?php
session_start();
require 'config.php';
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['uname'];

if (isset($_POST['submit'])) {
    $target = 'images/' . basename($_FILES['image']['name']);
    $typo = $_POST['typo'];
    $protype = $_POST['protype'];
    $prostatus = $_POST['prostatus'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $image = $_FILES['image']['name'];
    $reg = "INSERT INTO sellers(typo, protype, prostatus, price, address, city, image, username) VALUES ('$typo', '$protype', '$prostatus', '$price', '$address', '$city', '$image','$username')";

    if (mysqli_query($con, $reg)) {
        echo '<center><h3>Registration successfull!</h3></center>';
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = 'yes';
            header('location:buy.php');
            exit();
        } else {
            echo 'Failed to upload image.';
        }
    } else {
        echo 'Error: ' . mysqli_error($con);
    }
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
    <style>
        body 
        {
            background-image: url('img/bk4c.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            overflow-x: hidden;
        }
        .vform
            {
                width:77%;
            }
        .form-group input[type=text]
            {
                padding:0.7%;
                background-color: rgba(0, 0, 0, 0.10);
                color:white;
                border:0.5px solid teal;
                padding-left:5%;
                font-size:20px;
                letter-spacing:0.2mm;
                border-radius:3px;
                width:85%;
            }
            .form-group select
                {
                    padding:0.7%;
                    background-color: rgba(0, 0, 0, 0.10);
                    color:white;
                    border:0.5px solid teal;
                    padding-left:5%;
                    font-size:20px;
                    letter-spacing:0.2mm;
                    border-radius:3px;
                    width:85%;
                }
            .form-group textarea
                {
                    padding:0.7%;
                    background-color: rgba(0, 0, 0, 0.10);
                    color:white;
                    border:0.5px solid teal;
                    padding-left:5%;
                    font-size:20px;
                    letter-spacing:0.2mm;
                    border-radius:3px;
                    width:85%;
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
                    font-family:times new roman;
                    width:90%;
                }
            button
                {
                    margin-top:6%;
                    float:right;
                    margin-right:20%;                    
                }
            #exampleFormControlFile1
                {
                    color:white;
                }
            .owner
                {
                    background-color:#361500;
                    opacity:0.9;
                    color:white;
                    font-size:20px;
                    letter-spacing:0.2mm;
                    text-transform:uppercase;
                    padding-top:1%;
                    padding-bottom:0.5%;
                }        
    </style>
    </head>
    <body>
        <div style="background-color: #9FC088 " >
        
        <?php require './screen/header.php'; ?>

        <div class="container" style="padding: 20px;">
            <h3 style="color:#FFF98A; FONT-FAMILY:TIMES NEW Roman; FONT-SIZE:30PX; LETTER-SPACING:0.1MM;"><center>
                Welcome! <?php
                $u1 = $_SESSION['uname'];
                echo "<font color=white>@<u>$u1</u></font>";
                ?></b>
            </h3></center>
        </div>
        <br>
        <div class="container" style="padding: 20px">
            <!--row for form-->
            <div class="row">
                <div class="container">
                    <div class="owner">
                        <p>Want to sell your Property / House then you have came to the right place</p>
                        <p>Let us help you to sell your properties online</p>
                    </div><br><br>
                    <div class="vform" style="background-color: rgba(0, 0, 0, 0.99); margin-right:12%;">
                    <h1 style="Font-size:25px; font-weight:bold;text-align:center;  text-transform:uppercase;letter-spacing:0.4mm;">Sell / Rent</h1><br><br>
                    <form method="POST" action="sell1.php" enctype="multipart/form-data">
                            <table>
                                <tr class="form-group" >
                                        <td><label for="protype">Property Type </label></td>
                                        <td>
                                             <select id="protype" class="form-control" name="protype" required>
                                                           <option selected></option>
                                                         <option>Homes</option>
                                                         <option>Commercial</option>
                                                         <option>Residential</option>
                                                       <option>Townhouses</option>
                                                       <option>Condos</option>
                                                      <option>Vacant land</option>
                                             </select>
                                        </td>
                                </tr >
                                <tr class="form-group">
                                        <td><label for="prostatus">Property Status </label></td>
                                        <td>
                                             <select id="prostatus" class="form-control" name="prostatus" required>
                                                  <option selected></option>
                                                  <option>Under Construction</option>
                                                  <option>Ready to Move</option>
                                             </select>
                                        </td>
                                </tr>
                                <tr class="form-group">
                                       <td><label for="typo">Typology </label></td>
                                       <td>
                                             <select  "id="typo" class="form-control" name="typo" required>
                                                         <option selected></option>
                                                       <option>1 BHK (600 - 750 Sq.ft)</option>
                                                       <option>2 BHK (850 - 1000 Sq.ft)</option>
                                                      <option>3 BHK (1200 - 1500 Sq.ft)</option>
                                                       <option>4 BHK (Above 2200 Sq.ft)</option>
                                                      <option>2.5 BHK (Above 950 Sq.ft)</option>
                                                     <option>1 RK (400 - 500 Sq.ft)</option>
                                                    <option>2 BHK 2T (Above 1000 Sq.ft)</option>
                                                    <option>3 BHK 2T (Above 1350 Sq.ft)</option>
                                                   <option>3 BHK 3T (Above 1500 Sq.ft)</option>

                                             </select>
                                       </td>
                               </tr>
                               <tr class="form-group">

                                    <td> <label for="price"> Price in Sq / Ft </label></td>
                                    <td><input type="text"  class="form-control" name="price" required></td>
                               </tr>
                               <tr class="form-group">

                                      <td><label for="address">Address</label></td>
                                      <td><textarea type="textarea" class="form-control" id="address" rows="3" name="address" required></textarea></td>
                               </tr>
                               <tr class="form-group">
                                     <td>  <label for="city">City</label></td>
                                     <td>
                                          <select  "id="city" class="form-control" name="city" required>
                                                    <option selected></option>
                                                    <option>Thane</option>
                                                    <option>Mumbai</option>
                                                    <option>Navi-Mumbai</option>
                                                    <option>Pune</option>
                                                    <option>Nashik</option>
                                                    <option>Akola</option>
                                                    <option>Chennai</option>
                                                    <option>Hingoli</option>
                                                    <option>Jalgaon</option>
                                                    <option>Osmanabad</option>
                                                    <option>Ratnagiri</option>
                                          </select>
                                     </td>
                               </tr>
                               <tr class="form-group">
                                    <td><label  for="exampleFormControlFile1">Choose File</label></td>
                                    <td>
                                        <input type="file" name="image" autocomplete="off" class="form-control-file" id="exampleFormControlFile1" required>
                                    </td>
                               </tr>
                               <tr class="form-group" >
                                    <td colspan="2"> <button type="submit" class="btn btn-primary button" name="submit" value="submit">Submit</button></td>
                               </tr>
                            </table>

                        </form>
                    </div>  
                </div>
            </div><br>
           
        </div>
        <br>

        <!-- footer and modal files -->
        <?php
        require './screen/footer.php';
        require './screen/modal.php';
        ?>
    </body>
</html>