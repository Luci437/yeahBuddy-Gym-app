<?php
    require "db.inc.php";
    session_start();
    echo 'came here';
    if(isset($_SESSION['user_id'])) {
        echo 'inside session';
        $uid = $_SESSION['user_id'];
        $currentMonth = date("M");
        $currentYear = date("Y");
        $today = date("Y-m-d");

        $sql = "INSERT INTO fees(feeAmount,feeMonth,feeYear,user_id,feePaidOn) VALUES('500','$currentMonth','$currentYear',$uid,'$today');";
        mysqli_query($conn, $sql);
        header("Location: ../index.php");
        exit();
    }
    echo 'fire exit';
?>