<?php
    include 'includes/navigation_bar.php';
    $id='';
    $user_id='';
    $msg ='';

    if(isset($_GET['id']) && $_GET['id']>0){
        $id = mysqli_escape_string($con,$_GET['id']);
        $user_id = $_SESSION['USER_ID'];
        $sql = mysqli_query($con,"SELECT * FROM product WHERE id = '$id'");
        $res =mysqli_fetch_assoc($sql);
       if(isset($_GET['type'])=='cart'){
            $sql = mysqli_query($con,"SELECT * FROM product WHERE id = '$id'");
            $res =mysqli_fetch_assoc($sql);
            $cart_check = mysqli_query($con,"SELECT * FROM user_cart WHERE user_id='$user_id' AND product_id='$id'");
            if(!isset($_SESSION['USER_LOGIN'])){
                header('Location:login?type=msg&page=Add to Cart');
            }else{
                if(mysqli_num_rows($cart_check)>0){
                    echo "<script>
                            alert(`Your Selected Product Alrady Cart, Please Check your Cart Detailes.`);
                        </script>";
                    redirect('shop');
                }else{
                    mysqli_query($con,"INSERT INTO user_cart(user_id,product_id,qty) VALUES('$user_id','$id','1')");
                    echo "<script>
                            alert(`Congratulation ! your product successfully Added to cart`);
                        </script>";
                    redirect('shop'); 
                }
            }
       }
    }
?>

<!-- Product Detailes -->
    <div class="container product_detailes">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Welcome !</h2>
                <p>Product Details</p>
            </div>
        </div>
        <!-- top product Section -->
            <div class="row product_detailes_body">
                <div class="col-xl-5">
                    <img src="<?php echo SITE_PRODUCT_IMAGE.$res['image']; ?>" id="big_img" alt="">
                </div>
                <!-- <div class="col-xl-1">
                    <ul>
                        <li>
                            <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" onmouseover="myfunction(this)" alt="">
                        </li>
                        <li>
                            <img src="<?php echo WEBSITE_PATH; ?>assets/products/img3.jpg" onmouseover="myfunction(this)" alt="">
                        </li>
                        <li>
                            <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" onmouseover="myfunction(this)" alt="">
                        </li>
                        <li>
                            <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" onmouseover="myfunction(this)" alt="">
                        </li>
                    </ul>
                </div> -->
                <div class="col-xl-6">
                    <h3><?php echo $res['product']; ?></h3>
                    <?php
                        $product_id=$res['id'];
                        $attei_sql = mysqli_query($con,"SELECT * FROM product_detailes WHERE product_id	='$product_id'");
                        while($row_price=mysqli_fetch_assoc($attei_sql)){
                    ?>
                        <h4>&#8377; <?php echo $row_price['price'];?> <span> for <?php echo $row_price['attribute'];?></span></h4>
                    <?php } ?>
                    <ul class="d-flex rating">
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
                    <ul class="d-flex rating">
                        <li>
                            <a href="?id=<?php echo $product_id?>&type=cart"><button class="btn">Add To Cart</button></a>
                        </li>
                        <li>
                        <a href="?id=<?php echo $product_id?>&type=buy"><button class="btn">Buy Now</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        <!--X- top product Section -X-->

        <!-- Product Description -->
            <div class="row product_det">
                <div class="col-xl-12">
                    <h2>Description</h2>
                    <h4><?php echo $res['product']; ?></h4>
                    <p><?php echo $res['product_detail']; ?></p>
                </div>
            </div>
        <!-- Product Description -->

        <!-- Our Story -->
            <div class="row mt-5">
                <div class="col-xl-12">
                    <h6>Related Products</h6>
                </div>
            </div>
            <div class="row mt-3 product_de_slider">
                <?php
                    $sub_category_id = $res['category_id'];
                    $sql_recent= mysqli_query($con,"SELECT * FROM product WHERE status='1' AND category_id='$sub_category_id'");
                    if(mysqli_num_rows($sql_recent)>1){
                    while ($row_recent = mysqli_fetch_array($sql_recent)){
                ?>
                <div class="product_body">
                        <img src="<?php echo SITE_PRODUCT_IMAGE.$row_recent['image']; ?>"  alt="">
                        <div class="product_desc">
                            <h3><?php echo $row_recent['product']; ?></h3>
                            <?php
                                $row_recent_id=$row_recent['id'];
                                $row_recent_res = mysqli_query($con,"SELECT * FROM product_detailes WHERE product_id='$row_recent_id'");
                                while($row_price_res=mysqli_fetch_assoc($row_recent_res)){
                            ?>
                                <h4>&#8377; <?php echo $row_price_res['price'];?> <span> for <?php echo $row_price_res['attribute'];?></span></h4>
                            <?php } ?>
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
                            <a href="<?php echo WEBSITE_PATH; ?>shop"><button class="btn">Shop Now</button></a>
                        </div>
                </div>
                <?php } ?>
                <?php }else{
                   $msg ="No Related Product Found !";
                } ?>
            </div>
             <h6 class="text-danger text-capitalize"><?php echo $msg?></h6>
        <!-- Our Story -->
    </div>
<!-- Product Detailes -->

<?php
    include 'includes/footer.php';
?>