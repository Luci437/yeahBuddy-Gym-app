<?php
    include('adminTop.php');
?>
<style>
    .activeTrainer {
        background: linear-gradient(to right,rgba(173, 50, 198,0.2) 10%,transparent);
        border-left: 4px solid rgb(173, 50, 198);
        color: rgb(173, 50, 198);
    }
    .activeTrainer:hover {
        color: rgb(173, 50, 198);
        background: linear-gradient(to right,rgba(173, 50, 198,0.2) 10%,transparent);
    }
</style>
<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Trainers Channel</p>
        </div>
        <a href="adminAddTrainer.php" class="addButton"><i class="fas fa-plus pdspace"></i> ADD TRAINER</a>
    </div>
    <!-- content box -->
    <div class="mainContentBox">

    <?php
        require('../includes/db.inc.php');

        $sql = "SELECT * FROM trainer";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="eachTrainerBox">
            <div class="trainerImageBox">
                <img src="../'.$row['trainerImage'].'" alt="" class="trainerPic">
            </div>
            <div class="trainerDetailsBox">
                <h4 class="trainerName">'.$row['trainerName'].'</h4>
                <h5 class="trainerDetails">'.$row['trainerAbout'].'</h5>
                <span class="expYears">'.$row['trainerEOX'].' Years</span>
            </div>
        </div>
            ';
        }
    ?>

    </div>
</div>
<?php
    include('adminBottom.php');
?>
    
