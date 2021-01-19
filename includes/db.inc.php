
<?php
    $serverName = 'localhost';
    $databaseName = 'yeahBuddy';
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($serverName,$username,$password,$databaseName);
    if(mysqli_connect_error($conn)) {
        die('can\'t connect to database ');
    }
?>