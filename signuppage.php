<?php
    session_start();

?>

<!doctype html>
<html>
<head>
	<title>GoGrocers</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" >
    <link rel="stylesheet" href="css/signuppage.css">
</head>
<body>
	<header class="heading">
        <div class="logo">
            <a href="index.php">Go<span>Grocers</span></a>
        </div>
    </header>

    <main class="main_container">
        <h2>Create a new account</h2>
        <section>
            <form action="includes/signup.inc.php" method="post"> 
                
                <?php
                    if(isset($_GET['fname'])){
                        echo '<input class="c2" type="text" value='.$_GET['fname'].' name="fname" required> <br>';
                    }
                    else{
                        echo '<input class="c2" type="text" placeholder="First name" name="fname" autofocus required> <br>';
                    }
                ?>

                <?php
                    if(isset($_GET['lname'])){
                        echo '<input class="c2" type="text" value='.$_GET['lname'].' name="lname" required> <br>';
                    }
                    else{
                        echo '<input class="c2" type="text" placeholder="Last name" name="lname" required> <br>';
                    }
                ?>
                <input class="c2" type="password" placeholder="Password" name="pass" required><br>
                <input class="c2" type="password" placeholder="Confirm Password" name="cpass" required><br>

                <?php
                    if(isset($_GET['email'])){
                        echo '<input class="c2" type="email" name="email" value='.$_GET['email'].' required><br>';
                    }
                    else{
                        echo '<input class="c2" type="email" placeholder="E-mail" name="email" required><br>';
                    }
                ?>

                <?php
                    if(isset($_GET['phno'])){
                        echo '<input class="c2" type="tel" value='.$_GET['phno'].' name="phno" required><br>';
                    }
                    else{
                        echo '<input class="c2" type="tel" placeholder="Phone number" name="phno" required><br>';
                    }
                ?>

                <button type="submit" name="signup-submit" class="but">Signup</button>
            </form>
        </section>
        <section class="login">
            <div>Already have an account?<a href="loginpage.php">Log in</a></div>
        </section>
    </main>
</body>
</html>

