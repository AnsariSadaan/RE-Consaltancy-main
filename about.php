<?php
require 'config.php';
//data base connection
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
            .nav-link {
        font-size: 18px;
    }

body {
    background-image: url(img/bk9.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

.form-group input[type=text] {
    padding: 0.7%;
    background-color: rgba(0, 0, 0, 0.25);
    color: white;

    padding-left: 2%;
    border: 1.5px solid white;
}

.form-group input[type=email] {
    padding: 0.7%;
    background-color: rgba(0, 0, 0, 0.25);
    color: white;

    padding-left: 2%;
    border: 1.5px solid white;
}

.form-group textarea[type=textarea] {
    padding: 0.7%;
    background-color: rgba(0, 0, 0, 0.25);
    color: white;

    padding-left: 2%;
    border: 1.5px solid white;
}
        </style>
    </head>
    <body>
        <!-- Header -->
    <?php require './screen/header.php'; ?>
        
    <div style="background-color: rgba(0, 0, 0, 0.75);padding-top:2.5%; padding-bottom:3%;">
        <div class="col-8">
            <h3 style="color: yellow; text-shadow: 1.5px 1.5px black;">About us</h3>
            <p style="text-align: justify; font-size: 18px; color:white; text-shadow: 1px 1px black;">At makaan.com, we understand that people everywhere are searching for a home to call their own. A home is a cherished memory that lasts forever, where the walls embrace memories, the ceilings shelter love and laughter, where the quiet corners offer a much-needed pause and life itself becomes a reason to celebrate.</p>
            <p style="text-align: justify; font-size: 18px; color: white; text-shadow: 1px 1px black;">We want to make the journey as joyful as the moment when you finally find the perfect home. So we begin by partnering with our customers from the start and being there when it matters the most - right from online search to brokers to home loans to paperwork to finally finding that perfect home. At makaan.com, we help you find joy.</p>
            <h3 style="color: yellow; text-shadow: 1.5px 1.5px black;">Our Vision</h3>
            <p style="text-align: justify; font-size: 18px; color: white; text-shadow: 1px 1px black;">Delivering trustworthy experiences that you cherish for a lifetime.</p>
            <h3 style="color: yellow; text-shadow: 1.5px 1.5px black;">Our Mission</h3>
            <p style="text-align: justify; font-size: 18px; color: white; text-shadow: 1px 1px black;">To be the first choice for our consumers and partners in their journey of discovering, renting, buying, selling and financing a home. We do that with data, design, technology, and above all the passion of our people, while delivering value to our shareholders.</p>
        </div>
        </div>
    
        <!-- footer and contact modal -->
    <?php
    require './screen/footer.php';
    require './screen/modal.php';
    ?>
    </body>
</html>