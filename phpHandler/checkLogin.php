<?php
session_start();
include 'connection.php';
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect,$query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_object($result);
    $_SESSION['email'] = $email;
    $_SESSION['status'] = 'loginSuccessful';
    if($user->role === 'admin') {
        header('location: ../admin/adminDashboard.php');
    }else{
        $_SESSION['cart'] = array();
        header('location: ../index.php');
    }
}else{
    header('location: ../login.php?status=wrongEmailOrPassword');
}



