<!DOCTYPE html>
<?php
require_once('../db/dbc.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
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
    <ul id = "menu">
      <li><a href="../index.php">Home</a></li>
      <li><a href="#">db Maintain</a>
        <ul>
          <li><a href="insert.php">Insert</a></li>
          <li><a href="delete.php">Delete</a></li>
          <li><a href="select.php">Select</a></li>
          <li><a href="update.php">Update</a></li>
        </ul>
      </li>
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
   <br><br>
    <h1>Plan for Smart Services</h1>
    <img src="../img/logo.png" class="center">

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


    <div>
    <p style="width:100%">Rate our overall services.</p>
      <select id="rate">
        <option value="1star">1</option>
        <option value="2stars">2</option>
        <option value="3stars">3</option>
        <option value="4stars">4</option>
        <option value="5stars">5</option>
      </select>
    <p style="width:100%">Write your feedback.</p>
      <textarea class="form" rows="5"></textarea>
      <br>
      <button type="submit">Submit</button>
    </div>

  </body>
</html>
