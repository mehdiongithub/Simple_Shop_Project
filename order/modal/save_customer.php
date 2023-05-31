<?php

require '../../database/database.php';


$customer = $_POST['customer_name'];
$address = $_POST['customer_address'];
$phone = $_POST['customer_phone'];

$sql = "INSERT INTO `customer` (`name` ,`phone`,`address`) values ('$customer','$phone','$address')";

$result = mysqli_query($conn, $sql);


