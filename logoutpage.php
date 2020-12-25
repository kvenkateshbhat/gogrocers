<?php
session_start();
require_once('includes/logout.inc.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGrocers</title>
    <link rel="stylesheet" href="css/loginpage.css">
    <style>
    .but{
    margin-top: 10px;
    margin-bottom:10px; 
    padding: 7px;
    font-size: 15px;
    border-radius: 10px;
    background: #090f1b;
    color: #fff;
    }
    </style>
</head>
<body>
<header class="heading">
        <div class="logo">
            <a href="index.php">Go<span>Grocers</span></a>
        </div>
    </header>

    <section>
        <form action="includes/logout.inc.php" method="post">
            <button type="submit" class="but" name="logout-submit">Logout</button>
        </form>
    </section>
</body>
</html>