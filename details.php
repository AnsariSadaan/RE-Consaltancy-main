<?php
  session_start();
  require('config.php');
  if(!isset($_SESSION['uname'])){
    header('Location: login.php');
    exit();
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
                background-image: url(img/bk6.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }



                table,th,td
                {
                    border-collapse:collapse;
                    color:#f9ffa4;


                }
              table
              {
                width:100%;
                margin-left:2%;



              }
              i
              {
                color:#6fdfdf;
              }




    </style>
    </head>
    <body>
        <div style="background-color: #9FC088 ">
        <?php
            require('./screen/header.php');
        ?>
          </div>



<div  style="background-color: rgba(0, 0, 0, 0.94); padding:0px 50px 0px 50px;"><br><br><br>
<div  "class="row">
<?php
    $uname=$_SESSION['uname'];

    $query="SELECT image, prostatus, protype, typo , price, address, city FROM sellers ORDER BY updated_on Desc";

    $result=mysqli_query($con,$query) or die(mysqli_error($con));

    while($row=mysqli_fetch_array($result)){
    echo'
    <table>
        <tr>
            <td rowspan="3" >
                <p><img style=" width:280; height:230;"class="card-img-top" src="images/'.$row['image'].'" alt="Card image cap"></p>
            </td>
            <td>
                <p><i  " class="fa-solid fa-building "></i> <span  style="font-size:21px;font-weight:bold; font-family:times new roman;">Property Type<br></span><span style="   font-size:19.5px; font-family:times new roman; color:#b4ff9f;"> '.$row['protype'].'</p>
            </td>
            <td>
                <p><i  class="fa-solid fa-money-bill"></i> <span style=" font-size:21px; font-weight:bold;  font-family:times new roman;">Property Status<br></span><span style="font-size:19.5px; font-family:times new roman; color:#b4ff9f;"> '.$row['prostatus'].'</p>
            </td>

        </tr>
        <tr>

                <td>
                    <p><i   class="fa-solid fa-chart-area"></i> <span  style=" font-weight:bold; font-size:21px; font-family:times new roman;">Typology<br></span><span style=" font-size:19.5px;  font-family:times new roman; color:#b4ff9f;"> '.$row['typo'].'</p>
                </td>
                <td>
                    <p ><i  class="fa-solid fa-location-pin"></i> <span  style=" font-weight:bold; font-size:21px; font-family:times new roman;">Address<br> </span><span style=" font-size:19.5px;  font-family:times new roman; color:#b4ff9f;">'.$row['address'].', '.$row['city'].'</p>
                </td>
                .


        </tr>
        <tr>

                <td>
                    <p><i  class="fa-solid fa-hand-holding-dollar"></i> <span style="font-weight:bold;  font-size:21px; font-family:times new roman;">Price in Sq / Ft<br> </span><span style="font-size:19.5px;  font-family:times new roman; color:#b4ff9f;">'.$row['price'].'</p>
                </td>
                <td>
                    <p><i  class="fa-solid fa-door-closed"></i> <span style="font-weight:bold;   font-size:21px; font-family:times new roman;">Overlooking<br> </span><span style="font-size:19.5px;   font-family:times new roman; color:#b4ff9f;">Pool, Park/Garden, Club, Main Road</p>
                </td>

        </tr>

    </table><br><br>
    <h3 style="color:white; letter-spacing:2px; font-size:22px; text-align:center; text-transform:uppercase; font-weight:bold; font-family:times new roman;"><span >--- Features ---</span></h3>
    <table style="font-family:times new roman; margin-bottom:2%; font-size:21px;">

                <tr>
                <td style="padding-top:1.5%;">
                </td>
               <td>
                               </td>
                              <td>
                                              </td>
                                             <td>
                                                                                           </td>
                </tr>

                <tr  >
                    <td style="color:#ffb72b;"><i class="fa-solid fa-bell"></i> Security / Fire Alarm</td>
                    <td style="color:#ffb72b;"><i class="fa-solid fa-tty"></i> Intercom Facility</td>
                    <td style="color:#ffb72b;"><i class="fa-solid fa-elevator"></i> Lifts</td>
                    <td style="color:#ffb72b;"><i class="fa-solid fa-screwdriver-wrench"></i> Maintenance Staff</td>

                </tr>
                   <tr>
                   <td><br>
                   </td>
                   </tr>
                 <tr >
                     <td style="color:#ffb72b;"><i class="fa-solid fa-boxes-stacked"></i> Water Storage</td>
                     <td style="color:#ffb72b;"><i class="fa-solid fa-square-parking"></i> Visitor Parking</td>
                     <td style="color:#ffb72b;"><i class="fa-solid fa-person-swimming"></i> Swimming Pool</td>
                     <td style="color:#ffb72b;"><i class="fa-solid fa-tree"></i> Park</td>
                 </tr>
                                    <tr>
                                    <td><br>
                                    </td>
                                    </tr>
                      <tr>
                        <td style="color:#ffb72b;"><i class="fa-solid fa-building-shield"></i> Security Personnel</td>
                        <td style="color:#ffb72b;"><i class="fa-solid fa-dumbbell"></i> Fitness Center / GYM</td>
                        <td style="color:#ffb72b;"><i class="fa-solid fa-truck-moving"></i> Waste Disposal</td>
                        <td style="color:#ffb72b;"><i class="fa-solid fa-cube"></i> Club House </td>
                      </tr>
    </table><br><br>
        <h3 style="color:white; letter-spacing:2px; font-size:22px; text-align:center; text-transform:uppercase; font-weight:bold; font-family:times new roman;"><span >--- unit plans ---</span></h3>
        <table style="font-family:times new roman; margin-bottom:2%; font-size:21px;">

                    <tr>
                    <td style="padding-top:1.5%;">
                    </td>
                    <td style="padding-top:1.5%;">
                    <img style=" width:380; height:250;" src="img/onebhkimg.jpg" alt="NA">
                    <h5 style="color:white; letter-spacing:0.3rem; margin-left:33%;"><br>1 BHK </h5>
                    </td>
                    <td style="padding-top:1.5%;">
                        <img style=" width:380; height:250;" src="img/twobhkimg.jpeg" alt="NA">
                        <h5 style="color:white; letter-spacing:0.3rem; margin-left:33%;"><br>2 BHK </h5>
                        </td>
                      <td style="padding-top:1.5%;">
                        <img style=" width:380; height:250;" src="img/threebhkimg.jpg" alt="NA">
                        <h5 style="color:white; letter-spacing:0.3rem; margin-left:33%;"><br>3 BHK </h5>
                          </td>
                    </tr>

        </table>
         <h3 style="color:white; letter-spacing:2px; font-size:22px; text-align:center; text-transform:uppercase; font-weight:bold; font-family:times new roman;"><span >--- floor plans ---</span></h3>
                                        <table style="font-family:times new roman; margin-bottom:2%; font-size:21px;">

                                                    <tr>
                                                    <td style="padding-top:1.5%;">
                                                    </td>
                                                    <td style="padding-top:1.5%;">
                                                    <img style=" width:380; height:250;" src="img/1bhkfp.jpg" alt="NA">
                                                    <h5 style="color:white; letter-spacing:0.3rem; margin-left:28%;"><br>1 BHK </h5>
                                                    </td>
                                                    <td style="padding-top:1.5%;">
                                                        <img style=" width:380; height:250;" src="img/2bhkfp.png" alt="NA">
                                                        <h5 style="color:white; letter-spacing:0.3rem; margin-left:33%;"><br>2 BHK </h5>
                                                        </td>
                                                      <td style="padding-top:1.5%;">
                                                        <img style=" width:380; height:250;" src="img/3bhkfp.jpeg" alt="NA">
                                                        <h5 style="color:white; letter-spacing:0.3rem; margin-left:33%;"><br>3 BHK </h5>
                                                          </td>
                                                    </tr>

                                        </table><br><br>
         <h3 style="color:white; letter-spacing:2px; font-size:22px; text-align:center; text-transform:uppercase; font-weight:bold; font-family:times new roman;"><span >--- Prices ---</span></h3><br>
                                        <table style="font-family:times new roman; background-color: rgba(0, 0, 0, 0.60);width:94%; margin-bottom:2%; font-size:21px;">

                                                    <tr style="">
                                                    <td style="padding-top:1.5%;">
                                                    </td>
                                                    <td style="border:1px solid white;">
                                                      <h5 style="color:white; letter-spacing:0.2rem; font-size:25px; text-align:center;"><br>Starting </h5><br>
                                                      <h5 style="color:white; letter-spacing:0.2rem; font-family:Bell MT; font-size:55px;text-align:center;">Rs 41 L</h5>
                                                    <h5 style="color:white; letter-spacing:0.3rem; font-size:23px; text-align:center;"><br>1 BHK </h5><br>
                                                    </td>
                                                    <td style="border:1px solid white;">
                                                         <h5 style="color:white; letter-spacing:0.2rem; font-size:25px; text-align:center;">Starting </h5><br>
                                                         <h5 style="color:white; letter-spacing:0.2rem; font-family:Bell MT; font-size:55px; text-align:center;">Rs 76 L </h5>
                                                        <h5 style="color:white; letter-spacing:0.3rem; font-size:23px; text-align:center;"><br>2 BHK ULTIMA </5><br>
                                                        </td>
                                                      <td style="border:1px solid white;">
                                                        <h5 style="color:white; letter-spacing:0.2rem; font-size:25px; text-align:center;"><br>Starting </h5><br>
                                                        <h5 style="color:white; letter-spacing:0.2rem; font-family:Bell MT; font-size:55px; text-align:center;">Rs 98 L </h5>
                                                        <h5 style="color:white; letter-spacing:0.3rem; font-size:23px; text-align:center;"><br>3 BHK OPTIMA</h5><br>
                                                          </td>
                                                    </tr>

                                        </table>

    <div style="padding-left:42%;  padding-top:3%; padding-bottom:25%;">
</div>';
}
?>

</div>
</div>

<!-- footer and modal files -->
        <?php
        require('./screen/footer.php');
        require('./screen/modal.php');
        ?>
  </body>
</html>