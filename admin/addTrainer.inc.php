<?php
    require('../includes/db.inc.php');

    if(isset($_POST['submitAdd'])) {
        $name = $_POST['trName'];
        $desc = $_POST['trDesc'];
        $qty = $_POST['yox'];
        $fileName = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/uploads/' . $_FILES['image']['name']);
        $imagePath = 'images/uploads/'.$_FILES['image']['name'];

        $sql = "INSERT INTO trainer(trainerName,trainerAbout,trainerImage,trainerEOX) VALUES('$name','$desc','$imagePath',$qty)";
        mysqli_query($conn, $sql);

        header('Location: adminTrainer.php');
        exit();
        
    }
?>