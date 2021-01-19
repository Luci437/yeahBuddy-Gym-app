<?php
    include('./includes/db.inc.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="fav.jpg">
    <title>YeahBuddy | Welcome</title>
    <!-- main css file -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- main box -->
    <div class="mainBox">
        <!-- the small box at left side -->
        <?php
            if(isset($_SESSION['user_id'])) {
                echo '<div class="mainLeftSideMenuBox">
                <!-- inside that small box there is another  -->
                <div class="mainMenuBox">
                    <div class="userImageAndNameBox">
                    <div class="logoBox" id="userImageLabel">
                        <input type="file" id="user-image-upload">
                        <label title="Change DP" for="user-image-upload"><i class="fas fa-camera camera-icon"></i></label>
                    </div>
                    <h2 class="user-name">';
                    $uid = $_SESSION['user_id'];
                    $sql = "SELECT * FROM  usertable WHERE id='$uid';";
                    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                    echo $row['firstName'].'</h2>
                    <input type="hidden" id="userDP" value="'. $row['profile_pic'] .'">
                    </div>';
                    $WHSql = "SELECT * FROM userWH WHERE user_id='$uid'";
                    $WHRow = mysqli_fetch_assoc(mysqli_query($conn, $WHSql));
                    echo '
                    <!--Trainer and Products-->
                    <div class="trainer-main-box">
                    <video src="images/campfire.mp4" muted autoplay loop class="menuVideo"></video>
                    <a href="Trainers.php"><i class="fas fa-walking userWeightIcon"></i></a>
                    <a href="products.php"><i class="fas fa-shopping-bag userWeightIcon"></i></a>
                    <a href="#"><i class="fas fa-dumbbell userWeightIcon"></i></a>
                    </div>
                    <!-- User weight and height box -->
                    <div class="weightAndHeightBox">
                    <video src="images/campfire.mp4" muted autoplay loop class="menuVideo2"></video>
                    <div class="video-cover"></div>
                        <div class="subWHBox">
                            <i class="fas fa-weight-hanging userWeightIcon"></i>
                            <span><input type="text" value="'.$WHRow['user_weight'].'" name="weight" id="userWeight" class="whInputs" onchange="changeWeight()">
                                <h4>KG</h4>
                            </span>
                        </div>
                        <div class="subWHBox">
                            <i class="fas fa-ruler-vertical userWeightIcon"></i>
                            <span><input type="text" value="'.$WHRow['user_height'].'" name="height" id="userHeight" class="whInputs" onchange="changeHeight()">
                                <h4>CM</h4>
                            </span>
                        </div>
                    </div>
                    <!--User logout and setting button-->
                    <div class="logoutSettingsBox">
                    <video src="images/campfire.mp4" muted autoplay loop class="menuVideo3"></video>
                    <div class="video-cover"></div>
                        <a href="#"><i class="fas fa-shopping-cart userWeightIcon"></i></a>
                        <a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt userWeightIcon"></i></a>
                    </div>
                </div>
            </div>';
            }
        ?>