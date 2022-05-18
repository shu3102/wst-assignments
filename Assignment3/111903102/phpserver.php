<?php
$servername="localhost";
$username="root";
$password="";
$database_name="student";


$conn=mysqli_connect($servername, $username, $password, $database_name);
if(!$conn){
    die("Connection Failed:" + mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    
    $sql_query="INSERT INTO student_details (first_name, last_name, user_name, email, state, country) VALUES ('$firstname', '$lastname','$username', '$email', '$state', '$country
    ')";
    
    if(mysqli_query($conn, $sql_query)){
        echo "New students deatils inserted succesfully";
    }
    else{
        echo "Error: " . $sq . "" . mysqli_error($conn);
    }
    mysqli_close($conn);

}
?>