<?php
    include('adminTop.php');
?>
<style>
.activeAdvice {
    background: linear-gradient(to right, rgba(173, 50, 198, 0.2) 10%, transparent);
    border-left: 4px solid rgb(173, 50, 198);
    color: rgb(173, 50, 198);
}

.activeAdvice:hover {
    color: rgb(173, 50, 198);
    background: linear-gradient(to right, rgba(173, 50, 198, 0.2) 10%, transparent);
}
</style>
<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Trainer Page</p>
        </div>
        <?php
            require('../includes/db.inc.php');
            $trainerId = $_SESSION['trainer'];
            $sql = "SELECT trainerName FROM trainer WHERE user_id='$trainerId';";
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            echo '<h3 class="loggedTrainerName">'.$result['trainerName'].'</h3>';
        ?>
    </div>
    <!-- content box -->
    <div class="mainTrainerBox">
        <form class="adviceBox" method="post" action="sendMessage.php">
            <h1>send advice</h1>
            <p>Here you can send advice to your client</p>
            <div style="margin-top: 8px;" class="inputMainBox">
                <select id="userNames" name="userId">
                    <option selected disabled>--- SELECT USER HERE ---</option>
                    <?php
                        require('../includes/db.inc.php');

                        $sql = "SELECT * FROM usertable WHERE role='user';";
                        $result = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <option value="'.$row['id'].'">'.$row["firstName"].'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div class="inputMainBox">
                <textarea type="text" rows="10" cols="80" required name="message" id="regFirst" class="inputInput" ></textarea>
                <label for="regFirst" class="inputLabel">Type here and hit the send button.</label>
            </div>
            <button type="submit" name="sendButton" class="addToCartButton addToCartButton2"><i class="fas fa-paper-plane pdspace"></i> SEND</button>
        </form>
    </div>
</div>
<?php
    include('adminBottom.php');
?>