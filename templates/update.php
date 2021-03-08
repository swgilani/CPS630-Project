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
    <title>Update</title>
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
    
    <h2>Update</h2>
    <p style="width:auto;">Please enter information to upadte tables:</p>

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
        <label>Set:</label>
        <input type="text" name="condition1"><br>
        <label>Conditions:</label>
        <input type="text" name="condition2"><br>
        <button name="submit_table" type="submit">submit</button>
      </form>

      <p style="width:auto;">
        <?php
          if (isset($_POST['submit_table'])){
            $table = $_POST["select"];
            $condition1 = $_POST["condition1"];
            $condition2 = $_POST["condition2"];
          //insert data
          $sql = "UPDATE " .$table. " SET " .$condition1. " WHERE " .$condition2;
          //success or fail
          if($dbc->query($sql) == TRUE){
            echo "Records updated successfully.";
          } else{
            echo "ERROR: Could not able to execute $sql. ";
          }
        }
        $dbc -> close();
        ?>
       </p>
  </body>
</html>
