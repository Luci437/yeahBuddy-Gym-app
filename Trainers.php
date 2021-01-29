<?php

    include('commonPartTop.php');

?>

<div class="trainerMainBox">
    <h1 class="trainerTitle">TRAINER</h1>
    <h4 class="trainerSubTitle">Each new day is a new opportunity to improve yourself.
        Take it. And make the most of it.</h4>

    <div class="trainerSubBox">

        <?php
        require('includes/db.inc.php');

        $sql = "SELECT * FROM trainer";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="trainerBox">
                <img src="'.$row['trainerImage'].'" alt="Trainer Name" class="trainerImg">
                <div class="trainerImageCover"></div>
                <h2 class="trainerName">'.$row['trainerName'].'</h2>
                <h5 class="trainerAbout">'.$row['trainerAbout'].'</h5>
                <div class="experienceBox">
                    <h1>'.$row['trainerEOX'].'</h1>
                    <h5>Y.O.E</h5>
                </div>
            </div>
            ';
        }
        ?>
    </div>

</div>

<?php
    include('commonPartBottom.php');
?>