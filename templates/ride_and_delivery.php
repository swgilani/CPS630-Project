<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <script src="../scripts/location.js"></script>
  </head>

  <body>
  <?php include '../scripts/store_delivery_information.php';?>
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
    <h1>Ride & Deliveries</h1>
    <br><br>



    <!-- Shows the google maps -->
    <div id="map"></div>

   
    <!-- Form with data that will be posted to PHP, and then to our database-->
    
    <form action="" method="POST">
      <!-- Store selection -->
      <label for="store_selection">Select a store</label><br>
        <select  name="shop" id="start" onchange="show_items();" required>
          <option hidden disabled selected value> -- select an option -- </option>
          <option id="forest_of_flowers" value="Forest of Flowers Mississauga">Forest of Flowers (Florist)</option>
          <option id="flower_creations_mississauga" value="Flower Creations Mississauga">Flower Creations (Florist)</option>
          <option id="oakville_florist_shop" value="Oakville Florist Shop">Oakville Florist Shop (Florist)</option>
          <option id="tim_hortons" value="Tim Hortons Mississauga">Tim Hortons (Coffee)</option>
          <option id="starbucks" value="Starbucks Mississauga">Starbucks (Coffee)</option>
          <option id="second_cup" value="Second Cup Mississauga">Second Cup (Coffee)</option>
        </select>

        <br>
        <!-- Destination selection -->
      <label for="destination">Where to?</label><br>
      <input type="text" id="end" name="destination" required><br>
        <!-- Time selection -->
      <label for="trip-start">Date</label>
      <input type="date" id="date" name="trip-start" required ><br/>

      <label for="appt">Pickup time</label>
      <input type="time" id="time" value="" name="appt" required>      
      <br/>
      <input type="submit" value="Submit" name="submit">
    </form>


    




  <script async defer src="https://maps.googleapis.com/maps/api/js?
key=AIzaSyDnTsfcAT5zS8NQ5d2QcxIpcU3w6835QbI&callback=initMap">
</script>
  </body>
</html>