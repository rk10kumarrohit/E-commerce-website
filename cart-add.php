<?php
    $product_id = $_GET['id'];
    require 'common.php';
    $email = $_SESSION['email'];
    $user_id =$_SESSION['id'];
    $insert_query = "INSERT INTO user_products (user_id, product_id, status) VALUES ('$user_id','$product_id', 'Added to cart')";
    mysqli_query($con, $insert_query) or die(mysqli_error($con));
    header('location:products.php');
?>    
    
    

