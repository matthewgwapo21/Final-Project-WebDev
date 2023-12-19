<?php

session_start();

$mysqli = require _DIR_. "/database.php";
$sql = "DELETE FROM user WHERE id = {$_SESSION["user_id"]}";
$result = $mysqli->query($sql);

if($result){
    header("location: loginpage.php");
}
else{
    echo "Failed: ". mysqli_error($conn);
}