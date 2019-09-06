<?php
require 'common.php';
$user_id = $_SESSION['id'];
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {

$status_change_query = "UPDATE user_products SET status = 'Confirmed' WHERE user_products.user_id = '$user_id' AND user_products.status = 'Added to cart'";
mysqli_query($con, $status_change_query) or die(mysqli_error($con ));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
        <?php 
        require 'footer.php';
        ?>
    </body>
</html>
