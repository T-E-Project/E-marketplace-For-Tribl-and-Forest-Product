<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login?type=msg&page=Cart');
    }
    $qunty ='';
    $price ='';
    $type ='';
    $total='';
    $qty = '';
    $cart_total =0;
    $cart_roow='';
    $user_id = $_SESSION['USER_ID'];
    if(isset($_GET['qty']) && $_GET['qty'] >0 && $_GET['update'] && $_GET['update'] >0){
        $qty = mysqli_escape_string($con,$_GET['qty']);
        $cart_user_id = mysqli_escape_string($con,$_GET['update']);
        mysqli_query($con,"update user_cart set qty='$qty' where id='$cart_user_id'");
    }
    if(isset($_GET['id']) && $_GET['id']>0 && $_GET['type']) {
        $id = mysqli_escape_string($con,$_GET['id']);
        $type = mysqli_escape_string($con,$_GET['type']);
        if($type=='delete'){
            mysqli_query($con,"DELETE FROM user_cart WHERE id ='$id'");
            header("Location:cart");
        }
    }
    $sql = mysqli_query($con,"SELECT * FROM user_cart WHERE user_id='$user_id' ORDER BY product_id DESC");
?>

<!-- Cart Page -->
    <div class="container-fluid cart_page">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Welcome !</h2>
                <p>Your Shopping Cart</p>
            </div>
        </div>
        <div class="row shoppping_cart">
            <?php 
                if(mysqli_num_rows($sql)>0){
                    $cart_roow = mysqli_num_rows($sql);
                    while($row=mysqli_fetch_array($sql)){
                        $product_id=$row['product_id'];
                        $product_iteam = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product WHERE id='$product_id'"));
            ?>
                <div class="d-flex  shopping_cart_iteam">
                    <img src="<?php echo SITE_PRODUCT_IMAGE.$product_iteam['image']; ?>" alt="">
                    <div class="cart_iteam_desc">
                        <h3><?php echo $product_iteam['product']; ?></h3>
                        <?php
                            $attei_sql = mysqli_query($con,"SELECT * FROM product_detailes WHERE product_id	='$product_id'");
                            $row_price=mysqli_fetch_assoc($attei_sql);
                         ?>
                            <h4> &#8377; <?php echo $row_price['price'];?> <span> for <?php echo $row_price['attribute'];?></span></h4>
                        <ul class="d-flex">
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                        </ul>
                    </div>
                    <select name="qty" value="" id="qty"  onchange="updatecart()">
                            <option value="<?php echo $row['qty'] ?>"><?php echo $row['qty'] ?></option>
                        <?php $i=1;
                            while($i<6){?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php $i++; } ?>
                    </select>
                    <?php 
                        $qunty = $row['qty'];
                        $price = $row_price['price'];
                        $total = $qunty * $price;
                        $cart_total = $cart_total + $total             
                    ?>
                    <h3>&#8377; <?php echo $total ?></h3>
                   <?php $cart_row_id =$row['id']  ?>
                    <a href="?id=<?php echo $row['id'] ?>&type=delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <?php } 
            }else{
                echo "<p class='text-center text-danger'><b>You are Not Cart Any Iteam, please <a href='shop' class='text-success'> shopping Now. </a></b></p>";
            } ?>
        </div>
        <div class="row shopping_cart_total">
             <h3>Total : <span>&#8377; <?php echo $cart_total?></span></h3>
        </div>
        <div class="row cart_checkout">
            <a href="<?php echo WEBSITE_PATH; ?>shop"><button class="btn">Continue Shopping</button></a>
            <a href="<?php echo WEBSITE_PATH; ?>checkout?cart_total=<?php echo $cart_roow; ?>"><button class="btn">Checkout Now</button></a>
        </div>
    </div>
<!--X-Cart Page-X -->

<script>
    function updatecart(){
        var cart_qty=jQuery('#qty').val();
        if(cart_qty!=''){
            var oid="<?php echo $cart_row_id?>";
            window.location.href='<?php echo WEBSITE_PATH ?>cart?update='+oid+'&qty='+cart_qty;
        }
    }
</script>
<?php
    include 'includes/footer.php';
?>