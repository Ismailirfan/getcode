<?php
include "function.php";
headers();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto my-5 text-center">
            <?php
        if(isset($_GET['msg']))
        {
            ?>
            <div class="alert alert-success ms-auto mt-5">Welcome to admin page</div>
            <?php
        }        
        ?>
        <h1 class="display-1 my-auto">Dashboard</h1>
        </div>
    </div>
        </div>
<?php
footers();
?>