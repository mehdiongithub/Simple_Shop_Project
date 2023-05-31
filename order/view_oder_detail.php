<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
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
    <?php
     require '../navbar/header.php';
    require '../database/database.php';
  $id = $_GET['id'];
    ?>
    <style>
        #h2{
            text-align: center;
        }

        #div{
            padding-left: 4px;
            bottom: 80px;
            float: right;
            width: 330px;
            height: 280px;
            border: 3px solid #73AD21;
            margin-top: 50px;
            margin-bottom: 100px;
            margin-right: 90px;
            margin-left: 80px;
        }

    </style>

</head>
<body>

<div class="container-fluid">
    <div class="row">


        <?php
        require '../navbar/leftbar.php';
        $qurey = "Select * from orders where oid = $id";
        $run = mysqli_query($conn,$qurey);
        while ($orders = mysqli_fetch_assoc($run)){
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Customer Order View</h1>
            </div>
            <h2 id="h2"><?php
                $cus = "Select * from customer where cno = {$orders['customer_id']}";
                $answer = mysqli_query($conn,$cus);
                while ($name = mysqli_fetch_assoc($answer)){
                    echo $name['name'];
                }

                ?></h2>
            <hr>

            <?php
            $sql = "Select * from order_product where oid = $id";

            $res = mysqli_query($conn,$sql);


                ?>
                <div class="table-responsive mt-4">
                    <table id="myTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $sno = 1;
                        while ($row = mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <td><?php echo $sno ?></td>
                                <td><?php
                                    $sql = "select * from product where pno = {$row['product_id']}";
                                    $result = mysqli_query($conn,$sql);
                                    while ($customer = mysqli_fetch_assoc($result)){
                                        echo $customer['name'];
                                    }
                                    ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['total'] ?></td>
                            </tr>
                            <?php
                            $sno++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            <div id="div">
                <div class="row">

                    <!--                            // Total of Bill-->


                    <div class="col-sm-5 mt-3">
                        <label for="total" class="form-label"><h4>Total</h4></label>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <h4><?php echo $orders['total']?></h4>
                    </div>


                </div>
                <div class="row">

                    <!--                            // Payment Of Bill-->

                    <div class="col-sm-5 mt-3">
                        <label for="paid" class="form-label"><h4>Payment</h4></label>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <h4><?php echo $orders['pay_amount']?></h4>
                    </div>
                </div>
                <div class="row">


                </div>
                <hr>
                <div class="row">

                    <!--                            // Remaining Amount of Bill-->

                    <div class="col-sm-5 mt-3">
                        <label for="remaining" class="form-label"><h4>Remaining</h4></label>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <h4><?php echo $orders['remaining_amount']?></h4>
                    </div>
                </div>
            </div>



        </main>
        <?php
        }
        ?>


    </div>
</div>


</body>

</html>
