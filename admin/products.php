<?php
include "../connection.php";
$q = "select * from `products` pro inner join `categories` cat on pro.cat_id = cat.cat_id";
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
                        <div class="alert alert-danger ms-5">I'm so sorry no oreder here please give us your order</div>
                        <?php
                    }
                    ?>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Ctegory Name</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                    while($rows = mysqli_fetch_assoc($excute))
                    {
                        ?>
                    <tr>
                        <td><?=$rows['pro_id']?></td>
                        <td><?=$rows['pro_name']?></td>
                        <td><?=$rows['pro_price']?></td>
                        <td><?=$rows['cat_name']?></td>
                        <td><img src="img/<?=$rows['image']?>" alt="" width="100px" height="100px"></td>
                        <td><a href="remove.php?pro_id=<?=$rows['pro_id']?>" class="btn btn-success">Delete</a></td>
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