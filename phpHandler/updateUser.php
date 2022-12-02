<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_SESSION['email'];
$query = "UPDATE users SET username = '$username', alamat = '$alamat', phoneNumber = '$phoneNumber' WHERE email = '$email'";
$action = mysqli_query($connect, $query)or die(mysqli_error($connect));
header('location: ../index.php?status=updateSuccess');
