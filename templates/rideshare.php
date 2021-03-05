<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <script src="../scripts/location.js"></script>
  </head>

  <body>
  <?php include '../scripts/store_rideshare_information.php';?>
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
