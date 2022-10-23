<?php
include "../connection.php";
if(isset($_POST['btnsubmit']))
{
    $img_name = basename($_FILES['img']['name']);
    $tmp_name = $_FILES['img']['tmp_name'];
    $dir = "img/";
    $setimg = move_uploaded_file($tmp_name ,$dir . $img_name);
    if(isset($setimg))
    {
        $product = $_POST['product'];
        $cat_id = $_POST['cat_id'];
        $pro_price = $_POST['pro_price'];
        $q = "insert into `products` values (null,'$product','$pro_price','$img_name','$cat_id')";
        $excute = mysqli_query($con,$q);
    }
}
$query = "select * from `categories`";
$excute = mysqli_query($con,$query);
include "function.php";
headers();
?>
<div class="container mx-auto my-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 mx-auto">
            <?php
                if(isset($excute))
                {
                    ?>
                    <div class="alert alert-success my-5">Product Successfully added</div>
                    <?php
                }            
            ?>
            <form method="post" enctype="multipart/form-data">
            <div class="mt-5">
                    <label for="products" class="form-label">Product name</label>
                    <input type="text" class="form-control" name="product">
                </div>
                <div class="mt-5">
                    <label for="Category" class="form-label">Category name</label>
                    <select name="cat_id">
                        <option>Select Categories</option>
                        <?php
                            while($rows = mysqli_fetch_assoc($excute))
                            {
                            ?>
                            <option value="<?=$rows['cat_id']?>"><?=$rows['cat_name']?></option>
                            <?php
                            }
                            ?>
                            </select>
                </div>
                <div class="mt-5">
                    <label for="product image" class="form-label">Product Price</label>
                    <input type="number" class="form-control" value="0" min="1" name="pro_price">
                </div>
                <div class="mt-5">
                    <label for="product image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="img">
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-success" name="btnsubmit">
                </div>
            </form>
            </div>
        </div>
</div>
<?php
footers();
?>