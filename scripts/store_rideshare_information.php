<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

    if (isset($_POST['submit'])){
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['appt'] = $_POST['appt'];

    header('Location: rideshare_checkout.php');
    }

