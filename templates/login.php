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
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    
    <div id='search' style='float:right; display:none;'>
      <form action='#' method='POST'>
        <input type='text' placeholder='Search...' name='search'>
        <button name='submit_result' type='submit'>submit</button>
      </form>
    </div>
   <br><br>
   
    
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

    <h2>Login Form</h2>

<form action="../db/loginProcess.php" method="post">
  <div class="imgcontainer">
    <img src="https://www.w3schools.com/howto/img_avatar2.png" style="width: 20%;" alt="Avatar" class="avatar">
  </div>
  <?php
  if(@$_GET['Empty']==true){
    ?>
    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
  <?php
  }
  ?>

  <?php 
    if(@$_GET['Invalid']==true){
      ?>
      <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
      <?php
    }
    ?>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    
    <label for="psw"><b>Password</b></label>
    <input type="password"  name="psw" placeholder="Password" required>
        
    <button type="submit" name="login">Login</button>
  </div>

  
</form>

 
  <br>
  
  </body>
</html>