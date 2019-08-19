<?php
session_start();
include_once 'include/class.user.php';

$user = new User(); 
$user_id = $_SESSION['user_id'];

// if user is not logged in, go to login
    if (!$user->get_session()){
    header("location:login.php");
    }

// if user click logout, go to login 
    if (isset($_GET['destroy'])){
    $user->user_logout();
    header("location:login.php");
    }
?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<div id="container">
    <div id="header">
        <a href="home.php?destroy=logout">LOGOUT</a>
    </div>
    <div id="main-body">
        <h1>Welcome <?php $user->get_username($user_id); print($user_id);?></h1>
    </div>
    <div id="footer">
    </div>
</div>