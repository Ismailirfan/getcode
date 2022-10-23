<?php
include "connection.php";
include "function.php";
if(isset($_SESSION['cart']) && $_SESSION['cart'] == 0 && isset($key))
{
    $qty_to_add = $_POST['qty'];
    if(isset($_SESSION['cart']))
    {
    $old_qty = $_SESSION['cart'][$key]['qty'];
    $_SESSION['cart'][$key]['qty'] = $old_qty + $qty_to_add;
}
else
{
    $_SESSION['cart'][$key]['qty'] = $qty_to_add;
}
}
headers();
?>
<section class="breadcrumb-option">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb__text">
<h4>Shopping Cart</h4>
<div class="breadcrumb__links">
<a href="./index.html">Home</a>
<a href="./shop.html">Shop</a>
<span>Shopping Cart</span>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="shopping-cart spad">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="shopping__cart__table">
<table>
<thead>
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Total</th>
<th></th>
</tr>
</thead>
<form method="post">
<tbody>
    <?php
    $total_price = 0;
    $error = "";
    if(!isset($_SESSION['user_id']))
    {
        ?>
    <div class="alert alert-danger">Your are not login please login.</div>
        <?php
    }
    elseif(!isset($_SESSION['cart']))
    {
        ?>
        <div class="alert alert-danger">You are not purchase any things</div>
        <?php
    }
else
{
     if(count($_SESSION['cart']) == 0)
    {
        ?>
        <div class="alert alert-danger">No Item in your cart</div>
        <?php
    }else
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            $q = "select * from `products` where pro_id = '$key'";
            $res = mysqli_query($con,$q);
            $product = mysqli_fetch_assoc($res);
            $total_price += $product['pro_price'] * $value['qty'];
            ?>
            <tr>
<td class="product__cart__item">
<div class="product__cart__item__pic">
<img src="admin/img/<?=$product['image']?>" width="100px" height="100px" alt="" data-pagespeed-url-hash="3331041066" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</div>
<div class="product__cart__item__text">
<h6><?=$product['pro_name']?></h6>
<h5>$<?=$product['pro_price']?></h5>
</div>
</td>
<td class="quantity__item">
<div class="quantity">
<div class="pro-qty-2">
<input type="text" name="total" value="<?=$value['qty']?>">
</div>
</div>
</td>
<td class="cart__price">$<?=$total_price?></td>
<td class="cart__close"><a href="removeitem.php?id=<?=$key?>"><i class="fa fa-close"></i></a></td>
</tr>
<?php
}}}
?>
</tbody>
</table>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="continue__btn">
            <?php
if(isset($key))
{
    $q = "select * from `products` where pro_id = '$key'";
    $excute = mysqli_query($con,$q);
    $rows = mysqli_fetch_assoc($excute);
?>
<a href="product_spec.php?id=<?=$rows['pro_id']?>">Continue Shopping</a>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="continue__btn update__btn">
    <?php
}
?>
<button type="submit" name="btnsubmit" class="btn btn-success"><i class="fa fa-spinner"></i>Update cart</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="cart__discount">
<h6>Discount codes</h6>
<input type="text" placeholder="Coupon code">
<button type="submit">Apply</button>
</form>
</div>
<div class="cart__total">
<h6>Cart total</h6>
<ul>
<li>Subtotal <span>$<?=$total_price?></span></li>
<li>Total <span>$<?=$total_price?></span></li>
</ul>
<a href="billing.php" class="primary-btn">Proceed to checkout</a>
</div>
</div>
</div>
</div>
</section>

<?php
footers();
?>