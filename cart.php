<?php
require 'common.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body
        <?php 
        require 'header.php';
        ?>
        <?php 
            $email= $_SESSION['email']; 
            $user_id = $_SESSION['id'];
            $select_query = "SELECT items.pid, items.product_name, items.price FROM user_products INNER JOIN users ON users.id = user_products.user_id INNER JOIN items ON items.pid = user_products.product_id WHERE user_products.user_id = $user_id";
            $select_query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
            if (mysqli_num_rows($select_query_result) == 0) { ?>
            <div class="conatiner">
                <div class="jumbotron">
                    <h3 align="center">Add items to the cart first!</h3>
                </div>
            </div>
        <?php    }
            else { 
                   
        ?>
                    <div class="row decor_bg">
                    <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php    
                            $count = 0;
                            $sum = 0;
                            while($row = mysqli_fetch_array($select_query_result)) {  
                                    $sum += $row['price']; 
                        ?>    
                            <tr>
                                <td><?php echo ++$count; ?></td><td><?php echo $row['product_name']; ?></td><td><?php echo $row['price']; ?></td><td><a href="cart-remove.php?id=<?php echo $row['pid']; ?>" class='remove_item_link'>Remove</a></td>
        <?php }?>
                            </tr>
                            <tr>
                                <td></td><td></td><td>Total = <?php echo $sum; ?><td><a href="success.php" class='btn btn-primary'>Confirm Order</a></td>        
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        <?php 
        require 'footer.php';
        ?>
    </body>
</html>