<?php
session_start();
class Checkout {
    public $productId;
    public $productAmmount;
    public $productName;
    public $productPrice = 0;
    public $productImg;
}
include 'connection.php';
foreach ($_POST['cartIndex'] as $cartIndex){
    $_SESSION['checkout'][] = $_SESSION['cart'][$cartIndex];
}
header('location: ../main/checkout.php');