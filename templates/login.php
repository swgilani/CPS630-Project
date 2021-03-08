<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Plan for Smart Services(PS2)</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
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
    </script>
  </head>

  <body>
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



    <h2>Login Form</h2>

<form action="../php/loginProcess.php" method="post">
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
    <input type="password"  name="psw" required>
        
    <button type="submit" name="login">Login</button>
  </div>

  
</form>

 
  <br>
  
  </body>
</html>