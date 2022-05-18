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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $validate_query = "SELECT * FROM basic where email = '$email' or username = '$username'";
    $count = $conn->query($validate_query)->num_rows;
    if($count > 0){
        echo "User Already Exist !!!";
        header("Location: /instagram/signup.php");
    } else {
        $query = "INSERT INTO basic (username, email, _password) VALUES ('$username', '$email', '$password')";
        if($conn->query($query) == TRUE){
            $_SESSION['user'] = $username;
            header("Location: /instagram/profiles.php");
        }else {
            echo "$conn->error";
            // header("Location: /instagram/signup.php");
        };
    }
    $conn->close();
    ob_end_flush();
?>