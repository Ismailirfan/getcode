<?php
include "../connection.php";
$q = "select * from `orders` where order_status = 'pending'";
$excute = mysqli_query($con,$q);
include "function.php";
headers();
?>
<div class="container my-5 ms-5">
    <div class="row ms-5">
        <div class="col-md-12 my-5 ps-5 ms-5">
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
                        <th>Order Id</th>
                        <th>User Id</th>
                        <th>Shipping Address</th>
                        <th>Zip Code</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                        
                    <?php
                    while($rows = mysqli_fetch_assoc($excute))
                    {
                        ?>
                    <tr>
                        <td><?=$rows['order_id']?></td>
                        <td><?=$rows['user_id']?></td>
                        <td><?=$rows['shipping_address']?></td>
                        <td><?=$rows['zip_code']?></td>
                        <td><?=$rows['total_price']?></td>
                        <td><?=$rows['order_status']?></td>
                        <td><a class="btn btn-success" href="order_status.php?id=<?=$rows['order_id']?>">Approve</a></td>
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