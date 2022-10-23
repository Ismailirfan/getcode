<?php
include "../connection.php";
$catid = $_GET['cat_id'];
if(isset($catid))
{
    $query =  "DELETE FROM categories where cat_id = '$catid'";
    mysqli_query($con,$query);                                            
    header('location: categories.php');
    die;
}
$proid = $_GET['pro_id'];
if(isset($proid))
{
    $query =  "DELETE FROM products where pro_id = '$proid'";
    mysqli_query($con,$query);                                            
    header('location: products.php');
    die;
}
?>