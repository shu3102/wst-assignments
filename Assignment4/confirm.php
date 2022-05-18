<?php
    $server = "localhost";
    $user = "root";
    $passwd = "";
    $database ="quiz";

    $conn = new mysqli($server,$user,$passwd,$database);
    if($conn->connect_errno)
    {
        echo "failed connection";
    }
    $value = $_GET["datavalue"];
    $questionid = explode(".",$value)[0];
    $ans = explode(".",$value)[1]; 
    $sql = "SELECT * FROM quiz_table where questionid=$questionid";
    $res = $conn->query($sql);
    while($row = $res->fetch_assoc()) {
        echo "questionid: " . $row["questionid"]. " - option1: " . $row["option1"]. " option2: " . $row["option2"]. " option3: " . $row["option3"]. " option4: " . $row["option4"];
    }

?>