<?php
session_start();
class Checkout {
    public $productId;
    public $productAmmount;
    public $productName;
    public $productPrice = 0;
    public $productImg;
    public $productBrand;
}
include 'connection.php';
$productId = $_GET['productId'];
$query = "SELECT * FROM products WHERE id = $productId";
$action = mysqli_query($connect, $query);
$result = mysqli_fetch_object($action);
$cart = new Checkout();
$cart->productId = $_GET['productId'];
$cart->productAmmount = $_POST['productAmmount'];
$query = "SELECT * FROM products WHERE id = $cart->productId";
$action = mysqli_query($connect, $query);
$product = mysqli_fetch_object($action);
if($product->stock - $cart->productAmmount >= 0){
    $cart->productName = $result->name;
    $cart->productPrice = $result->price * $cart->productAmmount;
    $cart->productImg  = $result->image;
    $cart->productBrand = $result->brand;
    $index = 0; $check=0;
    while($index<sizeof($_SESSION['cart'])){
        if($_SESSION['cart'][$index]->productId == $cart->productId){
            $_SESSION['cart'][$index]->productAmmount += $cart->productAmmount;
            $_SESSION['cart'][$index]->productPrice = $_SESSION['cart'][$index]->productAmmount*$result->price;
            $check = 1;
            header('location: ../main/cart.php');
        }
        $index++;
    }
    if($check == 0){
        array_push($_SESSION['cart'],$cart);
        header('location: ../main/cart.php');
    }
}else{
    header('location: ../index.php?status=notEnoughStock');
}