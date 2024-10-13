<?php
session_start();
require 'config.php';
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    $cart_id = $_POST['cart_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare('DELETE FROM cart WHERE id = ?');
    $stmt->bind_param('i', $cart_id);

    if ($stmt->execute()) {
        // Success message (optional)
    } else {
        error_log(mysqli_error($con));
        // Error handling (optional)
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery-3.4.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            .card{
            height: 450px;
            overflow: hidden;
            padding: 1px;
            }

            .card-image{
            height: 200px;
            overflow: hidden;
            }
            body
      {
        background-image: url('./img/bk3.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      .form-group input[type=text]
            {
                padding:0.7%;
                background-color: rgba(0, 0, 0, 0.25);
                color:white;
               
                padding-left:2%;
                border:1.5px solid white;
             }
             .form-group input[type=email]
            {
                padding:0.7%;
                background-color: rgba(0, 0, 0, 0.25);
                color:white;
                
                padding-left:2%;
                border:1.5px solid white;
             }
             .form-group textarea[type=textarea]
                {
                padding:0.7%;
                background-color: rgba(0, 0, 0, 0.25);
                color:white;
    
                padding-left:2%;
                border:1.5px solid white;
                }
                .nav-link
                {
                font-size:18px;
                }
        </style>
    </head>
    <body>
        <?php
        require('./screen/header.php')
        ?>
        <br>
<div class="container">


<div class="row">
<?php
$uname = $_SESSION['uname'];

$query =
    "SELECT sellers.*, cart.id as 'cart_id' , cart.order_id FROM sellers 
    Inner join cart ON cart.order_id = sellers.id WHERE cart.user_id = '" .
    $_SESSION['id'] ."'ORDER BY sellers.updated_on Desc";

($result = mysqli_query($con, $query)) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
    echo '    
    <div class="col s4">
        <div class="card" style="width: 24rem; height:auto;">
            <p style="text-align:center; font-size:20px; color:crimson; padding-top:0.5%; font-weight:900; text-transform:uppercase; font-family:serif;" >' .
        $row['city'] .
        ' </p>
            <img style="padding:1%; width:340; height:250; margin-left:5.4%;"class="card-img-top" src="images/' .
        $row['image'] .
        '" alt="Card image cap">
             <div class="card-body" style="overflow: auto;">
                        <p><span style="font-weight:900; color:black;  font-size:19px; font-family:times new roman;">Property Status: </span><span style=" font-size:19px; font-family:times new roman; color:black;"> ' .
        $row['prostatus'] .
        '</p>
                     <p><span style="font-weight:900; color:black;  font-size:19px; font-family:times new roman;">Property Type: </span><span style=" font-size:19px; font-family:times new roman; color:black;"> ' .
        $row['protype'] .
        '</p>
                     <p><span style="font-weight:900; color:black;   font-size:19px; font-family:times new roman;">Typology: </span><span style=" font-size:19px; font-family:times new roman; color:black;"> ' .
        $row['typo'] .
        '</p>
                    <p><span style="font-weight:900; color:black;  font-size:19px; font-family:times new roman;">Price in Sq / Ft: </span><span style="font-size:19px; font-family:times new roman; color:black;">' .
        $row['price'] .
        '</p>
                    <p ><span style="font-weight:900; color:black;  font-size:19px; font-family:times new roman;">Address: </span><span style=" font-size:19px; font-family:times new roman; color:black;">' .
        $row['address'] .
        ', ' .
        $row['city'] .
        '</p>
                    <a href="checkout.php" type="submit" style="color: white;" class="btn btn-primary" name="">Checkout</a>
            <a type="button" cart_id=' .
        $row['cart_id'] .
        ' order_id=' .
        $row['order_id'] .
        ' class="btn btn-primary delete" style="color: white;" name="delete">Delete</a>
             </div>
        </div><br><br>
    </div>';
}
?>
    
</div>

</div>

<!-- footer and modal -->
<?php
    require('./screen/footer.php');
    require('./screen/modal.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".button").click(function(){
          var numb_data = $(this).attr('wishlist_id');
          alert(numb_data);
          jQuery.ajax({
                type: 'POST',
                url: 'cart.php',
                data: { order_id: numb_data, action: 'setcvdownloads' },
                success: function(data) {
                    //alert(data);
                    //$("p").text(data);
                    window.location.href = "cart.php";
                }
            });
            
   });
   $(".delete").click(function(){
          var numb_data = $(this).attr('cart_id');
          alert("one item deleted from cart");
          jQuery.ajax({
                type: 'POST',
                url: 'cartdelete.php',
                data: { cart_id: numb_data, action: 'setcvdownloads' },
                success: function(data) {
                   // alert(data);
                    //$("p").text(data);
                    window.location.href = "cart.php";
                }
            });
            
   });
}); 
</script>
    </body>
</html>