<?php
session_start();
include '../phpHandler/connection.php';
if(empty($_SESSION['email'])){
    header('location: ../login.php?status=not_yet_login');
}
class Checkout {
    public $productId;
    public $productAmmount;
    public $productName;
    public $productPrice = 0;
    public $productImg;
    public $productBrand;
}
$totalPrice = 0;
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connect,$query);
$user = mysqli_fetch_object($result);
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
                <a href="../index.php" class="text-decoration-none text-white">Home</a>
            </li>
            <li class="nav-item me-4 px-2 d-flex justify-content-center rounded-3">
                <div class="dropdown">
                    <button class="btn border-0 dropdown-toggle text-white" type="button" data-bs-toggle="dropdown">Products</button>
                    <ul class="dropdown-menu py-0">
                        <li><a href="productCategory.php?category=face" class="dropdown-item">Face</a></li>
                        <li><a href="productCategory.php?category=hair" class="dropdown-item">Hair</a></li>
                        <li><a href="productCategory.php?category=body" class="dropdown-item">Body</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item my-6px px-2 d-flex justify-content-center rounded-3">
                <a href="cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item ms-4 py-6px px-2 d-flex justify-content-center rounded-3">
                <a href="about.php" class="text-decoration-none text-white">About</a>
            </li>
            <li class="nav-item ms-4 py-6px px-2 d-flex justify-content-center rounded-3">
                <a href="orderHistory.php" class="text-decoration-none text-white">Order</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center p-4">
                <span class="font-dmserifdisplay font-size-32 color-283618">CHECK OUT</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="row-cols-1">
                            <div class="col offset-3 col-8 mb-4">
                                <div class="row">
                                    <div class="col-2 pe-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#606c38" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                            </svg>
                                    </div>
                                    <div class="col ps-0 d-flex align-items-center">
                                        <span class="font-robotocondensed font-size-18 color-755f52"><?=$user->username?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col offset-3 col-8 mb-4">
                                <div class="row mb-3">
                                    <div class="col-2 pe-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#606c38" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                          </svg>
                                    </div>
                                    <div class="col ps-0">
                                        <span class="font-robotocondensed font-size-16 color-755f52">
                                            <?=$user->alamat?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col offset-3 col-8 mb-4">
                                <div class="row">
                                    <div class="col-2 pe-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#606c38" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                          </svg>
                                    </div>
                                    <div class="col ps-0">
                                        <span class="font-robotocondensed font-size-16 color-755f52">
                                            <?=$user->phoneNumber?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col offset-3 col-8 mb-4">
                                <a href="editAcc.html"><button class="border-0 px-2 py-1 text-white rounded-3 font-ttnorms bg-ffcf00">Edit/Change Data</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row-cols-1">
                            <div class="col col-12 mb-4">
                            <?php
                                    foreach($_SESSION['checkout'] as $item){  $totalPrice+=$item->productPrice;  
                                ?>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($item->productImg); ?>"  alt="<?= $item->productName ?>" class="img-checkout-product rounded-3" />
                                    </div>
                                    <div class="col-8 pt-2">
                                        <div class="row-cols-1">
                                            <div class="col-8 lh-1">
                                                <span class="font-anton fw-bold"><?=strtoupper($item->productBrand)?></span>
                                            </div>
                                            <div class="col-8 lh-1">
                                                <span class="font-size-12"><?=strtoupper($item->productName)?></span>
                                            </div>
                                            <div class="col-8 d-flex justify-content-end pe-4">
                                                <span class="font-size-12">x<?=$item->productAmmount?></span>
                                            </div>
                                            <div class="col-8 d-flex justify-content-end pe-4">
                                                <span class="font-size-12 fw-bold">Rp <?=$item->productPrice?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col col-12 d-flex align-items-center mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                </svg>
                                <span class="font-anton font-size-22 ms-2">Payment Information</span>
                            </div>
                            <div class="col col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="font-robotocondensed color-755f52">Total Order</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="font-robotocondensed color-755f52">Rp <?=$totalPrice?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <span class="font-robotocondensed color-755f52">Postage</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="font-robotocondensed color-755f52">Rp 15.000</span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <span class="font-robotocondensed color-283618">Total Payment</span>
                                    </div>
                                    <div class="col-6">
                                        <span class="font-robotocondensed color-283618">Rp <?=$totalPrice+=15000?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <form action="../phpHandler/purchase.php" method="post" id="checkout">
                                            <select class="form-select form-select-sm " aria-label=".form-select-sm" name="paymentMethod">
                                                <option class="color-283618" selected>Payment Method</option>
                                                <option class="color-283618" value="Bank Transfer">Bank Transfer</option>
                                                <option class="color-283618" value="DANA">DANA</option>
                                                <option class="color-283618" value="COD">COD</option>
                                              </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center p-3 mt-4">
                <input type="submit" form="checkout" value="Checkout" class="bg-9a8830 border-0 rounded-3 font-size-18 px-3 py-1 text-white">
            </div>
        </div>
    </div>
</body>
</html>