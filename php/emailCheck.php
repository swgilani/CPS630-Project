<?php 
require 'dbc.php';
//Check if Email is taken
$sql = "SELECT email FROM user_table";
$result = mysqli_query($dbc,$sql);

$emailList = '';
while($row = mysqli_fetch_array($result)){
    $emailList = $emailList."/".$row["email"];
}

echo json_encode($emailList);
?>