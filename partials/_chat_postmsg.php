<?php 
include '_dbconnect.php';

$msg = $_POST['text'];
$msg = str_replace("<", "&lt;", $msg);
$msg = str_replace(">", "&gt;", $msg);

$room = $_POST['room'];
$room = str_replace("<", "&lt;", $room);
$room = str_replace(">", "&gt;", $room);

$ip = $_POST['ip'];
$ip = str_replace("<", "&lt;", $ip);
$ip = str_replace(">", "&gt;", $ip);

$sql = "INSERT INTO `msgs` (`msg`, `room`, `ip`) VALUES ('$msg', '$room', '$ip')";
mysqli_query($conn, $sql);
mysqli_close($conn);

?>