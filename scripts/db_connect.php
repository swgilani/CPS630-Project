<?php
//Connect to Database
$user = 'root';
$pass = '';
$db = 'CPS630db';
$dbc = new mysqli('localhost', $user, $pass, $db) or die("Unable to Connect");
?>