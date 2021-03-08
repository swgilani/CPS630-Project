<!DOCTYPE html>
<?php require_once('../db/dbc.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insert</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
  </head>

  <body>
    <p style="width:auto;">Please choose a table to insert data:</p>

      <form action="#" method="POST">
        <select id="insert_select" name="select">
          <option value="car_table">car table</option>
          <option value="coffee_table">coffee table</option>
          <option value="flower_table">flower table</option>
          <option value="order_table">order table</option>
          <option value="trip_table">trip table</option>
          <option value="user_table">user table</option>
        </select><br>
        <label>info0:</label>
        <input type="text" name="info0"><br>
        <label>info1:</label>
        <input type="text" name="info1"><br>
        <label>info2:</label>
        <input type="text" name="info2"><br>
        <label>info3:</label>
        <input type="text" name="info3"><br>
        <button name="submit_table" type="submit">submit</button>
      </form>

    <p style="width:auto;">
      <?php
        if (isset($_POST['submit_table'])){
          $table = $_POST["select"];
          $info0 = $_POST["info0"];
          $info1 = $_POST["info1"];
          $info2 = $_POST["info2"];
          $info3 = $_POST["info3"];
        //insert data
        $sql = "INSERT INTO " .$table. " VALUES (" .$info0. ", " .$info1. ", " .$info2. ", " .$info3. ")";
        //success or fail
        if($dbc->query($sql) === TRUE){
          echo "Records added successfully.";
        } else{
          echo "ERROR: Could not able to execute $sql. ";
        }
      }
      $dbc -> close();
      ?>
     </p>
  </body>
</html>