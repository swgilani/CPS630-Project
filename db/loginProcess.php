<?php 
require 'dbc.php';

if(isset($_POST['login'])){
    //Check if input is empty
    if(empty($_POST['email']) || empty($_POST['psw'])){
        header("location:../templates/login.php?Empty= Please Fill in the Blanks");
    }
    else{
        $salt = 'kdfhu24n21sdmxh3889';
        $psw = $_POST['psw'].$salt;
        $psw = sha1($psw); 
        $email = $_POST['email'];
        $sql="SELECT * FROM user_table WHERE email='$email' AND pw='$psw'";
        $result = mysqli_query($dbc, $sql);
        if($row = mysqli_fetch_assoc($result)){
            $_SESSION['user']= $row["userID"];
            header("location: ../index.html");
        }
        else{
            header("location: ../templates/login.php?Invalid= Enter Correct Email and Password");
        }
    }
}
?>
