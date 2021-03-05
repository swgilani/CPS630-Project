<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	  <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
	
	
 
  <link rel="stylesheet" type="text/css" href="../css/shopping_cart.css">
  <script src="../scripts/shopping_cart.js"></script>
</head>
<body>


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

    <h1><?php  if (isset($_SESSION['store_name'])) {echo $_SESSION['store_name'];} else { echo "Could not find the store, Please try again";} ?></h1>




   
  


  <ul style="list-style-type:none;" id="drag" name="items">
       <li id = "d1" name="item1" value="first"  draggable="true" ondragstart="drag(event)"><input type='hidden' name='item1' value='first item,price'/>
       First Item - $Price<img src="https://cdn.th3rdwave.coffee/merchants/3kI3aupy/3kI3aupy-md_2x.jpg"  width="35" height="35"></li>
       <li id = "d2" name="item2" value="second"  draggable="true" ondragstart="drag(event)"><input type='hidden' name='item2' value='second item,price'/> Second Item - $Price
       <img src="https://cdn.th3rdwave.coffee/merchants/3kI3aupy/3kI3aupy-md_2x.jpg" width="35" height="35"></li>
       <li id = "d3" name="item3" value="third"  draggable="true" ondragstart="drag(event)"><input type='hidden' name='item3' value='third item,price'/> Third Item - $Price
       <img src="https://cdn.th3rdwave.coffee/merchants/3kI3aupy/3kI3aupy-md_2x.jpg" width="35" height="35"></li>
       
   </ul>
  
  
  
  
  <form action="" method="POST">
	<div class="cart" ondrop="drop(event)" ondragover="allowDrop(event)">
		<h1>Shopping Cart</h1>
		
    <p>Delivery Date: <?php  if (isset($_SESSION['trip_start'])) {echo $_SESSION['trip_start'];} ?></p>
    <p>Time for delivery: <?php  if (isset($_SESSION['appt_time'])) {echo $_SESSION['appt_time'];} ?> </p>
    <p>Destination: <?php  if (isset($_SESSION['destination'])) {echo $_SESSION['destination'];} ?> </p>
    <input type="submit" value="Confirm Order" name="submit" id="button1">
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
 


  <?php session_destroy(); ?>
    <br><br>

 
  <br>
</body>
</html>