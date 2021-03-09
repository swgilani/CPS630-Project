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
    <title>Select</title>
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
    <h2>Select</h2>
    <p style="width:auto;">Please choose a table to select data:</p>

      <form action="#" method="POST">
        <label>Tables:</label>
        <select id="insert_select" name="select">
          <option value="car_table">car table</option>
          <option value="coffee_table">coffee table</option>
          <option value="flower_table">flower table</option>
          <option value="order_table">order table</option>
          <option value="trip_table">trip table</option>
          <option value="user_table">user table</option>
        </select><br>
        <label>Conditions:</label>
        <input type="text" name="conditions"><br>
        <button name="submit_table" type="submit">submit</button>
      </form>

    <p style="width:auto;">
      <?php
        if (isset($_POST['submit_table'])){
          $table = $_POST["select"];
          $conditions = $_POST["conditions"];
        //insert data
        $sql = "SELECT * FROM " .$table. " WHERE " .$conditions;
        //get results
        $result = $dbc->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            if ($table == "car_table"){
              echo "Car ID: " . $row["carID"]. " - Car Model: " . $row["car_model"].
              " - Availability: " . $row["availability_code"]. " - Price: $" . $row["priceID"]."<br>";
            }
            else if ($table == "coffee_table"){
              echo "Coffee ID: " . $row["coffeeID"]. " - Store Code: " . $row["store_code"].
              " - Coffee Name: " . $row["coffee_name"]. " - Price: $" . $row["price"]."<br>";
            }
            else if ($table == "flower_table"){
              echo "Flower ID: " . $row["flowerID"]. " - Store Code: " . $row["store_code"].
              " - Flower Name: " . $row["flower_name"]. " - Price: $" . $row["price"]."<br>";
            }
            else if ($table == "order_table"){
              echo "Order ID: " . $row["order_ID"]. " - Date Issued: " . $row["date_issued"].
              " - Date Done: " . $row["date_done"]. " - Price: $" . $row["total_price"].
              "Payment Code: " . $row["payment_code"]. " - User ID: " . $row["userID"].
              " - Trip ID: " . $row["trip_ID"]. " - Flower ID: " . $row["flower_ID"]. "<br>";
            }
            else if ($table == "trip_table"){
              echo "Trip ID: " . $row["tripID"]. " - Source Code: " . $row["source_code"].
              " - Destination Code: " . $row["destinationCode"]. " - Distance: " . $row["distance"] .
              "Car ID: " . $row["carID"]. " - Price: $" . $row["price"]."<br>";
            }
            else if ($table == "user_table"){
              echo "User ID: " . $row["userID"]. " - Name: " . $row["first_name"]. " ". $row["last_name"].
              " - Phone Number: " . $row["phone_number"]. " - Email Address: $" . $row["email"].
              " - Postal Code: " . $row["postalCode"]. " - Password: ". $row["pw"]. " Balance: " . $row["balance"]."<br>";
            }
          }
        }
        else {
          echo "ERROR: Could not able to execute $sql. ";
        }
      }
      $dbc -> close();
      ?>
     </p>
  </body>
</html>
