<?php
    include('adminTop.php');
?>
<style>
    .activeTrainer {
        background: linear-gradient(to right,rgba(173, 50, 198,0.2) 10%,transparent);
        border-left: 4px solid rgb(173, 50, 198);
        color: rgb(173, 50, 198);
    }
    .activeTrainer:hover {
        color: rgb(173, 50, 198);
        background: linear-gradient(to right,rgba(173, 50, 198,0.2) 10%,transparent);
    }
</style>
<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Trainers Channel</p>
        </div>
        <a href="adminAddTrainer.php" class="addButton"><i class="fas fa-plus pdspace"></i> ADD TRAINER</a>
    </div>
    <!-- content box -->
    <div class="mainContentBox">

        <?php
        require('../includes/db.inc.php');

        $sql = 'SELECT prd.prdName,prd.prdPrice,prd.prdImage,op.qty FROM product prd, productorder po, orderedproducts op WHERE po.status="ordered" AND op.order_id = po.id;';
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="eachProductBox">
                <h4 class="prdName">'.$row["prdName"].'</h4>
                <h3 class="prdPrice">₹<span>'.$row["prdPrice"].' <h6 style="color: rgba(0,0,0,0.3);position: absolute;"> x '. $row['qty'] .'</h6></span></h3>
                <div class="productImageBox">
                    <img class="prdImage" src="../'.$row["prdImage"].'" alt="">
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
    
