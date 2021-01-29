<?php
    include('adminTop.php');
?>
<style>
.activeUser {
    background: linear-gradient(to right, rgba(173, 50, 198, 0.2) 10%, transparent);
    border-left: 4px solid rgb(173, 50, 198);
    color: rgb(173, 50, 198);
}

.activeUser:hover {
    color: rgb(173, 50, 198);
    background: linear-gradient(to right, rgba(173, 50, 198, 0.2) 10%, transparent);
}
</style>
<div class="contentBox">
    <div class="titleBox">
        <div class="titleImageBox"></div>
        <div class="titleDetailsBox">
            <p>You are at</p>
            <p>Users Channel</p>
        </div>
    </div>
    <!-- content box -->
    <div class="mainUserContentBox">

    <?php
        include('../includes/db.inc.php');
        $sql = "SELECT * FROM usertable";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="userBox">
            <div class="userImageBox">
                <img src="../'.$row['profile_pic'].'" alt="" class="userPic">
            </div>
            <div class="userDetailsBox">
                <p>'.$row['firstName'].' '.$row['lastName'].'</p>
                <p>'.$row['email'].'</p>
            </div>
        </div>';
        }
    ?>


    </div>
</div>
<?php
    include('adminBottom.php');
?>