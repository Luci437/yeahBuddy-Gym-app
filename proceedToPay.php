<?php
    require('includes/db.inc.php');
    session_start();
    if(isset($_SESSION['user_id'])) {
        $uid = $_SESSION['user_id'];
        $totalPay = 0;
        $today = date("Y/m/d");
        if(isset($_POST['proceedToPay'])) {
            //taking products from card
            $sql = "SELECT ct.prd_id, prd.prdPrice FROM cart ct,product prd WHERE ct.user_id='$uid' AND prd.id = ct.prd_id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $totalPay += $row['prdPrice'];
            }
            //inserting values to order table
            $sql2 = "INSERT INTO productorder(user_id, totalPay, orderDate) VALUES('$uid','$totalPay','$today');";
            mysqli_query($conn, $sql2);
            //getting order id from order table
            $sql3 = "SELECT max(id) as orderId FROM productorder;";
            $orderResult = mysqli_fetch_assoc(mysqli_query($conn, $sql3));
            $orderId = $orderResult['orderId'];
            //inserting all products into orderedProduct
            $sql = "SELECT ct.prd_id,prd.prdQty FROM cart ct,product prd WHERE ct.user_id='$uid' AND prd.id = ct.prd_id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $prdId = $row['prd_id'];
                $sql4 = "INSERT INTO orderedproducts(order_id,prd_id,qty) VALUES('$orderId','$prdId',1);";
                mysqli_query($conn, $sql4);

                $newQty = $row['prdQty'] - 1;
                $getPrdSql = "UPDATE product SET prdQty='$newQty' WHERE id='$prdId';";
                mysqli_query($conn, $getPrdSql);
            }
            //inserting address details
            $houseName = $_POST['houseName'];
            $state = $_POST['state'];
            $district = $_POST['district'];
            $pincode = $_POST['pincode'];
            $sql5 = "INSERT INTO orderaddress(order_id,houseName,state,distric,pincode) VALUES('$orderId','$houseName','$state','$district','$pincode');";
            mysqli_query($conn, $sql5);
            //deleting cart items
            $sql6 = "DELETE FROM cart WHERE user_id='$uid';";
            mysqli_query($conn, $sql6);

            header('Location: ./index.php');
            exit();
        }
    }
?>