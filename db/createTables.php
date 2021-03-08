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
    store_name VARCHAR(50)
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
        priceID DECIMAL(38,2),
        PRIMARY KEY(carID)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Car Table $sql");
    //Insert data into Car table
    $sql = "INSERT INTO car_table (car_model,availability_code,priceID) 
    VALUES ('Tesla Model S','1',59.99), ('Tesla Model 3','1',67.89), ('Tesla Model X','1',89.99),
    ('Mercedes C300','1', 49.99), ('Mercedes C63','1', 54.99), ('Mercedes G550','1', 79.99),
    ('Honda Civic','1', 29.99), ('Honda Accord','1', 21.99), ('Toyota Prius','1', 19.99);
    ";

    $result = mysqli_query($dbc,$sql) or die("Error inserting data to Car Table");
}

//If flower_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `flower_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE flower_table(
        flowerID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        store_code VARCHAR(11),
        store_name VARCHAR(40),
        flower_name VARCHAR(30),
        price DECIMAL(38,2)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Flower Table $sql");
    //Insert data into Flower Table
    $sql = "INSERT INTO flower_table (store_code,store_name,flower_name,price) 
    VALUES ('1','Forest of Flowers Mississauga','Roses',10.99), ('1','Forest of Flowers Mississauga','Violets',9.89), ('1','Forest of Flowers Mississauga','Daisies',6.59),
    ('2','Flower Creations Mississauga','Roses',8.99), ('2','Flower Creations Mississauga','Violets',7.89), ('2','Flower Creations Mississauga','Daisies',11.59),
    ('3','Oakville Florist Shop','Roses',7.99), ('3','Oakville Florist Shop','Violets',8.99), ('3','Oakville Florist Shop','Daisies',10.99);
    ";

    $result = mysqli_query($dbc,$sql) or die("Error inserting data to Flower Table");
}

//If coffee_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `coffee_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE coffee_table(
        coffeeID INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
        store_code VARCHAR(11),
        store_name VARCHAR(40),
        coffee_name VARCHAR(30),
        price DECIMAL(38,2)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Coffee Table $sql");
    //Insert data into Coffee Table
    $sql = "INSERT INTO coffee_table (store_code,store_name,coffee_name,price) 
    VALUES ('1','Tim Hortons Mississauga','Frappuccino',5.99), ('1','Tim Hortons Mississauga','Latte',3.89), ('1','Tim Hortons Mississauga','Coffee',2.59),
    ('2','Starbucks Mississauga','Frappuccino',6.99), ('2','Starbucks Mississauga','Latte',4.69), ('2','Starbucks Mississauga','Coffee',2.99),
    ('3','Second Cup Mississauga','Frappuccino',5.49), ('3','Second Cup Mississauga','Latte',3.59), ('3','Second Cup Mississauga','Coffee',1.99);
    ";

    $result = mysqli_query($dbc,$sql) or die("Error inserting data to Coffee Table");
}

echo"Successful Connection";
$dbc -> close();
?>
