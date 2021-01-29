<?php

    include('commonPartTop.php');

?>

<div class="trainerMainBox">
    <h1 class="trainerTitle"><i class="fas fa-shopping-cart"></i> CART</h1>
    <h4 class="trainerSubTitle">All your cart items are listed here.</h4>
    <div class="cartMainBox">
        <div class="cartListMainBox">
            <h4 class="cartTitle"><i class="fas fa-dumbbell pdspace"></i>PRODUCTS</h4>
            <div class="eachCartItems">
                <div class="cartItemBox">
                    <img src="./images/prd.jpg" alt="" class="cartImage">
                </div>
                <div class="cartDetailBox">
                    <h4 class="cartItemName">Product Name<span>Delivery by 12th Dec</span></h4>
                    <h3 class="cartItemPrice">₹<span>356</span></h3>
                    <div class="increDecreBox">
                        <button class="DecreButton increDecreButton">-</button>
                        <input type="text" name="" value="1" class="cartQtyBox">
                        <button class="IncreButton increDecreButton">+</button>
                    </div>
                </div>
            </div>
            <div class="eachCartItems">
                <div class="cartItemBox">
                    <img src="./images/ON-Gold-Standard-Whey-Protein-5Lb.jpg" alt="" class="cartImage">
                </div>
                <div class="cartDetailBox">
                    <h4 class="cartItemName">Product Name<span>Delivery by 12th Dec</span></h4>
                    <h3 class="cartItemPrice">₹<span>356</span></h3>
                    <div class="increDecreBox">
                        <button class="DecreButton increDecreButton">-</button>
                        <input type="text" name="" value="1" class="cartQtyBox">
                        <button class="IncreButton increDecreButton">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="allSummaryBox">
            <h4 class="cartTitle"><i class="fas fa-money-check-alt pdspace"></i>PRICE DETAILS</h4>
            <div class="eachPriceDetails">
                <h4 class="detailsTitle">TOTAL ITEMS <span>2</span></h4>
                <h4 class="detailsTitle">TOTAL PAY <span>₹345</span></h4>
                <button class="proceedButton">PROCEED TO PAY</button>
            </div>
        </div>
    </div>
</div>

<?php
    include('commonPartBottom.php');
?>