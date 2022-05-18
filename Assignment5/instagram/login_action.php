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
    $conn -> select_db("basic");
    $username = $_POST['username'];
    $password = $_POST['password'];
    //echo "'$username', '$password'";
    $validate_query = "SELECT * FROM basic where username = '$username' and _password = '$password'";
    $count = $conn->query($validate_query)->num_rows;
    if($count > 0){
        $_SESSION['user'] = $username;
        // echo $_SESSION['user'];
        header("Location: /instagram/form.php");
    } else { // display error message in directed page
        header("Location: /instagram/signup.php");
    }
    $conn->close();
    ob_end_flush();
?>