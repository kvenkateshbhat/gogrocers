<?php

session_start();

if(isset($_POST['login-submit'])){
    
    require 'dbh.inc.php';

    $email = $_POST['email'];
    $password = $_POST['pass'];

    if(empty($email) || empty($password)){
        header("location: ../loginpage.php?error=emptyfields&email=".$email);
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../loginpage.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($password,$row['passUsers']);
                if($passcheck == false){
                    header("location: ../loginpage.php?error=wrongpassword");
                    exit();
                }
                else if($passcheck == true){
                    $_SESSION['email'] = $row['emailUsers'];
                    header("location: ../index.php?email=".$_SESSION['email']);
                    exit();
                }
                else{
                    header("location: ../loginpage.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                header("location: ../loginpage.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("location: ../loginpage.php");
    exit();
}