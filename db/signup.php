<?php 
require 'dbc.php';

if(isset($_POST['submit'])){
  $email =$_POST['email'];
  $psw = $_POST['psw'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $postalCode = $_POST['postalCode'];

  $sql = "SELECT email FROM user_table WHERE email='$email'";
  $result = mysqli_query($dbc,$sql);

  //Check if the email isn't taken
  if(mysqli_num_rows($result) == 0){
    //Add SHA1 + Salt encryption 
    $salt = 'kdfhu24n21sdmxh3889';
    $psw = $_POST['psw'].$salt;
    $psw = sha1($psw);

    $sql = "INSERT INTO user_table 
    (first_name, last_name, phone_number, email, postalCode, pw, balance) 
    VALUES ('$fname','$lname', '$phone', '$email', '$postalCode', '$psw', '0.00');";

    $result = mysqli_query($dbc,$sql) or die("Error Inserting user to user_table");
    //Redirect To login 
    header("Location: ../templates/login.html");
   }

}
$dbc -> close();


?> 