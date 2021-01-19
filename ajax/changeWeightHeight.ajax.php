<?php
    require('../includes/db.inc.php');
    session_start();
    $uid = $_SESSION['user_id'];

    if(isset($_POST['mode'])) {
        $mode = $_POST['mode'];
        if($mode == 'changeWeight') {
            $weight = $_POST['weight'];
            $sql = "UPDATE userwh SET user_weight=$weight WHERE user_id=$uid;";
            mysqli_query($conn, $sql);
            echo 'Weight Changed';
        }else {
            $height = $_POST['height'];
            $sql = "UPDATE userwh SET user_height=$height WHERE user_id=$uid;";
            mysqli_query($conn, $sql);
            echo 'Height Changed';
        }
    }
?>