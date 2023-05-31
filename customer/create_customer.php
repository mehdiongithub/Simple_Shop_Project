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
    <title>Bootstrap 5 Example</title>
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
                <h1 class="h2">Create customer</h1>
            </div>
            <hr>
            <form action="save_customer.php" method="post" id="form">
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
                        <label for="phone"><h3>Phone:</h3></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="number" name="phone" id="phone" class="form-control">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-1">
                        <label for="address"><h3>Phone:</h3></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit"  id="customer_save" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </main>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
</script>
</html>
