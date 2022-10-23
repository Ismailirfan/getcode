<?php
include "../connection.php";
$q = "select * from `orders`";
$excute = mysqli_query($con,$q);
include "function.php";
headers();
?>
<div class="container ms-5 my-5">
    <div class="row ms-5">
        <div class="col-md-12 ms-5 ps-5 my-5">
            <table class="border-5 table ms-5 ps-5">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>User Id</th>
                        <th>Shipping Address</th>
                        <th>Zip Code</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Delete Order</th>
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
                        <td><a href="order_status.php?order_id=<?=$rows['order_id']?>" class="btn btn-success">Delete Your Order</a></td>
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