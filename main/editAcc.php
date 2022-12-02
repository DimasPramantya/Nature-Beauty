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
    <div class="container mt-4 px-5">
        <div class="row mx-5">
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-6">
                        <span class="logo">nature skin</span>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#9a8830" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <span class="font-abrilfatface color-606c38 font-size-27">ACCOUNT</span>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <form action="../phpHandler/updateUser.php" method="post" class="w-50" id="editAcc">
                    <input type="text" name="email" class="form-control my-3" value=<?=$user->email?> aria-label="Disabled input example" disabled>
                    <input type="text" name="username" class="form-control my-3" value=<?=$user->username?>>
                    <input type="password" name="password" class="form-control my-3" value=<?=$user->password?> aria-label="Disabled input example" disabled>
                    <textarea class="form-control" name="alamat" placeholder="Address" rows="3"></textarea>
                    <input type="text" name="phoneNumber" class="form-control my-3" placeholder="Phone">
                </form>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Set Data" class="mx-2 mt-2 rounded-3 border-0 px-4 py-2 color-606c38 bg-white font-size-18" form="editAcc">
                        <a href="../phpHandler/logout.php"><button class="mx-2 py-2 font-size-18 bg-white color-606c38 mt-2 px-3 border-0 rounded-3">Log Out</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

