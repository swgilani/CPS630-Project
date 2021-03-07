<!DOCTYPE html>
<?php session_start();
require_once('../scripts/db_connect.php'); ?>
<html>
<head>
    
	  <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
	
	
 
  <link rel="stylesheet" type="text/css" href="../css/shopping_cart.css">
  <script src="../scripts/shopping_cart.js"></script>
  <script src="../scripts/calculate_price.js"></script>
</head>
<body onload="total_price();">



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

  <?php 
  if (isset($_SESSION['store_name'])) {
    //echo $_SESSION['store_name']; 
    $query_florist1 = 'SELECT store_code, flower_name, price FROM flower_table WHERE store_code = 1'; //Forest of Flowers
    $query_florist2 = 'SELECT store_code, flower_name, price FROM flower_table WHERE store_code = 2'; //Flower Creations
    $query_florist3 = 'SELECT store_code, flower_name, price FROM flower_table WHERE store_code = 3'; //Oakville Flower
    $query_coffee1 = 'SELECT store_code, coffee_name, price FROM coffee_table WHERE store_code = 1';  //Tim hortons
    $query_coffee2 = 'SELECT store_code, coffee_name, price FROM coffee_table WHERE store_code = 2'; //Starbucks
    $query_coffee3 = 'SELECT store_code, coffee_name, price FROM coffee_table WHERE store_code = 3';   //Second cup

    if ($_SESSION['store_name'] == 'Forest of Flowers Mississauga'){ $response = @mysqli_query($dbc, $query_florist1); }
    else if ($_SESSION['store_name'] == 'Flower Creations Mississauga'){ $response = @mysqli_query($dbc, $query_florist2);  }
    else if ($_SESSION['store_name'] == 'Oakville Florist Shop'){ $response = @mysqli_query($dbc, $query_florist3);  }
    else if ($_SESSION['store_name'] == 'Tim Hortons Mississauga'){ $response = @mysqli_query($dbc, $query_coffee1);  }
    else if ($_SESSION['store_name'] == 'Starbucks Mississauga'){ $response = @mysqli_query($dbc, $query_coffee2);  }
    else if ($_SESSION['store_name'] == 'Second Cup Mississauga'){$response = @mysqli_query($dbc, $query_coffee3);  }


    if ($response){
      $count = 0;
      while ($row = mysqli_fetch_array($response)){
        
        echo "<li id = '".$count."' name='item1' value='first'  draggable='true' ondragstart='drag(event)'><input type='hidden' name='item[]' value='".$row['flower_name']. ",". $row['price']."'/>" .
        $row['flower_name'] . " - $" . $row['price'] .  "<img src='https://cdn.th3rdwave.coffee/merchants/3kI3aupy/3kI3aupy-md_2x.jpg'  width='35' height='35'></li>";
        $count++;

      }
    }
 
  }
   else {
     echo "No items found";
    }
  ?>

  
   </ul>
  
  
  
  <form action="" method="POST">
	<div id="cart" ondrop="drop(event); total_price();" ondragover="allowDrop(event)">
		<h1>Shopping Cart</h1>
		
    <p>Delivery Date: <?php  if (isset($_SESSION['trip_start'])) {echo $_SESSION['trip_start'];} ?></p>
    <p>Time for delivery: <?php  if (isset($_SESSION['appt_time'])) {echo $_SESSION['appt_time'];} ?> </p>
    <p>Destination: <?php  if (isset($_SESSION['destination'])) {echo $_SESSION['destination'];} ?> </p>
    <p class="total_price " id="items_price"></p>
    <input type="hidden" value="" name="total_price" id="form_price" />
    <input type="submit" value="Confirm Order" name="submit" class="confirm_button">
	</div>
  </form>

  <?php
  echo "shit below is for testing purposes";
  pre_r($_POST);
  ?>

  
<?php
  function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }
  ?>
 


  <?php 
  ?>
    <br><br>

 
  <br>
</body>
</html>