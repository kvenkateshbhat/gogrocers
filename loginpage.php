<?php
    session_start();
?>

<!doctype html>
<html>
<head>
	<title>GoGrocers</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" >
    <link rel="stylesheet" href="css/loginpage.css">

</head>
<body>
	<header class="heading">
        <div class="logo">
            <a href="index.php">Go<span>Grocers</span></a>
        </div>
    </header>

    <main class="main_container">
        <h2>Login to existing account</h2>
        <section>
            <form action="includes/login.inc.php" method="post">
            
                <?php
                    if(isset($_GET['email'])){
                        echo '<input class="c2" type="email" name="email" value='.$_GET['email'].' required><br>';
                    }
                    else{
                        echo '<input class="c2" type="email" placeholder="E-mail" name="email" required><br>';
                    }
                ?>


                <input class="c2" type="password" placeholder="Password" name="pass" required><br>
                <button type="submit" name="login-submit" class="but">Login</button>
            </form>
        </section>
        <section class="login">
            <div>Don't have an account? <a href="signuppage.php">Sign up</a></div>
        </section>
    </main>
</body>
</html>

