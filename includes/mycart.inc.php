<?php

session_start();

if(!isset($_SESSION['email'])){
    header("location: ../signuppage.php");
}
if(count($_SESSION['cart'])==0){
    header("location: ../mycart.php");
}
else{
    foreach ($_SESSION['cart'] as $key => $value){
        unset($_SESSION['cart'][$key]);
    }
    header("location: ../index.php?order=successful");
}
