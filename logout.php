<?php
    require 'common.php';
    if (!isset($_SESSION['email'])) {
        header ('location:index.php');
    }
    else {
        session_destroy();
        header('location:index.php');
    }
?>    