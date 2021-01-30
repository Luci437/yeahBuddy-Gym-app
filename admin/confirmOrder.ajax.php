<?php
    require('../includes/db.inc.php');

    if(isset($_POST['orderId'])) {
        $orderId = $_POST['orderId'];
        $prdId = $_POST['prdId'];

        $sql = "UPDATE orderedproducts SET prdStatus='confirm' WHERE Order_id='$orderId' AND prd_id='$prdId';";
        mysqli_query($conn, $sql);

        echo 'Order confirmed';
    }
?>