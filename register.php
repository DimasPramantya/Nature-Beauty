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
                                <div class="card form-card form-card-register my-4 rounded-4">
                                    <div class="card-body">
                                        <div class="card-title text-center mb-4">
                                            <span class="form-title">Sign Up</span>
                                        </div>
                                        <form action="./phpHandler/register.php" method="post">
                                           <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="username" name="username">
                                                <label for="username" class="form-label">Username</label>
                                           </div>
                                           <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="email" name="email">
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" placeholder="password" name="password">
                                                <label for="password" class="form-label">Password</label>
                                            </div>
                                            <div class="row mt-4 d-flex justify-content-center mt-4">
                                                <input type="submit" class="text-center w-25 green-text" value="Sign in">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span><a href="login.php" class="green-text">Login to Your Existing Account</a></span>
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