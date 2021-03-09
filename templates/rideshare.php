<!DOCTYPE html>
<?php 
session_start(); 
require_once('../scripts/db_connect.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <script src="../scripts/location.js"></script>
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

  <body>
  <?php include '../scripts/store_rideshare_information.php';?>
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
    <h1>Ride share</h1>
    <br><br>

    <div id="map"></div>
    <form action="" method="POST">
      <label for="source">Pickup location</label><br>
      <input type="text" id="start" name="source" required><br>

      <label for="destination">Where to?</label><br>
      <input type="text" id="end" name="destination" required><br><br>

      <label for="date">Date</label>
      <input type="date" id="date" name="date" required><br/>

      <label for="appt">Pickup time</label>
      <input type="time" id="time" name="appt" required>      
      <br/>

      <br>
      <input type="submit" value="Submit" name="submit">
    </form>
    

    



  <script async defer src="https://maps.googleapis.com/maps/api/js?
key=AIzaSyDnTsfcAT5zS8NQ5d2QcxIpcU3w6835QbI&callback=initMap">
</script>
  </body>
</html>

