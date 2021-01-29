<?php

    require('../includes/db.inc.php');
    session_start();
    if(isset($_SESSION['user_id'])) {
        if(isset($_POST['id'])) {
            $prdId = $_POST['id'];
            $uId = $_SESSION['user_id'];
            //checking if the item is already added to the cart
            $prdCheckSql = "SELECT * FROM cart WHERE user_id='$uId' AND prd_id='$prdId';";
            $checkResult = mysqli_num_rows(mysqli_query($conn, $prdCheckSql));
            if($checkResult > 0) {
                echo 'Item Already in cart';
            }else {
                $sql = "INSERT INTO cart(user_id,prd_id) VALUES($uId,$prdId);";
                if(mysqli_query($conn, $sql)) {
                    echo 'Item Added to cart';
                }else {
                    echo 'Something went wrong';
                }
            }
            
        }
    }

?>