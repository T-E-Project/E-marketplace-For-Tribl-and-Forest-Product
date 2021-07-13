<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login?type=msg&page=Cart');
    }
    $user_id = $_SESSION['USER_ID'];
    $sql = mysqli_query($con,"SELECT * FROM order_master WHERE user_id='$user_id'");
?>
<!-- Order History -->
    <div class="container orders_page">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Your Orders</h2>
                <p>Order History</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"># Order No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(mysqli_num_rows($sql) >0){
                                $i=1;
                                while($row = mysqli_fetch_array($sql)){
                                  $product_id= $row['product_id'];
                                  $res=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product WHERE id='$product_id'"));
                                  $price = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product_detailes WHERE product_id='$product_id'"));
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $res['product']; ?> (<?php echo $price['price'] ?> <?php echo $price['attribute'] ?>) </td>
                            <td><?php echo $row['qty'] ?></td>
                            <td><?php echo $row['total_price'] ?></td>
                            <td>
                                <?php
                                    if($row['payment_status']=='0'){
                                ?>
                                    <button class="btn btn-primary">Panding</button>
                                <?php }else{ ?>
                                    <button class="btn btn-success">Success</button>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                    if($row['status']=='Panding'){
                                ?>
                                    <button class="btn btn-primary">Panding</button>
                                <?php }else{ ?>
                                    <button class="btn btn-success"><?php echo $row['status'] ?></button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php 
                             $i++;   }
                    }else{
                            echo "<h2 class='text-center text-danger'>No Orders Found !</h2>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!--X- Order History -X-->
<?php
    include 'includes/footer.php';
?>