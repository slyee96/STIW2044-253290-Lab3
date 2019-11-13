<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['Email'];
$password = $_POST['Password'];
$passwordsha = sha1($password);

$sql = "SELECT * FROM User WHERE Email = '$email' AND Password = '$passwordsha' AND Verify ='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "success";
}else{
    echo "failed";
}