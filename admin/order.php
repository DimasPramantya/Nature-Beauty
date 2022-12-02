<?php
session_start();
include '../phpHandler/connection.php';
if(empty($_SESSION['email'])){
    header('location: ../login.php?status=not_yet_login');
}
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connect,$query);
$user = mysqli_fetch_object($result);
if(empty($_GET['status']) or $_GET['status'] == 'received'){
    $status = 'Received';
}else if($_GET['status'] == 'process'){
    $status = 'Processed';
}
else if($_GET['status'] == 'sent'){
    $status = 'Sent';
}else if($_GET['status'] == 'canceled'){
    $status = 'Cancelled';
}
$queryJoin = "SELECT u.username as username, s.custId as custId, o.status as status, o.totalPrice as totalPrice, o.quantity as quantity, p.brand as brand, p.name as name, p.image as image, p.size as size
    FROM users u INNER JOIN shoppingsession s ON u.Id = s.custId INNER JOIN orders o ON s.id = o.sessionId
    INNER JOIN products p ON o.productId = p.id 
    WHERE status = '$status'";
$action = mysqli_query($connect, $queryJoin);
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
    <div class="container h-100 mt-container-navbar">
        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center mt-2 mb-4">
                <span class="font-dmserifdisplay color-283618 font-size-32 fw-bold">ORDER DATA</span>
            </div>
            <div class="col-12 mb-3">
                <div class="row">
                <div class="col d-flex justify-content-center">
                            <a href="order.php?status=received" class="text-decoration-none">
                                <span class="font-anton text-black font-size-18 fw-bold">Received</span>
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="order.php?status=process" class="text-decoration-none">
                                <span class="font-anton text-black font-size-18 fw-bold">Processed</span>
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="order.php?status=sent" class="text-decoration-none">
                                <span class="font-anton text-black font-size-18 fw-bold">Sent</span>
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="order.php?status=done" class="text-decoration-none">
                                <span class="font-anton text-black font-size-18 fw-bold">Done</span>
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="order.php?status=canceled" class="text-decoration-none">
                                <span class="font-anton text-black font-size-18 fw-bold">Canceled</span>
                            </a>
                        </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row gy-3 mt-1">
                    <?php
                        while($data = mysqli_fetch_object($action)){
                    ?>
                    <div class="col-6 d-flex justify-content-center">
                        <div class="container w-75">
                            <div class="row">
                                <div class="col-1 d-flex align-items-center py-2">
                                    <span class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#606c38" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col-5 d-flex align-items-center py-2">
                                    <span class="color-283618 font-size-18"><?=$data->username?></span>
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    <span class="color-283618"><?=$data->status?></span>
                                </div>
                                <div class="col px-0 d-flex justify-content-center align-items-center py-2">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data->image); ?>"  alt="<?= $data->name ?>" class="img-order border-0 rounded-3" />
                                </div>
                                <div class="col-8 ps-0 pt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="font-anton fw-bold"><?=$data->brand?></span>
                                        </div>
                                        <div class="col-12 lh-1">
                                            <span class="font-robotocondensed color-231f20 font-size-12"><?=$data->name?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="font-robotocondensed color-231f20 font-size-12"><?=$data->size?></span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <span class="font-robotocondensed fw-bold font-size-13"><?=$data->quantity?></span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <span class="font-robotocondensed fw-bold font-size-13"><?=$data->totalPrice?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</body>
</html>