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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $edu = $_POST['edu'];
    $skills = $_POST['skills'];
    $interest = $_POST['interest'];
    $username = $_SESSION['user'];
    $id = "SELECT id FROM basic where username = '$username'";
    $_id = $conn->query($id)->fetch_array()[0];
    $id_ = "SELECT id FROM info where id = '$_id'";
    $id_ = $conn->query($id_)->fetch_array()[0];
    if($id_ == TRUE){
        $query = "UPDATE info SET _name = '$name', email = '$email', username = '$username', phone = '$phone', bio = '$bio', city = '$city', _state = '$state', country = '$country', edu = '$edu', skills = '$skills', interest = '$interest', _image = '$image'
    WHERE id = '$_id'";
    } else {
        $query = "INSERT INTO info (_name, email, username, phone, bio, city, _state, country, edu, skills, interest, id, upvote, downvote, _image) 
        VALUES ('$name', '$email', '$username', '$phone', '$bio', '$city', '$state', '$country', '$edu', '$skills', '$interest', '$_id', 0, 0, '$image')";
    };
    
    if($conn->query($query) == TRUE){
        header("Location: /instagram/profiles.php");
    }else {
        // echo "$query";
        // echo $conn->error;
        header("Location: /instagram/signup.php");
    };
    $conn->close();
    ob_end_flush();
?>