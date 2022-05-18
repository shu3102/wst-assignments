<?php
    ob_start();
    session_start();
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "wst";
    $conn = new mysqli($host, $user, $password, $db);
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }
    $conn -> select_db("info");
    if($_POST["upvote"]){
        $var = $_POST["upvote"];
        $fetch_username = "SELECT username FROM info where id = '$var'";
        $username = $conn->query($fetch_username)->fetch_array()[0];
        if($username === $_SESSION['user']){
            header("Location: /instagram/profiles.php");
            exit();
        };
        $var = $_POST["upvote"];
        $query = "SELECT upvote FROM info where id = '$var'";
        $count = $conn->query($query)->fetch_array()[0];
        $count = (int)$count + 1;
        $query = "UPDATE info SET upvote = '$count' where id = '$var'";
        $conn->query($query);
        header("Location: /instagram/profiles.php");
    } elseif($_POST["downvote"]){
        $var = $_POST["downvote"];
        $fetch_username = "SELECT username FROM info where id = '$var'";
        $username = $conn->query($fetch_username)->fetch_array()[0];
        if($username === $_SESSION['user']){
            header("Location: /instagram/profiles.php");
            exit();
        };
        $var = $_POST["downvote"];
        $query = "SELECT downvote FROM info where id = '$var'";
        $count = $conn->query($query)->fetch_array()[0];
        $count = (int)$count - 1;
        $query = "UPDATE info SET downvote = '$count' where id = '$var'";
        $conn->query($query);
        header("Location: /instagram/profiles.php");
    }

    header("Location: /instagram/profiles.php");
    
    ob_end_flush();
?>