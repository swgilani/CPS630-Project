<?php
//Connect to Database
$user = 'root';
$pass = '';
$db = 'CPS630db';
// Create connection
$dbc = new mysqli('localhost', $user, $pass, $db) or die("Unable to Connect");


// Check connection
if ($dbc->connect_error) {
  die("Connection failed: " . $dbc->connect_error);
}

$search = $_GET["search"];
$sql = "SELECT * FROM order_table WHERE order_ID = $search;";
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Order ID: " . $row["order_ID"]. " - Date Issued: " . $row["date_issued"]. " - Date done: " . $row["date_done"]."<br>";
  }
} else {
  echo "0 results";
}
$dbc->close();
?>
