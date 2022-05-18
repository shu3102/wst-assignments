<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "info_db";

$conn = new mysqli($host, $user, $password, $db);
if($conn->connect_error){
    echo 'connection failed' . $conn->connect_error;
}
echo "Success";
?>