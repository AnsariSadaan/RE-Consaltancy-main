    <?php
    // Include the config file to use the existing database connection
    include 'config.php'; 

    session_start();

    $order_id = $_POST['order_id'];
    $wishlist_id = $_POST['wishlist_id'];
    $uname = $_SESSION['uname'];

    // Fetch seller information
    $query = "SELECT * FROM sellers WHERE id = $order_id";
    $date = date('d-m-y');
    ($result = mysqli_query($con, $query)) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);

    $query1 =
    "SELECT id FROM cart WHERE order_id = '" .
    $row['id'] .
    "' AND user_id = '" .
    $_SESSION['id'] .
    "'";

    ($result1 = mysqli_query($con, $query1)) or die(mysqli_error($con));
    $row1 = mysqli_fetch_array($result1);
    $count = mysqli_num_rows($result1);

    if ($count < 1) {
    $res =
        "INSERT INTO cart(order_id, user_id, wishlist_id, date, status) VALUES ('" .
        $row['id'] .
        "', '" .
        $_SESSION['id'] .
        "', $wishlist_id, '" .
        $date .
        "', 'Y')";
    ($result = mysqli_query($con, $res)) or die(mysqli_error($con));
    echo 1; // Item successfully added to the cart
    } else {
    echo 2; // Item already exists in the cart
    }

?>