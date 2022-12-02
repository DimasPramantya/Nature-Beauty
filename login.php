<?php
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-7 h-100">
                <div class="row h-100">
                    <div class="col-12 position-absolute pt-4 px-5">
                        <span class="logo">nature skin</span>
                    </div>
                    <div class="col-12 h-100">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="container d-flex align-items-center flex-column">
                                <div class="card form-card my-4 p-2 rounded-4">
                                    <div class="card-body">
                                        <div class="card-title text-center mb-4">
                                            <span class="form-title">Login</span>
                                        </div>
                                        <form action="./phpHandler/checkLogin.php" method="post">
                                            <div class="row mb-3">
                                                <label for="email" class="col-sm-3 col-form-label fw-bold">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" class="form-control">
                                                </div>                                     
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password" class="col-sm-3 col-form-label fw-bold">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-4 d-flex justify-content-center">
                                                <input type="submit" class="text-center w-25 green-text" value="Sign in">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="w-25 text-center">
                                    <span><a href="register.php" class="green-text">Make New Account</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                          
            </div>
            <div class="col-5 h-100 p-0">
                <img src="./img/login-background.jpg" alt="login-background" class="img-fluid h-100 w-100">
            </div>
        </div>
    </div>
</body>
</html>