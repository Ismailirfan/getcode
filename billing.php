<?php
include "function.php";
include "connection.php";
if(isset($_POST['btn']) && isset($_SESSION['user_id']))
{
$user = $_SESSION['user_id'];
$firstname = $_POST['firstname'];
$lasttname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];    
        $total_price = $_POST['total_price'];
        $user = $_SESSION['user_id'];
        $shipping_address = $_POST['shipping_address'];
        $zip_code = $_POST['zip_code'];
        $q = "insert into `orders` value (null,'$user','$shipping_address','$zip_code','$total_price','pending')";
        $excute = mysqli_query($con,$q);
        if($excute)
        {
            unset($_SESSION['cart']);
        }
}
if(isset($_POST['create_account']))
{
    header("location:signup.php");
    die;
}
headers();
?>
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <?php
                        $pro_price = 0;
                        $total_price = 0;       
                        if(!isset($_SESSION['user_id']))
                        {
                            
                            ?>
                            <div class="alert alert-danger">You are not Signin please signin in your account</div>
                            <?php
                        }
                        if(!isset($_SESSION['cart']) || ($_SESSION['cart'] == 0))
                        {
                            ?>
                <div class="alert alert-danger">You are not purchasing anything. Please puchase</div>
                <?php
			}
            ?>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="firstname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="shipping_address" class="checkout__input__add">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zip_code">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc" name="create_account">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" name="password">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"  placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
            <?php
            if(isset($_SESSION['cart'])){
                $sno = 1;
                foreach($_SESSION['cart'] as $key => $value){
                    $q = "select * from `products` where pro_id = '$key'";
                    $excutecution = mysqli_query($con,$q);
                    $product = mysqli_fetch_assoc($excutecution);
                    $total_price += $product['pro_price'] * $value['qty'];
                    $pro_price += $product['pro_price'];
                    ?>
                                <ul class="checkout__total__products">
                                    <li><?=$sno?>. <?=$product['pro_name']?><span>$<?=$pro_price?></span></li>
                                </ul>
                                <?php
                                $sno++;
                            }
                        }
                                ?>
                                    <ul class="checkout__total__all">
                                    <li>Subtotal <span>$<?=@$total_price?></span></li>
                                    <li>Total <span>$<?=@$total_price?></span></li>
                                    </ul>
                                    <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or" name="create_account">
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <input type="hidden" name="total_price" value="<?=@$total_price?>">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" name="btn" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
footers();
?>		