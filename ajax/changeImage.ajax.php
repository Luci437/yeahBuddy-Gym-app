<?php
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../images/uploads/' . $_FILES['file']['name']);
        $imagePath = 'images/uploads/'.$_FILES['file']['name'];
        
        require "../includes/db.inc.php";
        session_start();
        $uid = $_SESSION['user_id'];

        $sql = "UPDATE usertable SET profile_pic='$imagePath' WHERE id='$uid';";
        mysqli_query($conn, $sql);

        $sql = "SELECT * FROM usertable WHERE id='$uid';";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            echo $row['profile_pic'];
        }

    }
?>