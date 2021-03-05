<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

    if (isset($_POST['submit'])){
    $_SESSION['store_name'] = $_POST['shop'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['trip_start'] = $_POST['trip-start'];
    $_SESSION['appt_time'] = $_POST['appt'];

    header('Location: http://localhost/CPS630-Project/templates/ride_and_delivery_checkout.php');
    }


?>