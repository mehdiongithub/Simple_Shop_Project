<?php

require '../../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){





    $customer_id = $_POST['customer_id'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $total = $_POST['total'];
    $paid = $_POST['paid'];
    $remaining = $_POST['remaining'];



    $ids = $_POST["product_id"];
    $quantities = $_POST["quantity"];
    ;

    $sql = "INSERT INTO `orders` (`customer_id`, `country`, `state`, `city`, `total`, `pay_amount`, `remaining_amount`)
                            VALUES ('$customer_id', '$country', '$state', '$city', '$total', '$paid', '$remaining')";


    if ( mysqli_query($conn,$sql)){
        $last_id = mysqli_insert_id($conn);
        for ($i = 0 ; $i < count($ids) ; $i++){

            $qurey = "SELECT * from product where pno = $ids[$i]";

            $res = mysqli_query($conn,$qurey);
            $price = 0;

            while ($row = mysqli_fetch_assoc($res)){
                $price = $row['price'];
            }
            $amount = $price * $quantities[$i];

            $sql = "INSERT INTO `order_product` (`product_id` ,`oid` ,`price`,`quantity`,`total`)
            values ('$ids[$i]','$last_id','$price','$quantities[$i]','$amount')";

            $result = mysqli_query($conn, $sql);

        }

    }


}

