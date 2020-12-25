<?php

session_start();

if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];

    if(empty($firstname) || empty($password) || empty($cpassword) || empty($email) || empty($phno)) {
        header("location: ../signuppage.php?error=emptyfields&fname=".$firstname."&lname=".$lastname."&email=".$email."&phno=".$phno);
        exit();
    }
    else if(!preg_match("/^[0-9]*$/",$phno)){
        header("location: ../signuppage.php?error=invalidphno&fname=".$firstname."&lname=".$lastname."&email=".$email);
        exit();
    }
    else if($password !== $cpassword){
        header("location: ../signuppage.php?error=passwordcheck&fname=".$firstname."&lname=".$lastname."&email=".$email."&phno=".$phno);
        exit();
    }
    else{
        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../signuppage.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("location: ../signuppage.php?error=emailused&fname=".$firstname."&lname=".$lastname."&phno=".$phno);
                exit();
            }
            else{
                $sql = "INSERT INTO users (fnameUsers, lnameUsers, emailUsers, passUsers, phnoUsers) VALUES (?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    header("location: ../signuppage.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$email,$hashedpwd,$phno);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $_SESSION['email']=$email;
                    header("location: ../index.php");
                }

            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("location: ../signuppage.php");
    exit();
}