<!DOCTYPE html>
<?php 
session_start(); 
require_once('../scripts/db_connect.php');
?>
<html>
<head>
	  <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
	
	
 
  <link rel="stylesheet" type="text/css" href="../css/shopping_cart.css">
  <script src="../scripts/shopping_cart.js"></script>
  <script src="../scripts/calculate_price.js"></script>
</head>
<body onload="total_price(); calculate_ride_distance();">
<?php include '../scripts/confirm_order.php';?>

<ul id = "menu">
      <li><a href="../index.html">Home</a></li>
      <li><a href="#">System Logo</a></li>
      <li><a href="aboutus.html">About Us</a></li>
      <li><a href="contactus.html">Contact Us</a></li>
      <li style="float:right"><a href="signup.html">Sign up</a></li>
      <li><a href="reviews.html">Reviews</a></li>
      <li style="float:right"><a href="login.html">Login</a></li>
      <li><a href="#">Type of Services</a>
        <ul>
          <li><a href="rideshare.php">Rideshare</a></li>
          <li><a href="ride_and_delivery.php">Ride & Delivery</a></li>
        </ul>
      </li>
    </ul>

    <br><br>

    <h1><?php  if (isset($_SESSION['source']) && isset($_SESSION['destination'])) {echo strtoupper($_SESSION['source']) . " ➜ " . strtoupper($_SESSION['destination']);} else { echo "Please try again";} ?></h1>




   

  <ul style="list-style-type:none;" id="drag" name="items">

  <?php 
  $query = 'SELECT car_model, priceID FROM car_table';
  $response = @mysqli_query($dbc, $query);
  if ($response){
    $count = 0;
    while ($row = mysqli_fetch_array($response)){
      echo "<li id ='".$count."' name='first' value='first'  draggable='true' ondragstart='drag(event)'><input type='hidden' name='item[]' value='".$row['car_model']. ",". $row['priceID']."'/>" . 
      $row['car_model'] . " - $" . $row['priceID'] .  "<img src='https://media.wired.com/photos/5d09594a62bcb0c9752779d9/1:1/w_1500,h_1500,c_limit/Transpo_G70_TA-518126.jpg'  width='35' height='35'></li>";
      $count++;
    }
  }
  ?>
  
   </ul>
  
  
  
  
  <form action="" method="POST">
	<div id="cart" ondrop="drop(event); total_price();" ondragover="allowDrop(event)">
		<h1>Shopping Cart</h1>
		
    <p>Date: <?php  if (isset($_SESSION['date'])) {echo $_SESSION['date'];} ?></p>
    <p>Time of pickup: <?php  if (isset($_SESSION['appt'])) {echo $_SESSION['appt'];} ?> </p>
    <p id="distance"></p>
    <p class="total_price " id="items_price"></p>
    <input type="hidden" value="" name="total_price" id="form_price" />
    <input type="hidden" value="" name="total_distance" id="form_distance" />
    <input type="submit" value="Confirm Order" name="submit" class="confirm_button">
	</div>
  </form>

  <?php
  pre_r($_POST);
  ?>

  
<?php
  function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }
  ?>
 


  <?php //session_destroy();
      ?>
    <br><br>

 
  <br>
</body>
</html>