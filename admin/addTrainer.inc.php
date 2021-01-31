<?php
    require('../includes/db.inc.php');

    if(isset($_POST['submitAdd'])) {
        $name = $_POST['trName'];
        $desc = $_POST['trDesc'];
        $qty = $_POST['yox'];
        $fileName = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];
        $email = $_POST['username'];
        $password = $_POST['password'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/uploads/' . $_FILES['image']['name']);
        $imagePath = 'images/uploads/'.$_FILES['image']['name'];

        $sql = "INSERT INTO usertable(email,password,role) VALUES('$email','$password','trainer');";
        mysqli_query($conn, $sql);

        $sql = "SELECT max(id) AS trainerId FROM usertable";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $trainerId = $result['trainerId'];

        $sql = "INSERT INTO trainer(trainerName,trainerAbout,trainerImage,trainerEOX,user_id) VALUES('$name','$desc','$imagePath',$qty,$trainerId)";
        mysqli_query($conn, $sql);
        
        header('Location: adminTrainer.php');
        exit();
        
    }
?>