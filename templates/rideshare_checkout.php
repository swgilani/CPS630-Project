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
  <script>
      function search() {
        var search = document.getElementById("search");
        if (search.style.display=="none") {
          search.style.display="block";
        }
        else{
          search.style.display="none";
        }
      }
    </script>
</head>
<body onload="total_price(); calculate_ride_distance();">
<?php include '../scripts/confirm_order_rideshare.php';?>

<ul id = "menu">
      <li><a href="../index.php">Home</a></li>
      <?php if (isset($_SESSION['user']) && $_SESSION['userID'] == 1){
      echo "<li><a href='#'>db Maintain</a>";
      echo "<ul>";
      echo "<li><a href='insert.php'>Insert</a></li>";
      echo "<li><a href='delete.php'>Delete</a></li>";
      echo "<li><a href='select.php'>Select</a></li>";
      echo"<li><a href='update.php'>Update</a></li>";
      echo"</ul>";
      echo"</li>";
      }
      ?>
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
      
      <?php if (isset($_SESSION['user'])){
        echo "<li style='float:right'><a href='../scripts/logout.php'>Sign Out</a></li>";
        echo "<li style='float:right'><a href=''>Welcome ". $_SESSION['user'] ."</a></li>";
        echo '<li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li>';
      }
      else {
        echo "<li style='float:right'><a href='signup.php'>Sign Up</a></li>";
      }
      ?>
      
      <li><a href="reviews.php">Reviews</a></li>
      <?php if (!isset($_SESSION['user'])){
        echo "<li style='float:right'><a href='login.php'>Login</a></li>";
      }
      ?>
      <!-- <li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li> -->
      <li><a href="#">Type of Services</a>
        <ul>
          <li><a href="rideshare.php">Rideshare</a></li>
          <li><a href="ride_and_delivery.php">Ride & Delivery</a></li>
        </ul>
      </li>
      
    </ul>

    <div id="search" style="float:right; display:none;">
      <form action="#" method="POST">
        <input type="text" placeholder="Search..." name="search">
        <button name="submit_result" type="submit">submit</button>
      </form>
    </div>
  

    <div style="text-align:right;">
    <?php
    if (isset($_POST['submit_result'])){
      $search = $_POST["search"];
      $userID = $_SESSION['userID'];
      $sql ="SELECT * FROM order_table WHERE order_ID='$search' AND userID='$userID'";
      //select order_id from order_table where userid = $userd, order_id = $order_id
      $result = $dbc->query($sql);
      $info = " ";
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "Your order ID is ".$search." has completed.";
        }
      } else {
        echo "You don't have an order with the ID ".$search.", please try again.";
      }
    }
    ?>
  </div>

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

    <br><br>

 
  <br>
</body>
</html>