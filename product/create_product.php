<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../login_system/login.php");
    exit;
}


?>

<!doctype html>
<html lang="en">
<head>
    <title>Create Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .h2{
            padding-left: 70px;
            padding-top: 70px;
        }
    </style>

</head>
<body>
<?php
require '../navbar/header.php';
require '../database/database.php';
?>

<div class="container-fluid">
    <div class="row">


        <?php
        require '../navbar/leftbar.php';
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Create Product</h1>
            </div>
            <hr>
            <form action="/../product/save_product.php" method="post" enctype="multipart/form-data">
                <div class="row mt-4">
                    <div class="col-sm-1">
                    <label for="name"><h3>Name:</h3></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control">
                </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-1">
                    <label for="price"><h3>Price:</h3></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" name="price" id="price" class="form-control">
                </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-2">
                    <label for="price"><h3>Select image:</h3></label>
                    </div>
                    <div class="col-sm-8">
                        <input type="file" name="photo" id="photo">
                </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </main>
</div>
</div>


</body>
</html>
