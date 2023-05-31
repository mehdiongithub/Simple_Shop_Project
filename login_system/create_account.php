<?php
require '../database/database.php';

if (isset($_FILES['photo'])){

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_temp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        move_uploaded_file($file_temp, "photo_save/$file_name");

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        $qurey = "Select * from users where email = '$email' ";
        $res = mysqli_query($conn, $qurey);



        if (mysqli_num_rows($res) > 0){
            echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>These email exist Please insert another email address</strong> 
</div>';
        }else{
            if ($password === $c_password){
                $hash = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`name`, `email`, `password`, `photo`)
            VALUES ('$name',  '$email','$hash', '$file_name')";
                $result = mysqli_query($conn,$sql);
                if ($result){
                    session_start();
                    $_SESSION['signup']= true;
                    $_SESSION['email']= $email;
                    header('location: /../index.php');
                }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Sorry!</strong> Your password is not match.
</div>';

            }

        }


}

        }


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-color: #eee;
        }

    </style>

</head>
<body>
<div class="container">
<section class="vh-100 mt-5" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-9 col-xl-11 mt-4 d-flex p-2">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">SIGN UP</p>

                                <form action="create_account.php" method="post" class="mx-5 mx-md-4" enctype="multipart/form-data">

                                    <div class="d-flex flex-row align-items-center mb-4">

                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="name" name="name" class="form-control">
                                            <label class="form-label" for="name">Your Name</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" name="email"  class="form-control">
                                            <label class="form-label" for="email">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="password" name="password" class="form-control">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="c_password" name="c_password" class="form-control">
                                            <label class="form-label" for="c_password">Repeat your password</label>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <label for="photo">Select image:</label>
                                        <input type="file" name="photo"  id="photo">
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit">
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="logo/signup.png"
                                     class="img-fluid" alt="Sample image" width="800px" height="800px">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {

    })


</script>


</body>
</html>