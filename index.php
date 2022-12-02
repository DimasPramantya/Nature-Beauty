<?php
session_start();
include './phpHandler/connection.php';
if(empty($_SESSION['email'])){
    header('location: login.php?status=not_yet_login');
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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="d-block ps-5 sticky-top bg-606c38">
        <ul class="nav justify-content-center p-3">
            <li class="nav-item me-4 py-6px px-2 d-flex justify-content-center rounded-3">
                <a href="#" class="text-decoration-none text-white">Home</a>
            </li>
            <li class="nav-item me-4 px-2 d-flex justify-content-center rounded-3">
                <div class="dropdown">
                    <button class="btn border-0 dropdown-toggle text-white" type="button" data-bs-toggle="dropdown">Products</button>
                    <ul class="dropdown-menu py-0">
                        <li><a href="./main/productCategory.php?category=face" class="dropdown-item">Face</a></li>
                        <li><a href="./main/productCategory.php?category=hair" class="dropdown-item">Hair</a></li>
                        <li><a href="./main/productCategory.php?category=body" class="dropdown-item">Body</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item my-6px px-2 d-flex justify-content-center rounded-3">
                <a href="./main/cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item ms-4 py-6px px-2 d-flex justify-content-center rounded-3">
                <a href="./main/about.php" class="text-decoration-none text-white">About</a>
            </li>
            <li class="nav-item ms-4 py-6px px-2 d-flex justify-content-center rounded-3">
                <a href="./main/orderHistory.php" class="text-decoration-none text-white">Order</a>
            </li>
        </ul>
    </div>
    <div class="container h-100 mt-container-navbar">
        <div class="row">
            <div class="col-6 ps-5">
                <span class="logo">nature skin</span>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6 offset-4 d-flex justify-content-end mb-4">
                        <div class="input-group h-25">
                            <span class="input-group-text bg-white border-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg></span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text bg-white border-1">x</span>
                        </div>
                    </div>
                    <div class="col-2 pe-5 mb-4">
                        <span class="profile">
                            <a href="./main/editAcc.php">
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
        <div class="row ms-5 mt-3">
            <div class="col-4 ms-4 border-3 me-5">
                <div class="card border-0 rounded-0 bg-brown">
                    <div class="card-body w-75 pt-5">
                        <div class="card-title lh-1">
                            <span class="font-oranienbaum">
                                Have dry or even flaky skin? 
                                This is the solution
                            </span>
                        </div>
                        <div class="card-text lh-sm pb-2">
                            <span class="font-ttnorms color-524d4b">
                                A gel-textured body cleanser with a refreshing 
                                Mediterranean floral scent and enriched with Community
                            </span> 
                        </div>
                        <div class="card-subtitle">
                            <a href="./main/product.php?productId=1" class="text-decoration-none font-ttnorms color-524d4b fw-bold">See more...</a>
                        </div>
                    </div>
                    <div class="card-img-bottom">
                        <img src="./img/olive-product.jpg" alt="olive-product" class="w-100 rounded-3">
                    </div>
                </div>
            </div>
            <div class="col-3 me-5">
                <div class="row row-cols-1">
                    <div class="col border-3 mb-3">
                        <div class="card border-0 rounded-0 bg-brown">
                            <div class="card-img-top">
                                <img src="./img/african-ximenia.jpg" alt="african-ximenia" class="w-100 rounded-3">
                            </div>
                            <div class="card-body px-0">
                                <div class="card-title lh-1">
                                    <span class="font-oranienbaum">
                                        Africa's Typical
                                    </span>
                                </div>
                                <div class="card-text lh-sm pb-2">
                                    <span class="font-ttnorms color-524d4b">
                                        Body cleansing scrub enriched with ximenia fruit 
                                        seed harvested in Namibia, Africa. Ximenia oil is famous for 
                                        its oil content which is so moisturizing
                                    </span>
                                </div>
                                <div class="card-subtitle">
                                    <a href="./main/product.php?productId=2" class="text-decoration-none font-ttnorms color-524d4b fw-bold">See more...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col border-3">
                        <div class="card border-0 rounded-0 bg-brown">
                            <div class="card-img-top">
                                <img src="./img/ginger-serum.jpg" alt="ginger-serum" class="w-100 rounded-3">
                            </div>
                            <div class="card-body px-0">
                                <div class="card-title lh-1">
                                    <span class="font-oranienbaum">
                                        How to reduce hairloss and  itching due to dandruff?
                                    </span>
                                </div>
                                <div class="card-text lh-sm pb-2">
                                    <span class="font-ttnorms color-524d4b">
                                        A gel-textured scalp serum enriched with ginger essential oil, birch bark extract,
                                        white willow extract
                                    </span> 
                                </div>
                                <div class="card-subtitle">
                                    <a href="./main/product.php?productId=5" class="text-decoration-none color-524d4b font-ttnorms fw-bold">See more...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 border-3">
                <div class="card border-0 rounded-0 bg-brown">
                    <div class="card-img-top pt-5">
                        <img src="./img/GUARANA_COFFEE_ENERGISING_DEEP_CLEANSER_150ML-banner.jpg" alt="guarana" class="w-100 rounded-3">
                    </div>
                    <div class="card-body px-0">
                        <div class="card-title lh-1">
                            <span class="font-oranienbaum">
                            Perfect for Men's tired and dull looking skin
                            </span>
                        </div>
                        <div class="card-text lh-sm pb-2">
                            <span class="font-ttnorms color-524d4b">
                            Men's special facial cleanser containing guarana seed and green coffee. Helps cleanse the face of dirt and makes the skin feel fresh, after use the skin will feel energized again.</span>
                        </div>
                        <div class="card-subtitle">
                            <a href="./main/product.php?productId=9" class="text-decoration-none font-ttnorms color-524d4b fw-bold">See more...</a>
                        </div>
                </div>
            </div>
        </div>
        <div class="row ms-5 mb-5">
            <div class="col col-12 ms-4 mb-3">
                <span class="color-283618 font-yesevaone font-size-36">
                    Best Seller
                </span>
            </div>
            <div class="col col-12">
                <div class="row">
                    <div class="col col-4 ms-5 me-2">
                        <img src="./img/edelweiss-home.jpg" alt="edelweiss-home" class="w-100 rounded-3">
                    </div>
                    <div class="col col-6">
                        <div class="row-cols-1">
                            <div class="col col-5 mb-2 pt-3">
                                <span class="font-oranienbaum lh-1">Clean stubborn dirt with Edelweiss Liquid Peel</span>
                            </div>
                            <div class="col col-6 lh-sm mb-1">
                                <span class="font-ttnorms color-524d4b">
                                    For those of you who are annoyed because your skin is dull and have to 
                                    deal with pollution every day, be calm, because
                                </span>
                            </div>
                            <div class="col">
                                <span>
                                    <a href="./main/product.php?productId=10" class="font-ttnorms text-decoration-none fw-bold color-524d4b">Read more...</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>