<?php
session_start();
require 'config.php';
//checkif the user is logged in
if (!isset($_SESSION['uname'])) {
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style>
            .card
            {
                height: 450px;
                overflow: hidden;
                padding: 1px;
            }

            .card-image
            {
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
        <?php require './screen/header.php'; ?>
        <br>
<div class="container">
<div class="row">
<?php
$uname = $_SESSION['uname'];

$query =
    'SELECT image, id, typo, protype, prostatus, price, address, city FROM sellers ORDER BY updated_on Desc';

($result = mysqli_query($con, $query)) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
    echo '    
    <div   class="col s4">
    <div  class="card" style="width: 24rem;    height:auto;">
    <div class="card-body" style="overflow: auto; height:auto;">
        <p style="text-align:center; font-size:20px; color:crimson; padding-top:0.5%; font-weight:900; text-transform:uppercase; font-family:serif;" >' .
        $row['city'] .
        ' </p>
        <img style="padding:1%; width:340; height:250;"class="card-img-top" src="images/' .
        $row['image'] .
        '" alt="Card image cap"><br><br>
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
            <br>
            <a href="details.php" style="float:right; margin-right:1%;"class="btn btn-primary">Know More</a>
            <a href="checkout.php" style="float:right; margin-right:2%;"class="btn btn-primary">Buy Now</a>
            <button order_id=' .
        $row['id'] .
        ' type="button" class="btn btn-primary button"  name="add_to_wishlist">Add to wishlist</button>
        </div>
    </div><br><br>
    </div>';
}
?>
    
</div>

</div>


    <?php
    require './screen/footer.php';
    require './screen/modal.php';
    ?>



        
        <script type="text/javascript">
    $(document).ready(function(){
        $(".button").click(function(){
        var numb_data = $(this).attr('order_id');  
        jQuery.ajax({
                type: 'POST',
                url: 'script.php',
                data: { order_id: numb_data, action: 'setcvdownloads' },
                success: function(data) {
                    if(data==1){
                    alert("one item added to wishlist");
                    }else{
                        alert("Item is already in wishlist");
                    }
                    //$("p").text(data);
                    window.location.href = "mywishlist.php";
                }
            });
    });
});
</script>
</body>
</html>