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

$categories = $_REQUEST['categories'];
$name = $_REQUEST['name'];
$description = $_REQUEST['description'];


$query1 = "INSERT INTO `drug`(`name`, `cat_id`, `description`) VALUES ('$name','$categories','$description')";
$result1 = mysqli_query($conn, $query1);
if ($result1) {
    $_SESSION['added_correctly'] = "The Drug added successfully";
    header('Location: ../views/admin/add_drug.php');
}else{
    $_SESSION['Error'] = "Something went wrong!";
    //header('Location: ../views/admin/add_drug.php');
}
