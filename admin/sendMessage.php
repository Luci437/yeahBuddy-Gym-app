<?php
    require('../includes/db.inc.php');
    session_start();

    if(isset($_SESSION['trainer'])) {
        $trainerId = $_SESSION['trainer'];
        if(isset($_POST['sendButton'])) {
            $userId = $_POST['userId'];
            $message = $_POST['message'];
            $sendTime = date("d-m-Y");

            $sql = "INSERT INTO advice(trainer_id,user_id,message,send_time) VALUES('$trainerId','$userId','$message','$sendTime');";
            mysqli_query($conn, $sql);

            header('Location: trainerIndex.php');
            exit();
        }
    }
?>