<?php
require '../database/database.php';

$flag = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){


        $email = $_POST['email'];
        $password = $_POST['password'];

        $qurey = "Select * from users where email = '$email'";
        $result = mysqli_query($conn, $qurey);
        $num = mysqli_num_rows($result);

        if ($num == 1){
            while ($row = mysqli_fetch_assoc($result)){
                if (password_verify($password,$row['password'])){
                    session_start();
                    $_SESSION['loggedin']= true;
                    $_SESSION['email']= $email;
                    header('location: ../index.php');

                }
                else{
               $flag = true;
                }
            }
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Please Insert Correct Email address or Password</strong> 
</div>';
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
            background-color: antiquewhite;
        }
        #p{
            margin: 10px;
            color: red;
        }

    </style>

</head>
<body>
<div class="container">
        <section class="vh-100 mt-5">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5 mt-3">
                        <img src="logo/login.png"
                             class="img-fluid" alt="Sample image" width="90%" height="90%">
                    </div>
                    <div class="col-md-9 col-lg-7 col-xl-4 offset-xl-2" style="background-color: #eee">
                        <form action="login.php" method="post" class="mt-5">

                            <div class="container">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <?php
                                if ($flag){
                                    echo "<p id='p'>Invalid Email or Password</p>";
                                }
                                ?>
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                       placeholder="Enter a valid email address" />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control form-control-lg"
                                       placeholder="Enter password" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="create_account.php"
                                     class="link-danger">Register</a></p>
                            </div>
                            </div>
                        </form>
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