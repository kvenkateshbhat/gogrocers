<?php
    session_start();
    require_once("includes/createdb.inc.php");
    require_once("includes/functions.inc.php");

    $db = new CreateDB("Producttb");

    if (isset($_POST['remove'])){
        if ($_GET['action'] == 'remove'){
            foreach ($_SESSION['cart'] as $key => $value){
                if($value["product_id"] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>window.location = 'mycart.php'</script>";
                }
            }
        }
      }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoGrocers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mycart.css">
</head>
<body>
    <header class="heading">
        <div class="logo">
            <a href="index.php">Go<span>Grocers</span></a>
        </div>
    </header>
    <main class="main_container">
		<div class="content">
            <div>
                <h2 id="cart_head">My Cart</h5>
            </div>
            
            <?php
                $total = 0;
                if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],'product_id');

                $result = $db->getData();
                while($row = mysqli_fetch_assoc($result)){
                    foreach($product_id as $id){
                        if($row['id']==$id){
                            cartelement($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
                            $total = $total + (int)$row['product_price'];
                        }
                    }
                }
                }
                if($total == 0){
                    echo "<script>alert('Cart is empty')</script>";
                }
            ?>

        </div>
        
        <div class="checkout">
                <h3 class="spacing">Price details</h3>
                <hr>
                <div class="left">
                <?php
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<h4 class='spacing'>Price ($count items)</h4>";
                    }
                    else{
                        echo"<h4 class='spacing'>Price (0 items)</h4>";
                    }
                ?>
                <h4 class='spacing'>Delivery Charges</h4>
                <hr>
                <h4 class='spacing'>Amount Payable</h4>
                </div>
                <div class="right">
                    
                    <?php
                        echo "<h4 class='spacing'>Rs.".$total."</h4>";
                        echo "<h4 class='spacing'>Free</h4>";
                    ?>
                    <hr>
                    <?php
                    echo "<h4 class='spacing'>$total</h4>";
                    ?>
                <form action="includes/mycart.inc.php" method="post">
                    <button type="submit" name="order" class="addtocart">Place Order</button>
                </form>
                </div>
        </div>
	</main>


</body>
</html>