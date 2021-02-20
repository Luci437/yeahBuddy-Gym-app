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
            $sql = "SELECT prd.prdName,prd.id, prd.prdImage,prd.prdPrice,prd.prdQty FROM cart ct, product prd WHERE ct.user_id='$uid' AND ct.prd_id=prd.id;";
            $result = mysqli_query($conn, $sql);
            $totalProducts = mysqli_num_rows($result);
            $date = date('M d, Y');
            $date = strtotime($date);
            $date = strtotime("+7 day", $date);
            $ddate = date('M d, Y', $date);
            $totalPay = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $totalPay += $row['prdPrice'];
            echo '
            <div class="eachCartItems">
                <div class="cartItemBox">
                    <img src="'.$row['prdImage'].'" alt="" class="cartImage">
                </div>
                <div class="cartDetailBox">
                    <h4 class="cartItemName">'.$row['prdName'].'<span class="deliveryDate">Expect Delivery by '.$ddate.'</span></h4>
                    <h3 class="cartItemPrice">₹<span>'.$row['prdPrice'].'</span></h3>
                </div>
                <a href="includes/removeCart.php?prd='.$row['id'].'" class="removeCartButton">Remove</a>
            </div>
            ';
            }
            ?>

        </div>
        <div class="allSummaryBox">
            <h4 class="cartTitle"><i class="fas fa-money-check-alt pdspace"></i>PRICE DETAILS</h4>
            <div class="eachPriceDetails">
                <h4 class="detailsTitle">TOTAL ITEMS <span><?php echo $totalProducts ?></span></h4>
                <h4 class="detailsTitle">TOTAL PAY <span>₹<?php echo $totalPay ?></span></h4>
                <p style="padding: 8px 0;color: grey;">Address</p>
                <form method="post" action="proceedToPay.php"  style="width: 100%;display: flex;row-gap: 8px;flex-direction: column;">
                <input type="text" required name="houseName" class="addressInput" placeholder="House Name">
                <input type="text" required name="state" class="addressInput" placeholder="State">
                <input type="text" required name="district" class="addressInput" placeholder="District">
                <input type="text" required name="pincode" class="addressInput" placeholder="Pincode">
                <button type="submit" name="proceedToPay" class="proceedButton">PROCEED TO PAY</button>
                </form>
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