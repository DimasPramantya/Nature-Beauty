<?php
session_start();
include 'connection.php';
$productId = $_GET['productId'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$adsTitle = $_POST['heading'];
$description = $_POST['description'];
$fileName = basename($_FILES["image"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
$image = $_FILES['image']['tmp_name']; 
$imgContent = addslashes(file_get_contents($image));

$query = "UPDATE products SET stock = '$stock', price = '$price', description = '$description', image = '$imgContent', adsTitle = '$adsTitle' WHERE id = '$productId'";
$action = mysqli_query($connect, $query);
header('location: ../admin/adminDashboard.php?status=updateSuccess');