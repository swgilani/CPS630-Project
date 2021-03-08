<?php
require '../db/dbc.php';
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

    if (isset($_POST['submit']) && !isset($_SESSION['user']) ){
   
        echo '<script>alert("You must be logged in to perform this action!")</script>'; 
    }

    else if (isset($_POST['submit']) && isset($_SESSION['user']) && isset($_SESSION['userID'])){

        $total_price = $_POST['total_price'];
        $destination = $_SESSION['destination'];
        $date =$_SESSION['trip_start'];
        $time = $_SESSION['appt_time'];
        $user_id = $_SESSION['userID'];
        $store_name = $_SESSION['store_name'];
        

       

        $sql2 = "INSERT INTO order_table (order_ID, date_issued, date_done, total_price, payment_code, userID, trip_ID, store_name)
        VALUES (default,null,'$date','$total_price',default,'$user_id', null,'$store_name');";
        

            if ($dbc->query($sql2) === TRUE) {
                $order_id_for_customer = $dbc->insert_id;
                echo '<script type="text/javascript">'; 
                echo "alert('Order Placed! Your order id is $order_id_for_customer');"; 
                echo 'window.location.href = "../index.php";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $dbc->error;
            }
    }

    else if (isset($_POST['submit'])) {
        echo "<script>alert('Error occured. Please try again.')</script>";  
    }



?>