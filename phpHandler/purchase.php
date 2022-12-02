<?php
session_start();
include 'connection.php';
class Checkout {
    public $productId;
    public $productAmmount;
    public $productName;
    public $productPrice = 0;
    public $productImg;
}
$paymentMethod = $_POST['paymentMethod'];
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$action = mysqli_query($connect , $query);
$user = mysqli_fetch_object($action);
$userId = $user->id;
$query = "INSERT INTO shoppingsession (custId) VALUES ($userId)";
$action = mysqli_query($connect, $query);
$query = "SELECT * FROM shoppingsession ORDER BY id DESC LIMIT 1";
$action = mysqli_query($connect, $query);
$session = mysqli_fetch_object($action);
$sessionId = $session->id;
foreach ( $_SESSION['checkout'] as $item){
    $query = "INSERT INTO orders (sessionId, productId, quantity, totalPrice, status) VALUES ($sessionId, $item->productId, $item->productAmmount, $item->productPrice, 'Received')";
    $action = mysqli_query($connect, $query);
    $query = "SELECT * FROM products WHERE id = $item->productId";
    $action = mysqli_query($connect, $query);
    $product = mysqli_fetch_object($action);
    $product->stock = $product->stock - $item->productAmmount; 
    $query = "UPDATE products SET stock = $product->stock WHERE id = $item->productId";
    $action = mysqli_query($connect, $query);
}
header('location: ../index.php?status=ordersuccess');
