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
    ?>

</head>
<body>

<div class="container-fluid">
    <div class="row">


        <?php
        require '../navbar/leftbar.php';
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Orders</h1>
            </div>
            <a href="create_order.php" type="submit" class="btn btn-primary">+ NEW </a>
            <hr>

            <?php
            $sql = "Select * from orders";

            $result = mysqli_query($conn,$sql);

            $num = mysqli_num_rows($result);
            if ($num > 0){
                ?>
                <div class="table-responsive mt-4">
                    <table id="myTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>City</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Remaining</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $oid = 1;
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td> <?php echo $oid ?></td>
                                <td> <?php
                                    $sql = "select * from customer where cno = {$row['customer_id']}";
                                    $res = mysqli_query($conn,$sql);
                                    while ($customer = mysqli_fetch_assoc($res)){
                                        echo $customer['name'];
                                    }
                                     ?></td>
                                <td> <?php  $sql = "select * from city_state where cno = {$row['city']}";
                                    $res = mysqli_query($conn,$sql);
                                    while ($city = mysqli_fetch_assoc($res)){
                                        echo $city['name'];
                                    }
                                    ?></td>
                                <td> <?php echo $row['total'] ?></td>
                                <td> <?php echo $row['pay_amount'] ?></td>
                                <td> <?php echo $row['remaining_amount'] ?></td>
                                </td>
                                <td>     <a href="view_oder_detail.php?id=<?php echo $row['oid']?>" class='btn btn-primary'>View</a>

                                </td>
                            </tr>

                            <?php
                            $oid = $oid+1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <?php
            }else{
                echo '<div class="container mt-3">
  <div class="mt-4 p-3 bg-primary text-white rounded">
    <h1>There is no record in order Table</h1> 
  </div>
</div>
';
            }
            ?>




        </main>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

    $(document).ready( function () {
        
    } );
</script>
</body>

</html>
