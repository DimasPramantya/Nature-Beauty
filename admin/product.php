<?php
session_start();
include '../phpHandler/connection.php';
if(empty($_SESSION['email'])){
    header('location: ../login.php?status=not_yet_login');
}
$productId=$_GET['productId'];
$query = "SELECT * FROM products WHERE id = $productId":
$action = mysqli_query($connect, $query);
$product = mysqli_fetch_object($action);
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
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center mt-2 mb-4">
                <span class="font-dmserifdisplay color-283618 font-size-27 fw-bold">ADD PRODUCT</span>
            </div>
            <div class="col-8 d-flex justify-content-center">
                <form action="../phpHandler/updateProduct.php?productId=<?=$productId?>" method="post" class="w-75" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="brand" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Brand</label>
                        <div class="col-sm-9">
                            <input type="text" name="brand" class="form-control" value="<?=$product->brand?>" readonly> 
                        </div>                                     
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" value="<?=$product->name?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Category</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-sm " aria-label=".form-select-sm" name="category" value="<?=$product->category?>" readonly>
                                <option class="color-283618" value="Face">Face</option>
                                <option class="color-283618" value="Body">Body</option>
                                <option class="color-283618" value="Hair">Hair</option>
                              </select>
                        </div>                                     
                    </div>
                    <div class="row mb-3">
                        <label for="size" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Size</label>
                        <div class="col-sm-9">
                            <input type="text" name="size" class="form-control" value="<?=$product->size?>" readonly>
                        </div>                                     
                    </div>
                    <div class="row mb-3">
                        <label for="size" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18" value="<?=$product->stock?>">Stock</label>
                        <div class="col-sm-9">
                            <input type="number" name="stock" class="form-control">
                        </div>                                     
                    </div>
                    <div class="row mb-3">
                        <label for="size" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Price</label>
                        <div class="col-sm-9">
                            <input type="text" name="price" class="form-control" value="<?=$product->price?>">
                        </div>                                     
                    </div>
                    <div class="row mb-3">
                        <label for="heading" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Heading</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="heading" rows="3" value="<?=$product->adsTitle?>"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="3" value="<?=$product->description?>"></textarea>
                        </div>                                     
                    </div>
                    <div class="row mb-3">
                        <label for="size" class="col-sm-3 col-form-label font-roboto color-283618 font-size-18">Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control">
                        </div>                                     
                    </div>
                    <div class="row mb-3 d-flex justify-content-center">
                        <d class="w-25">
                            <input type="submit" value="Create" class="mx-2 mt-2 rounded-3 border-0 px-5 mb-3 py-2 font-roboto color-283618 font-size-18 bg-white">
                        </d>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>