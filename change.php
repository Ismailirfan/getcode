<?php
include "connection.php";
if(isset($_GET['usd']))
{
    $q = "update `products` set pro_price = pro_price * 2000";
    $excute = mysqli_query($con,$q);
}
elseif(!($_GET['usd']))
{
    $q = "update `products` set pro_price = pro_price / 2000";
    $excute = mysqli_query($con,$q);
}
if(isset($_GET['eur']))
{
    $q = "update `products` set pro_price = pro_price * 4000";
    $excute = mysqli_query($con,$q);
}
elseif(!($_GET['eur']))
{
    $q = "update `products` set pro_price = pro_price / 4000";
    $excute = mysqli_query($con,$q);
}
if(isset($_GET['pkr']))
{
    $q = "update `products` set pro_price = pro_price * 120";
    $excute = mysqli_query($con,$q);
}
elseif(!($_GET['pkr']))
{
    $q = "update `products` set pro_price = pro_price / 120";
    $excute = mysqli_query($con,$q);
}
$location = $_SERVER['HTTP_REFERER'];
$act = $_SERVER['HTTP_REFERER'];
header("location: $act");
die;
?>