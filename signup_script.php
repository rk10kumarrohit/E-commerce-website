<?php
    require 'common.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password  = $_POST['password'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $select_query = "SELECT email FROM users";
    $select_query_result = mysqli_query($con, $select_query);
    $user_registration_query = "INSERT INTO users (name,email,password,contact,city,address) VALUES ('$name', '$email','$password', '$contact', '$city', '$address')";
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
         while($row = mysqli_fetch_array($select_query_result)) {
            if ($email == $row['email']) { ?>
            <div class="container-fluid">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">ERROR! Email already registered.</h3><hr>
                    <p align="center"><a href="signup.php">Try again.</a></p>
                </div>
            </div>
        </div>
        <?php exit();?>
         <?php }}
       if ($email != $row['email']) {
           if (strlen($password)<8) { ?>
                <div class="container-fluid">
                <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Password is too Small.</h3><hr>
                    <p align="center"><a href="signup.php">Try again.</a></p>
                </div>
            </div>
            <?php        exit(); }
            $user_registration_query_result = mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
            $_SESSION['email']=$email;
            $_SESSION['id'] = mysqli_insert_id($con); 
        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">User has successfully Registered.</h3><hr>
                    <p  align="center"><a href="products.php">Click Here</a> to go to home page.</p>
                </div>
            </div>
        </div>
        <?php }
        ?>
    </body>
</html>    
    