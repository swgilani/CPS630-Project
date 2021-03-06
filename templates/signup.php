<!DOCTYPE html>
<?php
require_once('../db/dbc.php');
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
   <link rel="stylesheet" type="text/css" href="../css/signup.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      function aboutUs() {
        var aboutUs = document.getElementById("aboutUs");
        if (aboutUs.style.display=="none") {
          aboutUs.style.display="block";
        }
        else {
          aboutUs.style.display="none";
        }
      }
      function contactUs() {
        var contactUs = document.getElementById("contactUs");
        if (contactUs.style.display=="none") {
          contactUs.style.display="block";
        }
        else {
          contactUs.style.display="none";
        }
      }
      //


      //
      function validatepsw() {
        var password = document.forms["form"]["psw"].value;
        var passwordRepeat = document.forms["form"]["psw-repeat"].value;
        var email = document.forms["form"]["email"].value;
        var check = true;
        //var flag = new Boolean(1);
        if(password != passwordRepeat){
          check = false;
          alert("Passwords do not match:");
        }
        //
        var oReq = new XMLHttpRequest(); // New request object
        oReq.open("get", "../db/emailCheck.php", false);
        //                               ^ Don't block the rest of the execution.
        //                                 Don't wait until the request finishes to
        //                                 continue.
        oReq.onload = function() {
            //If email was found
            if(this.responseText.indexOf("/".concat(email)) != -1){
              alert(email + " is already taken ");
              check = false;
            }
        };
        oReq.send();
        //Check if form submit should be cancelled
        if(check == false){
          event.preventDefault();
          event.returnValue = false;
        }

      }
    </script>
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

      <form name="form" onsubmit="validatepsw();" action="../db/signup.php" method="POST" style="border:1px solid #ccc">
        <div class="container">
          <h1>Sign Up</h1>
          <p style="width:100%">Please fill in this form to create an account.</p>
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

          <label for="fname"><b>First Name</b></label>
          <input type="text" placeholder="Enter First Name" name="fname" required>

          <label for="lname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Last Name" name="lname" required>

          <label for="phone"><b>Phone Number</b></label>
          <input type="tel" id="phone" name="phone" placeholder="012-345-6789" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" required>

          <label for="postalCode"><b>Home Postal Code</b></label>
          <input type="text" id="postalCode" name="postalCode" placeholder="Enter Postal Code" maxlength="6" required> 
          
          <!-- <input type="submit" name="submit" value='Sign Up'> -->
          <div class="clearfix">
            
            <button type="submit" class="signupbtn" name="submit">Sign Up</button>
          </div>
        </div>
      </form>
 
  <br>
  
  </body>
</html>