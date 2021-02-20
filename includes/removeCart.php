<?php
    require "db.inc.php";
    session_start();

    if(isset($_SESSION['user_id'])) {
        if(isset($_GET['prd'])) {
            $uid = $_SESSION['user_id'];
            $prdId = $_GET['prd'];

            $sql = "DELETE FROM cart WHERE user_id='$uid' AND prd_id='$prdId';";
            mysqli_query($conn, $sql);

            header("Location: ../cart.php");
            echo "here";
            exit();
        }
    }

?>