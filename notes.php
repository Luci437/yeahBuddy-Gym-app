<?php
    include('commonPartTop.php');
?>

<div class="trainerMainBox">
    <h1 class="trainerTitle">TRAINERS NOTES</h1>
    <h4 class="trainerSubTitle">Here you can see all the important informations that your trainer will be provided</h4>
    <div class="notesMainbox">

        <?php

        require('./includes/db.inc.php');

        if(isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];

            $sql = "SELECT * FROM advice WHERE user_id='$uid';";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="eachNotes">
                    <div class="picSection">
                    ';
                    $trainerId = $row['trainer_id'];
                    $trainerSql = "SELECT * FROM trainer WHERE user_id='$trainerId';";
                    $trainerResult = mysqli_fetch_assoc(mysqli_query($conn, $trainerSql));
                    echo '
                        <img src="'.$trainerResult['trainerImage'].'" class="trainePic" alt="">
                    </div>
                    <div class="noteSection">
                        <h3 class="trainersName">'.$trainerResult['trainerName'].'</h3>
                        <h4 class="trainerNote">'.$row["message"].'</h4>
                        <h6 class="noteDateAndTime">&#128337; '.$row['send_time'].'</h6>
                    </div>
                </div>
                ';
            }
        }
        ?>

    </div>
</div>

<?php
    include('commonPartBottom.php');
?>