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
          <li><a href="#">Insert</a></li>
          <li><a href="#">Delete</a></li>
          <li><a href="#">Select</a></li>
          <li><a href="#">Update</a></li>
        </ul>
      </li>
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
      
      <?php if (isset($_SESSION['user'])){
        echo "<li style='float:right'><a href='../scripts/logout.php'>Sign Out</a></li>";
        echo "<li style='float:right'><a href=''>Welcome ". $_SESSION['user'] ."</a></li>";
        
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
      <li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li>
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
      $sql = "SELECT * FROM order_table WHERE order_ID =" . $search;
      //select order_id from order_table where userid = $userd, order_id = $order_id
      $result = $dbc->query($sql);
      $info = " ";
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "Your order ID is ".$search." has completed.";
        }
      } else {
        echo "Cannot find order ID ".$search.", please try again.";
      }
    }
    ?>
  </div>
    <h2>Contact us</h2>
    <div id="contactUs">
        <h3 style="font-weight: bold;">CPS630-02 Group 13:</h3>
        <table style="width:80%">
          <tr>
            <th>Name</th>
            <th>Student Number</th>
            <th>Email Address</th>
            <th>Phone Number</th>
          </tr>
          <tr>
            <td>Syed Gilani</td>
            <td>500774969</td>
            <td>swgilani@ryerson.ca</td>
            <td>#111-111-1111</td>
          </tr>
          <tr>
            <td>Aaron Ooi</td>
            <td>500840798</td>
            <td>aaron.ooi@ryerson.ca</td>
            <td>#222-222-2222</td>
          </tr>
          <tr>
            <td>Rui Qi Wang</td>
            <td>500841896</td>
            <td>r1wang@ryerson.ca</td>
            <td>#333-333-3333</td>
          </tr>
          <tr>
            <td>Ke Zhang</td>
            <td>500832394</td>
            <td>ke.zhang@ryerson.ca</td>
            <td>#444-444-4444</td>
          </tr>
      </div>

  </body>
</html>
