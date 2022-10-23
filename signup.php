<?php
include "connection.php";
if(isset($_POST['btnsubmit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $q = "insert into `user` values (null,'$username','$age','$email','$password',2)";
    $excute = mysqli_query($con,$q);
    if($excute)
    {
        header("location:signin.php");
        die;
    }
}
include "function.php";
headers();
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mt-auto mx-auto">
        <h1 class="ms-auto">Registor</h1>
            <form method="post">
            <div class="mt-5">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mt-5">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age">
                </div>
                <div class="mt-5">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mt-5">
                    <label for="Password" class="form-label">Password</label>
                    <input type="Password" class="form-control" name="password">
                </div>
                <div class="mt-5">
                    <input type="submit"  class="btn btn-success" name="btnsubmit">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
footers();
?>