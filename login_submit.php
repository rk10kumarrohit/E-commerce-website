<?php 
    require 'common.php';
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password =  mysqli_real_escape_string($con,$_POST['password']);
    $user_login_query = "SELECT id,email,password FROM users";
    $user_login_query_result = mysqli_query($con,$user_login_query) or die(mysqli_error($con));
    if (mysqli_num_rows($user_login_query_result)==0) {
        echo "There is no user with the email and password in the users table";
    }
    else {
        while($row = mysqli_fetch_array($user_login_query_result)) {
        if ($row['email']==$email and $row['password']==$password) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        header ('location:products.php');
        } } 
    }
?>   