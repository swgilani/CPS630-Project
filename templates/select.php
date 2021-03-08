<!DOCTYPE html>
<?php require_once('../db/dbc.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insert</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>

  <body>
    <p style="width:auto;">Please choose a table to select data:</p>

      <form action="#" method="POST">
        <select id="insert_select" name="select">
          <option value="car_table">car table</option>
          <option value="coffee_table">coffee table</option>
          <option value="flower_table">flower table</option>
          <option value="order_table">order table</option>
          <option value="trip_table">trip table</option>
          <option value="user_table">user table</option>
        </select><br>
        <label>conditions:</label>
        <input type="text" name="conditions"><br>
        <button name="submit_table" type="submit">submit</button>
      </form>

    <p style="width:auto;">
      <?php
        if (isset($_POST['submit_table'])){
          $table = $_POST["select"];
          $conditions = $_POST["conditions"];
        //insert data
        $sql = "SELECT * FROM " .$table. " WHERE " .$conditions;
        //get results
        $result = $dbc->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "Records selected successfully";
          }
        } else {
          echo "ERROR: Could not able to execute $sql. ";
        }
      }
      $dbc -> close();
      ?>
     </p>
  </body>
</html>