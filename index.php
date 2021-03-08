<!DOCTYPE html>
<?php require_once('db/dbc.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
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
      <li><a href="index.html">Home</a></li>
      <li><a href="#">db Maintain</a>
        <ul>
          <li><a href="#">Insert</a></li>
          <li><a href="#">Delete</a></li>
          <li><a href="#">Select</a></li>
          <li><a href="#">Update</a></li>
        </ul>
      </li>
      <li><a href="templates/aboutus.html">About Us</a></li>
      <li><a href="templates/contactus.html">Contact Us</a></li>
      <li style="float:right"><a href="templates/signup.html">Sign up</a></li>
      <li><a href="templates/reviews.html">Reviews</a></li>
      <li style="float:right"><a href="templates/login.html">Login</a></li>
      <li><a href="#">Type of Services</a>
        <ul>
          <li><a href="templates/rideshare.php">Rideshare</a></li>
          <li><a href="templates/ride_and_delivery.php">Ride & Delivery</a></li>
        </ul>
      </li>
      <li style="float:right"><a href="#"><span onclick="search()">Search</span></a></li>
    </ul>

    <div id="search" style="float:right; display:none;">
      <form action="#" method="POST">
        <input type="text" placeholder="Search..." name="search">
        <button name="submit_result" type="submit">submit</button>
      </form>
    </div>

    <br><br>
    <h1>Plan for Smart Services</h1>
    <img src="img/logo.png" class="center">

    <p style="width:auto;float:right;text-align:right;">
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
  </p>
  </body>
</html>
