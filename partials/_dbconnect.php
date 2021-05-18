<?php
// Script to connect the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "multithread";

$conn = mysqli_connect($servername , $username , $password , $database);

if (!$conn) {
    echo "unable to connect with database" . mysqli_connect_error();
}


?>