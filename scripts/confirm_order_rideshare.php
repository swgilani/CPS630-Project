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
        $total_distance=  $_POST['total_distance'];
        $source = $_SESSION['source']; 
        $destination = $_SESSION['destination'];
        $date =$_SESSION['date'];
        $time = $_SESSION['appt'];
        $user_id = $_SESSION['userID'];
        $items = $_POST['item'][0];
        $arr = explode(",", $items, 2);
        $items = $arr[0];

    


        $sql_car = "SELECT * FROM car_table WHERE car_model='$items'";
        $return_car_id = $dbc->query($sql_car);
        if ($return_car_id->num_rows > 0) {
            // output data of each row
            while($row = $return_car_id->fetch_assoc()) {
                $car_returned = $row['carID'];
            }
        }


        $sql = "INSERT INTO trip_table (tripID, source_code, destinationCode, distance, carID, price)
        VALUES (default,'$source','$destination','$total_distance','$car_returned','$total_price');";
        
                if ($dbc->query($sql) === FALSE){
                    echo "Error: " . $sql . "<br>" . $dbc->error;
                }


        $sql2 = "INSERT INTO order_table (order_ID, date_issued, date_done, total_price, payment_code, userID, trip_ID, store_name)
        VALUES (default,null,'$date','$total_price',default,'$user_id', (select MAX(tripID) FROM trip_table),null);";

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