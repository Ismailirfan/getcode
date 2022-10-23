<?php
include "../connection.php";
$id = $_GET['id'];
$q = "UPDATE `orders` SET order_status = 'Approved' where order_id = '$id'";
mysqli_query($con,$q);
header('location: pending_order.php');
die;
$id = $_GET['pro_id'];
$q = "DELETE FROM `categories` WHERE cat_id = '$id'";
mysqli_query($con,$q);
header('location: categories.php');
die;
$orderid = $_GET['order_id'];
$q = "DELETE FROM `orders` WHERE order_id = '$orderid'";
mysqli_query($con,$q);
header('location: approved_order.php');
die;

?>