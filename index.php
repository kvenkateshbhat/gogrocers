<?php
    session_start();
    require_once("./includes/functions.inc.php");
    require_once("./includes/createdb.inc.php");

    $database = new CreateDb("Producttb");

    if (isset($_POST['add'])){
        /// print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){
    
            $item_array_id = array_column($_SESSION['cart'], "product_id");
    
            if(in_array($_POST['product_id'], $item_array_id)){
                echo "<script>alert('Product is already added in the cart..!')</script>";
                echo "<script>window.location = 'index.php'</script>";
            }else{
    
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );
    
                $_SESSION['cart'][$count] = $item_array;
            }
    
        }else{
    
            $item_array = array(
                    'product_id' => $_POST['product_id']
            );
    
            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
    }
    if(isset($_GET['order'])){
        echo '<script>alert("Order placed successfully")</script>';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGrocers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<header class="wrapper">
	<div class="navbar">
		<div class="inner_navbar">
			<div class="logo">
				<a href="index.php">Go<span>Grocers</span></a>
			</div>
			<div class="menu">
				<ul>
                    <li><a href="index.php">Home</a></li>
                    
                    <?php
                    
                        if(isset($_SESSION['email'])){
                            echo '<li><a href="logoutpage.php">Logout</a></li>';
                        }
                        else{
                            echo '<li><a href="signuppage.php">Profile</a></li>';
                        }
                    ?>
					<li><a href="#about">About</a></li>
                    <li><a href="mycart.php">Cart <i class="fa fa-shopping-cart"></i> 
                    <?php

                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo '<span id="cart_count" style="text-align: center;padding:1px 5px 2px 6px;
	                    border-radius: 3rem;background-color: #fff; color:#1f1f1f;">'.$count.'</span>';
                    }
                    else{
                        echo '<span id="cart_count" style="text-align: center;padding:1px 5px 2px 6px;
	                    border-radius: 3rem;background-color: #fff; color:#1f1f1f;">0</span>';
                    }

                    ?>
                    </a></li>
				</ul>
			</div>
		</div>
		<div class="hamburger">
			<i class="fas fa-bars"></i>
		</div>
	</div>
</header>
    <main class="main_container">
		<div class="content">
            
            <?php
                $result = $database->getData();
                while($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
                }
            ?>

		</div>
    </main>
    <hr>
    <footer id="about">
        <div id="footerdiv">
            <h2 id="designer">
                Designed by K Venkatesh Bhat
            </h2>
            <h5 id="copy"style="font-weight: 100;">
                &copy;All rights reserved
            </h5>

        </div>
    </footer>
<script src="js/index.js"></script>
</body>
</html>