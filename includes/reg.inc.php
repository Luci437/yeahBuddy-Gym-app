<?php
    require('db.inc.php');

    if(isset($_POST['submitReg'])) {
        $firstName = $_POST['first'];
        $lastName = $_POST['last'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM userTable WHERE email='$email';";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if($row > 0) {
            header('Location: ../index.php?emailTaken');
            exit();
        }

        $sql = "INSERT INTO usertable(firstName,lastName,phone,email,password) VALUES('$firstName','$lastName','$phone','$email','$password');";
        mysqli_query($conn,$sql);
        $lastSql = "SELECT MAX(id) as id FROM usertable";
        $lastIdRow = mysqli_fetch_assoc(mysqli_query($conn, $lastSql));
        $lastId = $lastIdRow['id'];

        $whSql = "INSERT INTO userwh(user_id,user_weight,user_height) VALUES($lastId,0,0);";
        mysqli_query($conn, $whSql);
        header('Location: ../index.php?accountCreated');
        exit();
    }
?>