<?php


function component($name,$price,$image,$productid){
    $element= '<form method="post" action="index.php" class="item_wrap">
    <div class="item">
        <img src='.$image.' alt='.$name.'>
        <div class="description">
            <h2 class="name">'.$name.'<span>(500g)</span></h2>
            <h3 class="price">Rs.'.$price.'</h3>
            <button class="addtocart" type="submit" name="add">Add to cart <i class="fa fa-shopping-cart"></i> </button>
            <input type="hidden" name="product_id" value='.$productid.'>
        </div>
    </div>
</form>';

echo $element;
}


function cartelement($name,$price,$image,$productid){
    $item= '<div class="item_wrap">
    <form method="POST" action="mycart.php?&id='.$productid.'&action=remove">
    <div class="item">
        <div class="image">
        <img src='.$image.' alt='.$name.'>
        </div>
        <div class="description">
            <h2 class="name">'.$name.'<span>(500g)</span></h2>
            <h3 class="price">Rs.'.$price.'</h3>
            <button class="addtocart" type="submit" name="remove"> Remove <i class="fa fa-trash-o"></i> </button>
            <!--<div class="minusplus">
            <span class="spa">-</span> 
            <span class="spa">1</span>
            <span class="spa">+</span>         
            </div> -->
        </div>
    </div>
</form>
</div>';

echo $item;
}