<?php
include "function.php";
include "connection.php";
if(isset($_GET['q']))
{
echo "<script>alert('You are not signin in your account')</script>";
}
if(isset($_POST['btnsubmit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $q = "select * from `user` where email = '$email' and password = '$password'";
    $excute = mysqli_query($con,$q);
    if(mysqli_num_rows($excute) > 0)
    {
        $rows = mysqli_fetch_assoc($excute); 
        $_SESSION['user_id'] = $rows['id'];
        $_SESSION['role'] = $rows['role_id'];
        if(isset($rows) && $rows['role_id'] == 1)
        {
            header("location:index.php?msg");
            die;
        }
        elseif(isset($rows) && $rows['role_id'] == 2)
        {
            header("location:admin/index.php?msg");
            die;
        }
    }
    elseif(mysqli_num_rows($excute) <= 0)
    {
        $alert = "<div class='alert alert-danger'>Your're not registor</div>";
    }
}
headers();
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mx-auto my-5">
            <h1 class="ms-auto">Sign In</h1>
            <?php
            if(isset($excute))
            {
            ?>
            <?=$alert?>
            <?php
            }
            ?>
            <form method="post">
                <div class="mt-5">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mt-5">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
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