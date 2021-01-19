<?php
    require('db.inc.php');
    session_start();

    if(isset($_POST['submitLogin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usertable WHERE email='$email' AND password='$password';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        $rows = mysqli_fetch_assoc($result);

        if($row > 0) {
            $_SESSION['user_id'] = $rows['id'];
            header('Location: ../index.php');
            exit();
        }else {
            header('Location: ../index.php?invalidLoginCredentials');
            exit();
        }
    }
?>