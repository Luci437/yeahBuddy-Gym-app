<?php
    if(isset($_GET['user_id'])) {
        require "../includes/db.inc.php";
        $uid = $_GET['user_id'];

        $sql = "INSERT INTO feesalert(user_id,active) VALUES('$uid',1)";
        mysqli_query($conn, $sql);

        header("Location: adminFees.php");
        exit();
    }
?>