<?php
session_start();
include 'connection.php';
$name = $_POST['name'];
$brand = $_POST['brand'];
$size = $_POST['size'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$adsTitle = $_POST['heading'];
$description = $_POST['description'];
$category = $_POST['category'];
$fileName = basename($_FILES["image"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
$image = $_FILES['image']['tmp_name']; 
$imgContent = addslashes(file_get_contents($image));

$query = "INSERT INTO products (name,brand,size,stock,price,adsTitle, category,description,image) 
VALUES ('$name','$brand','$size','$stock','$price','$adsTitle','$category', '$description','$imgContent')";
$action = mysqli_query($connect, $query);
header('location: ../admin/adminDashboard.php?status=addProductSuccess');