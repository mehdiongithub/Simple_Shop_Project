<?php
session_start();
if ((isset($_SESSION['loggedin']) == true) || isset($_SESSION['signup']) == true){



?>

<!doctype html>
<html lang="en">
<head>

    <?php
    require 'navbar/header.php';
    require 'database/database.php';
    ?>
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

<div class="container-fluid">
    <div class="row">


        <?php
        require 'navbar/leftbar.php';

        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome to The Dashboard</h1>
                </div>
            </div>
    </main>
    </div>
</div>


</body>
</html>
<?php

}else{
    header("location: ../login_system/login.php");
    exit;

}
?>