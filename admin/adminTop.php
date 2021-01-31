<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YeahBuddy | Admin</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<div class="menuMainBox">
    <div class="menuBox">
        <h3 class="adminTitle"><i class="fas fa-hat-cowboy-side pdspace"></i> YeahBuddy</h3>
        <div class="menuList">
            <?php
                session_start();
                if(isset($_SESSION['trainer'])) {
                    echo '<a href="trainerIndex.php" class="menus activeAdvice"><i class="fas fa-clipboard pdspace"></i> Give Advice</a>';
                }else {
                    echo '
                    <a href="adminIndex.php" class="menus activeUser"><i class="fas fa-users pdspace"></i> Users</a>
                    <a href="adminProducts.php" class="menus activeProduct"><i class="fas fa-cart-arrow-down pdspace"></i> Products</a>
                    <a href="adminTrainer.php" class="menus activeTrainer"><i class="fas fa-street-view pdspace"></i> Trainers</a>
                    <a href="adminOrder.php" class="menus activeOrder"><i class="fas fa-clipboard pdspace"></i> Orders</a>
                    ';
                }
            ?>
        </div>
    </div>
</div>
<div class="mainContainer">

