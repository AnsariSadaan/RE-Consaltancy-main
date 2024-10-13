<?php
session_start();
require 'config.php';
if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
}
if (isset($_POST) & !empty($_POST)) {
    $wishlist_id = $_POST['order_id'];
    $con = mysqli_connect('localhost', 'root', '', 're_consultancy');
    $uname = $_SESSION['uname'];

    $query = "DELETE  from wishlist where id=$wishlist_id";
    $date = date('d-m-y');
    ($result = mysqli_query($con, $query)) or die(mysqli_error($con));
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
            overflow-x: hidden;
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><span><h2 style="text-transform:uppercase; color:aqua; font-weight:bold; font-family:Copperplate Gothic Bold Copperplate Gothic Bold; letter-spacing:0.7mm; font-size:20;">RE Consultancy</h2></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="home.php" target = "_self"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php" target = "_self"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
  <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg> About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " type="button" data-toggle="modal" data-target="#exampleModal" href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg> Contact Us</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " type="button" href="cart.php" target = "_self"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/></svg>  Cart</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " type="button" href="logout.php" target = "_self"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-x" viewBox="0 0 16 16">
  <path d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zM6.854 5.146 8 6.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 7l1.147 1.146a.5.5 0 0 1-.708.708L8 7.707 6.854 8.854a.5.5 0 1 1-.708-.708L7.293 7 6.146 5.854a.5.5 0 1 1 .708-.708z"/>
</svg> Logout</a>
                </li>
              </ul>
            </div>
        </nav>
        <br>
<div class="container">


<div class="row">
<?php
$uname = $_SESSION['uname'];
$query =
    "SELECT sellers.*, wishlist.id as 'wishlist_id' , wishlist.order_id FROM sellers 
    Inner join wishlist ON sellers.id = wishlist.order_id WHERE wishlist.user_id = '" .
    $_SESSION['id'] .
    "'
    ORDER BY sellers.updated_on Desc";

($result = mysqli_query($con, $query)) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
    echo '    
    <div class="col s4">
        <div class="card" style="width: 24rem; height:auto;">
            <p style="text-align:center; font-size:20px; color:crimson; padding-top:0.5%; font-weight:900; text-transform:uppercase; font-family:serif;" >' .
        $row['city'] .
        ' </p>
            <img style="padding:1%; margin-left:5.4%; width:340; height:250;"class="card-img-top" src="images/' .
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
                    <button type="button"  class="btn btn-primary cart" name="add_to_wishlist" wishlist_id=' .
        $row['wishlist_id'] .
        ' order_id=' .
        $row['order_id'] .
        ' >Add to Cart</button>
                    <a wishlist_id=' .
        $row['wishlist_id'] .
        ' order_id=' .
        $row['order_id'] .
        ' type="button" style="color: white" class="btn btn-primary remove" name="remove" value="submit">Remove</a>
             </div>
        </div><br><br>
    </div>';
}
?>
    
</div>

</div>

      <!-- footer and modal files -->
        <?php
        require './screen/footer.php';
        require './screen/modal.php';
        ?>
        <script type="text/javascript">
    $(document).ready(function(){
        $(".button").click(function(){
          var numb_data = $(this).attr('wishlist_id');
          alert(numb_data);
          jQuery.ajax({
                type: 'POST',
                url: 'mywishlist.php',
                data: { order_id: numb_data, action: 'setcvdownloads' },
                success: function(data) {
                    //alert(data);
                    //$("p").text(data);
                    window.location.href = "mywishlist.php";
                }
            });
   });
   $(".cart").click(function(){
          var numb_data = $(this).attr('wishlist_id');
          var order_id = $(this).attr('order_id');
          jQuery.ajax({
            type: 'POST',
            url: 'cartscript.php',
            data: { wishlist_id: numb_data, action: 'setcvdownloads', order_id: order_id},
            success: function(data) {
              if(data==1){
                alert("one item added to cart");
                window.location.href = "cart.php";
                  }else{
                    alert("already in cart");
                  }
                    //alert(data);
                    //$("p").text(data);
                }
            });
   });
   $(".remove").click(function(){
          var numb_data = $(this).attr('wishlist_id');
          alert("one item remove from wislisht");
          jQuery.ajax({
                type: 'POST',
                url: 'mywishlist.php',
                data: { order_id: numb_data, action: 'setcvdownloads' },
                success: function(data) {
                    //alert(data);
                    //$("p").text(data);
                    window.location.href = "mywishlist.php";
                }
            });
   });
});
</script> 
    </body>
</html>