<?php
    include('adminTop.php');
?>
<style>
.activeFees {
    background: linear-gradient(to right, rgba(173, 50, 198, 0.2) 10%, transparent);
    border-left: 4px solid rgb(173, 50, 198);
    color: rgb(173, 50, 198);
}

.activeFees:hover {
    color: rgb(173, 50, 198);
    background: linear-gradient(to right, rgba(173, 50, 198, 0.2) 10%, transparent);
}
</style>

<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Fees Channel</p>
        </div>
    </div>

    <div class="allFeesBox">
        <p class="usersNotPayNameTitle">Pending Payments</p>
        <?php
            $currentMonth = date("M");
            $currentYear = date("Y");

            require "../includes/db.inc.php";

            $sql = "select u.firstName,u.id,u.email,u.profile_pic from usertable u where u.role='user' and u.id not in (SELECT f.user_id from fees f where f.feeMonth='$currentMonth' AND f.feeYear=$currentYear)";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="userBox">
                <div class="userImageBox">
                    <img src="../'.$row["profile_pic"].'" alt="" class="userPic">
                </div>
                <div class="userDetailsBox">
                    <p>'.$row["firstName"].'</p>
                    <p>'.$row["email"].'</p>
                </div>
                <div class="fessStatusBox">
                    <p class="feesStatus"><i class="fas fa-check pdspace"></i>Paid</p>
                </div>
                <div class="feesButtonBox">
                    <a href="sendAlert.php?user_id='.$row["id"].'" class="feeButtons alertButton"><i class="fas fa-exclamation-triangle pdspace"></i> Alert</a>
                    <a href="#" class="feeButtons blockButton"><i class="fas fa-ban pdspace"></i> Block</a>
                </div>
            </div>
                ';
            }
        ?>

    </div>

    <div class="allFeesBox">
        <p class="usersNotPayNameTitle">Fees Paid</p>
        <?php
            $currentMonth = date("M");
            $currentYear = date("Y");

            require "../includes/db.inc.php";

            $sql = "select u.firstName,u.id,u.email,u.profile_pic from usertable u where u.role='user' and u.id in (SELECT f.user_id from fees f where f.feeMonth='$currentMonth' AND f.feeYear=$currentYear)";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="userBox">
                <div class="userImageBox">
                    <img src="../'.$row["profile_pic"].'" alt="" class="userPic">
                </div>
                <div class="userDetailsBox">
                    <p>'.$row["firstName"].'</p>
                    <p>'.$row["email"].'</p>
                </div>
                <div class="fessStatusBox">
                    <p class="feesStatus"><i class="fas fa-check pdspace"></i>Paid</p>
                </div>
            </div>
                ';
            }
        ?>

    </div>

</div>