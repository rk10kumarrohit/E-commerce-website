<?php
    require 'common.php';
    $item_id = $_GET['id'];
    $user_id = $_SESSION['id'];
    $deletion_query = "DELETE FROM user_products WHERE user_id = $user_id AND product_id=$item_id";
    mysqli_query($con, $deletion_query) or die(mysqli_query($con, $deletion_query));
    header('location:cart.php');
?>    
