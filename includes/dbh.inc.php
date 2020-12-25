<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gocart";
$tablename = "users";

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if(mysqli_query($conn,$sql)){
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    $sql = "CREATE TABLE IF NOT EXISTS $tablename
            (idUsers INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
             fnameUsers TINYTEXT NOT NULL,
             lnameUsers TINYTEXT NOT NULL,
             emailUsers TINYTEXT NOT NULL,
             passUsers TINYTEXT NOT NULL,
             phnoUsers TINYTEXT NOT NULL
            )";
    
    if(!mysqli_query($conn,$sql)){
        echo "Error creating table:".mysqli_error($this->con);
    }
    
}
else{
    return false;
}








if(!$this->con){
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if(mysqli_query($conn,$sql)){
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    $sql = "CREATE TABLE IF NOT EXISTS $tablename
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
             product_name VARCHAR(25) NOT NULL,
             product_price FLOAT,
             product_image VARCHAR(100)
            )";
    
    if(!mysqli_query($conn,$sql)){
        echo "Error creating table:".mysqli_error($this->con);
    }
    
}
else{
    return false;
}