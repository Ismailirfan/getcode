<?php
include "../connection.php";
if(isset($_POST['btnsubmit']))
{
    $cat_name = $_POST['cat_name'];
    $q = "insert into `categories` values (null,'$cat_name')";
    $excute = mysqli_query($con,$q);
}
include "function.php";
headers();
?>
<div class="container mx-auto my-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8 mx-auto my-5">
            <?php
                if(isset($excute))
                {
                    ?>
                    <div class="alert alert-success">Categories Successfully added</div>
                    <?php
                }            
            ?>
            <form method="post">
            <div class="mt-auto">
                    <label for="Category" class="form-label">Category name</label>
                    <input type="text" class="form-control" name="cat_name">
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