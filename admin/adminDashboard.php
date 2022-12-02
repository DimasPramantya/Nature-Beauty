<?php
session_start();
include '../phpHandler/connection.php';
if(empty($_SESSION['email'])){
    header('location: ../login.php?status=not_yet_login');
}
if(isset($_GET['status'])){
    $status = $_GET['status'];
    echo '<script type="text/javascript">alert("'.$status.'");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="d-block ps-5 sticky-top bg-606c38">
        <ul class="nav justify-content-center p-3">
            <li class="nav-item me-4 py-6px px-2 d-flex justify-content-center rounded-3">
                <a href="adminDashboard.php" class="text-decoration-none text-white">Dashboard</a>
            </li>
            <li class="nav-item me-4 px-2 d-flex justify-content-center rounded-3">
                <div class="dropdown">
                    <button class="btn border-0 dropdown-toggle text-white" type="button" data-bs-toggle="dropdown">Products</button>
                    <ul class="dropdown-menu py-0">
                        <li><a href="productCategory.php?category=face" class="dropdown-item">Face</a></li>
                        <li><a href="productCategory.php?category=hair" class="dropdown-item">Hair</a></li>
                        <li><a href="productCategory.php?category=body" class="dropdown-item">Body</a></li>
                        <li><a href="addProduct.php" class="dropdown-item">Add Product</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item py-6px d-flex justify-content-center rounded-3">
                <a href="order.php" class="text-decoration-none ps-6px text-white">Order</a>
            </li>
        </ul>
    </div>
    <div class="container h-75 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mb-2 text-center">
                <div class="row-cols-1">
                    <div class="col">
                        <span class="w-100 font-oranienbaum color-283618 font-size-27">Hello, Welcome to</span> 
                    </div>
                    <div class="col">
                        <span class="w-100 font-yesevaone color-283618 font-size-27 fw-bold"> Admin Page</span>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <a href="../phpHandler/logout.php">
                    <button class="py-2 px-3 rounded-3">LogOut</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>