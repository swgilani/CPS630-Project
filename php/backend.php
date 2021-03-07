<?php
require 'dbc.php';

//If order_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `order_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE order_table(
    order_ID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
    date_issued DATE,
    date_done DATE,
    total_price DECIMAL(38,2),
    payment_code INT,
    userID INT, 
    trip_ID INT,
    flower_ID INT
    )";
$result = mysqli_query($dbc,$sql) or die("Unable to create Order Table $sql");
}

//If user_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `user_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE user_table(
        userID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        first_name VARCHAR(18),
        last_name VARCHAR(18),
        phone_number VARCHAR(12),
        email VARCHAR(50),
        postalCode VARCHAR(6),
        pw VARCHAR(120),
        balance DECIMAL(38,2)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create User Table $sql");
}

//If session_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `session_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE session_table(
        userID INT(11) NOT NULL UNIQUE,
        email VARCHAR(50),
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Session Table $sql");
}

//If trip_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `trip_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE trip_table(
        tripID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        source_code VARCHAR(50),
        destinationCode VARCHAR(50),
        distance DECIMAL(38,2),
        carID INT(11),
        price DECIMAL(38,2)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Trip Table $sql");
}

//If car_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `car_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE car_table(
        carID INT(11) NOT NULL AUTO_INCREMENT,
        car_model VARCHAR(40),
        /*car_code VARCHAR(11), not sure if we need a car code because we have cardID*/
        availability_code INT,
        PRIMARY KEY(carID)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Car Table $sql");
    //Insert data into Car table
    $sql = "INSERT INTO car_table (car_model,availability_code) 
    VALUES ('Tesla Model S','1'), ('Tesla Model 3','1'), ('Tesla Model X','1'),
    ('Mercedes C300','1'), ('Mercedes C63','1'), ('Mercedes G550','1'),
    ('Honda Civic','1'), ('Honda Accord','1'), ('Toyota Prius','1');
    ";

    $result = mysqli_query($dbc,$sql) or die("Error inserting data to Car Table");
}

//If flower_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `flower_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE flower_table(
        flowerID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        store_code VARCHAR(11),
        flower_name VARCHAR(30),
        price DECIMAL(38,2)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Flower Table $sql");
    //Insert data into Flower Table
    $sql = "INSERT INTO flower_table (store_code,flower_name,price) 
    VALUES ('1','Roses',10.99), ('1','Violets',9.89), ('1','Daisies',6.59),
    ('2','Roses',8.99), ('2','Violets',7.89), ('2','Daisies',11.59),
    ('3','Roses',7.99), ('3','Violets',8.99), ('2','Daisies',10.99);
    ";

    $result = mysqli_query($dbc,$sql) or die("Error inserting data to Flower Table");
}

//If coffee_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `coffee_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE coffee_table(
        coffeeID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        store_code VARCHAR(11),
        coffee_name VARCHAR(30),
        price DECIMAL(38,2)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Coffee Table $sql");
    //Insert data into Coffee Table
    $sql = "INSERT INTO coffee_table (store_code,coffee_name,price) 
    VALUES ('1','Frappuccino',5.99), ('1','Latte',3.89), ('1','Coffee',2.59),
    ('2','Frappuccino',6.99), ('2','Latte',4.69), ('2','Coffee',2.99),
    ('3','Frappuccino',5.49), ('3','Latte',3.59), ('3','Coffee',1.99);
    ";

    $result = mysqli_query($dbc,$sql) or die("Error inserting data to Coffee Table");
}

echo"Successful Connection";
$dbc -> close();
?>
