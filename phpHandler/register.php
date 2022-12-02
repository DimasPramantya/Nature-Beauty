<?php
include 'connection.php';
$username = $_POST['username'];
$email = $_POST['email'];
$query = "SELECT * FROM users where email = '$email'";
$action = mysqli_query($connect, $query);
$check = 0;
while($user = mysqli_fetch_object($action)){
    if($user->email == $email){
        $check = 1;
        break;
    }
}
if($check == 0){
    $password = $_POST['password'];
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'customer');";
    $action = mysqli_query($connect,$query);
    header('location:../login.php?status=registerSuccess');
}else{
    header('location:../login.php?status=emailHasBeenRegistered');
}