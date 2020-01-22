<?php
session_start();
$servername = "localhost";
$username = "drug_guide";
$password = "";


// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, "root",$password, $username,"3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");

$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$userType = 0;



$query = "INSERT INTO users(`name`, `email`, `password`,`type`) VALUES('$name', '$email', '$pwd','$userType')";
$result = mysqli_query($conn,$query);
if($result) {
    session_start();
    $_SESSION['user_email'] = $email;
    echo "Succesfully registered";
    header('Location: ../views/user/home.php');
}
else {
    $_SESSION['Error'] = "An error has occurred, please make sure that the email is not already registered";
    header('Location: ../views/login.php');}

?>