<?php
    include('adminTop.php');
?>
<style>
    .activeOrder {
        background: linear-gradient(to right,rgba(173, 50, 198,0.2) 10%,transparent);
        border-left: 4px solid rgb(173, 50, 198);
        color: rgb(173, 50, 198);
    }
    .activeOrder:hover {
        color: rgb(173, 50, 198);
        background: linear-gradient(to right,rgba(173, 50, 198,0.2) 10%,transparent);
    }
</style>
<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Order Channel</p>
        </div>
    </div>
    <!-- content box -->
    <div class="mainContentBox">

        <?php
        require('../includes/db.inc.php');

        $sql = 'SELECT * FROM product prd, productorder po, orderedproducts op, orderaddress oa, usertable u WHERE op.prdStatus="waiting" AND op.order_id = po.id AND oa.order_id=po.id AND u.id=po.user_id AND prd.id = op.prd_id;';
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="eachProductBox">
                <h4 class="prdName">'.$row["prdName"].'</h4>
                <h3 class="prdPrice">₹<span>'.$row["prdPrice"].' <h6 style="color: rgba(0,0,0,0.3);position: absolute;"> x '. $row['qty'] .'</h6></span></h3>
                <div class="productImageBox">
                    <img class="prdImage" src="../'.$row["prdImage"].'" alt="">
                </div>
                <div>
                <h6 style="color: grey;"><i>'.$row['orderDate'].'</i></h6>
                    <h5 style="color: grey;">ORDER #'.$row['order_id'].'</h5>
                    <h3>'.$row['firstName'].' '.$row['lastName'].'</h3>
                    <p>'.$row['houseName'].'</p>
                    <p>'.$row['state'].'</p>
                    <p>'.$row['distric'].'</p>
                    <p>'.$row['pincode'].'</p>
                    <p>'.$row['phone'].'</p>
                    <button class="addToCartButton" data-orderId='.$row['order_id'].' data-prdId="'.$row['prd_id'].'" onclick="confirmOrder(this);">CONFIRM ORDER</button>
                </div>
            </div>      
            ';
        }
    ?>
    </div>
</div>
<?php
    include('adminBottom.php');
?>
    
