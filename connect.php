<?php
$user = 'root';
$password = 'root';
$db = 'user';
$host = 'localhost';
$port = 8889;
$success = mysqli_connect($host, $user, $password, $db, $port);
if(!$success)
    echo "fail";
else
    echo "success";
?>



