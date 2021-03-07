<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

    if (isset($_POST['submit'])){
   
    }


function alert($msg) {
    echo "<script type='text/javascript'>confirm('$msg');</script>";
}

?>