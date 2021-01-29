<?php
    require('../includes/db.inc.php');

    if(isset($_POST['submitAdd'])) {
        $name = $_POST['prdName'];
        $desc = $_POST['prdDesc'];
        $price = $_POST['prdPrice'];
        $qty = $_POST['prdQty'];
        $fileName = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/uploads/' . $_FILES['image']['name']);
        $imagePath = 'images/uploads/'.$_FILES['image']['name'];

        $sql = "INSERT INTO product(prdName,prdDesc,prdImage,prdPrice,prdQty) VALUES('$name','$desc','$imagePath','$price','$qty')";
        mysqli_query($conn, $sql);

        header('Location: adminProducts.php');
        exit();
        
    }
?>