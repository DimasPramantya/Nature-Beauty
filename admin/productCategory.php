<?php
session_start();
include '../phpHandler/connection.php';
if(empty($_SESSION['email'])){
    header('location: ../login.php?status=not_yet_login');
}
$category = $_GET['category'];
$num = 0;
$query = "SELECT * FROM products WHERE category = '$category'";
$action = mysqli_query($connect,$query);
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
    <div class="container mt-container-navbar">
        <div class="row">
            <div class="col-6 ps-5">
                <span class="logo">nature skin</span>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6 offset-4 d-flex justify-content-end mb-4">
                        <div class="input-group h-25">
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text bg-white border-1">x</span>
                        </div>
                    </div>
                    <div class="col-2 pe-5 mb-4">
                        <span class="profile">
                            <a href="./editAcc.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </a>   
                        </span>
                    </div>
                    <div class="col-6 offset-4 d-flex justify-content-end pe-5">
                        <span class="moto gagalin">TOGETHER WE CARE</span>
                    </div>
                    <div class="col-6 offset-4 d-flex justify-content-end pe-5">
                        <span class="moto gagalin">TOGETHER WE SAVE</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-cols-1">
            <div class="col offset-1 col-2 mb-4 lh-sm">
                <span class="font-dmserifdisplay font-size-32 color-283618"><?= strtoupper($category) ?> PRODUCTS</span>
            </div>
            <div class="col">
                <div class="row pt-1">
                    <?php
                        while ($row = mysqli_fetch_object($action)){
                            if($num%3==0){
                                $justify = "justify-content-end";
                            } elseif(($num-1)%3==0){
                                $justify = "justify-content-center";
                            } elseif(($num-2)%3==0){
                                $justify = "justify-content-start";
                            }
                    ?>
                    <div class="col-4 d-flex <?=$justify?> mb-4">
                        <a href="product.php?productId=<?=$row->id?>" class="text-decoration-none">
                            <div class="card border-0 rounded-0 bg-brown">
                                <div class="card-img-top">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row->image); ?>"  alt="<?= $row->name ?>" class="img-product rounded-3" />
                                </div>
                                <div class="card-body py-2 px-0">
                                    <div class="card-title mb-0 lh-sm">
                                        <span class="font-roboto fw-semibold font-size-18 color-231f20"><?=$row->brand?></span>
                                    </div>
                                    <div class="card-text m-0 card-text-product lh-sm">
                                        <span class="font-roboto color-231f20 font-size-12"><?=strtoupper($row->name)?>
                                        </span>
                                    </div>
                                    <div class="mt-2 card-text text-end">
                                        <span class="font-agrandirregular color-283618">Rp <?=$row->price?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                        $num++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>