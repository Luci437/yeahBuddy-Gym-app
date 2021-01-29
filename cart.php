<?php

    include('commonPartTop.php');

?>

<div class="trainerMainBox">
    <h1 class="trainerTitle"><i class="fas fa-shopping-cart"></i> CART</h1>
    <h4 class="trainerSubTitle">All your cart items are listed here.</h4>
    <div class="cartMainBox">
        <div class="cartListMainBox">
            <h4 class="cartTitle"><i class="fas fa-dumbbell pdspace"></i>PRODUCTS</h4>
            <?php
            
            require('includes/db.inc.php');
            $uid = $_SESSION['user_id'];
            $sql = "SELECT prd.prdName, prd.prdImage,prd.prdPrice,prd.prdQty FROM cart ct, product prd WHERE ct.user_id='$uid' AND ct.prd_id=prd.id;";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="eachCartItems">
                <div class="cartItemBox">
                    <img src="'.$row['prdImage'].'" alt="" class="cartImage">
                </div>
                <div class="cartDetailBox">
                    <h4 class="cartItemName">'.$row['prdName'].'<span class="deliveryDate">Delivery by 12th Dec</span></h4>
                    <h3 class="cartItemPrice">₹<span>'.$row['prdPrice'].'</span></h3>
                    <!--<div class="increDecreBox">
                        <button class="DecreButton increDecreButton">-</button>
                        <input type="text" name="" value="1" class="cartQtyBox">
                        <button class="IncreButton increDecreButton">+</button>
                    </div>-->
                </div>
            </div>
            ';
            }
            ?>

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

<script>
    showDeliveryDate();
    function showDeliveryDate() {
        let todayDate = new Date();
        console.log(todayDate.getDate() + 7);
    }
</script>

<?php
    include('commonPartBottom.php');
?>