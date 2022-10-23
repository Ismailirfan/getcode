<?php
include "../connection.php";
$q = "select * from `categories`";
$excute = mysqli_query($con,$q);
include "function.php";
headers();
?>
<div class="container my-5 ms-5">
    <div class="row ms-5">
        <div class="col-md-12 my-5  ps-5 ms-5">
            <table class="border-5 table ms-5 ps-5">
                <thead>
                <?php
                    if(mysqli_num_rows($excute) == 0)
                    {
                        ?>
                        <div class="alert alert-danger ms-5">I'm so sorry no category here please add your category</div>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>Categories Id</th>
                        <th>Categories Name</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                    while($rows = mysqli_fetch_assoc($excute))
                    {
                        ?>
                    <tr>
                        <td><?=$rows['cat_id']?></td>
                        <td><?=$rows['cat_name']?></td>
                        <td><a href="remove.php?cat_id=<?=$rows['cat_id']?>" class="btn btn-success">Delete</a></td>
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
</div>
<?php
footers();
?>	