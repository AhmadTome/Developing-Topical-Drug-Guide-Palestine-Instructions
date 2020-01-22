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

$cat_name = $_REQUEST['cat_name'];
$cat_representative = $_REQUEST['cat_representative'];


    $query1 = "INSERT INTO `categories`(`cat_name`, `cat_representative`) VALUES ('$cat_name','$cat_representative')";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        $_SESSION['added_correctly'] = "The Category added successfully";
        header('Location: ../views/admin/add_catigories.php');
    }else{
        $_SESSION['Error'] = "Something went wrong!";
        header('Location: ../views/admin/add_catigories.php');
    }
