<?php
require 'common.php';
$user_id = $_SESSION['id'];
if (!isset($_SESSION['email'])) {
    header ('location:index.php');
}
$old_password = $_POST['old-password'];
$new_password = $_POST['password'];
$retyped_password = $_POST['password1'];
if ($new_password != $retyped_password) {
    echo "PASSWORD DOES'NT MATCH";
    header('location:settings.php');
}
$password_fetch_query = "SELECT password FROM users WHERE users.id = $user_id";
$query_result = mysqli_query($con, $password_fetch_query);
$row = mysqli_fetch_array($query_result);
$fetched_password = $row['password'];
if ($old_password == $fetched_password) {
    $password_update_query = "UPDATE users SET password = '$new_password' WHERE users.id = '$user_id'";
    mysqli_query($con, $password_update_query);
} else {
    echo "Enter correct password";
}


    

