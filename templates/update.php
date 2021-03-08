<!DOCTYPE html>
<?php require_once('../db/dbc.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>

  <body>
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
