<?php
    include 'includes/navigation_bar.php';
    $c_id='';
    $user_id='';
    $selected ='';
    if(isset($_GET['c_id']) && $_GET['c_id']>0){
            $c_id = mysqli_escape_string($con,$_GET['c_id']);
            $user_id = $_SESSION['USER_ID'];
            $cart_check = mysqli_query($con,"SELECT * FROM user_cart WHERE user_id='$user_id' AND product_id='$c_id'");
            if(!isset($_SESSION['USER_LOGIN'])){
                header('Location:login?type=msg&page=Add to Cart');
            }else{
                if(mysqli_num_rows($cart_check)>0){
                    echo "<script>
                            alert(`Your Selected Product Alrady Cart, Please Check your Cart Detailes.`);
                        </script>";
                redirect('shop');
                }else{
                    mysqli_query($con,"INSERT INTO user_cart(user_id,product_id,qty) VALUES('$user_id','$c_id','1')");
                    echo "<script>
                            alert(`Congratulation ! your product successfully Added to cart`);
                        </script>"; 
                redirect('shop');
                }
            }
    }
?>

<!--Shop Page  -->
    <div class="container shopping">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Welcome !</h2>
                <p>Our Shop</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 open_filter">
                <p>Filter <span id="open_filter"><i class="fa fa-plus" aria-hidden="true"></i></span><span id="close_filter"><i class="fa fa-times" aria-hidden="true"></i></span></p>
            </div>
        </div>
    </div>
    <div class="wrapp d-flex">
        <!-- Categories Body -->
            <div class="left_side">
                <p>Categories</p>
                <div class="category_display">
                    <ul>
                        <li>
                            <div class="category_body text-center">
                                <p><a href="shop?type=forest" class="text-success">Forest Product</a> <span class="pl-2"><a href="shop?type=tribal" class="text-success">Tribal Product</a></span></p>
                            </div>
                        </li>
                        <li>
                            <div class="category_body">
                                <a href="shop"><p>All Products</p></a>
                            </div>
                        </li>
                        <?php 
                            $res_category=mysqli_query($con,"select * from category where status='1' order by order_no asc");
                            while ($categort_res=mysqli_fetch_assoc($res_category)){
                        ?>
                        <li>
                            <div class="category_body">
                                <p><?php echo $categort_res['category'] ?></p>
                                <div class="sub_category">
                                    <ul>
                                        <?php
                                            $category_name = $categort_res['category'];
                                            $sql_sub_category = mysqli_query($con,"SELECT * FROM sub_category WHERE category = '$category_name' AND status='1' ORDER BY sub_category ASC");
                                            while ($sub_cat_res = mysqli_fetch_assoc($sql_sub_category)){
                                        ?>
                                            <li>
                                                <a href="shop?id=<?php echo $sub_cat_res['id'] ?>" ><?php echo $sub_cat_res['sub_category'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <!--X- Categories Body -X-->

        <!-- Product Display Body -->
            <div class="right_side">
                <p>Our Products</p>
                <div class="row">
                    <?php
                        $product_query = "SELECT * FROM product WHERE status='1'";
                        if(isset($_GET['id']) && $_GET['id']>0){
                            $id_cat= mysqli_escape_string($con,$_GET['id']);
                            $product_query.=" and sub_category_id='$id_cat' ";
                        }
                        if(isset($_GET['type']) && $_GET['type']!=''){
                            $type_cat= mysqli_escape_string($con,$_GET['type']);
                            $product_query.=" and type='$type_cat' ";
                        }
                        $product_query.=" order by id desc";
                        $product_sql = mysqli_query($con,$product_query);
                        if(mysqli_num_rows($product_sql)>0){
                        while ($row = mysqli_fetch_array($product_sql)){
                    ?>
                    <div class="product_body">
                        <div class="view_product text-right">
                            <a href="product-detailes?id=<?php echo $row['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                        <img src="<?php echo SITE_PRODUCT_IMAGE.$row['image']?>" alt="">
                        <div class="product_desc">
                            <h3><?php echo $row['product']; ?></h3>
                            <?php
                                $product_id=$row['id'];
                                $attei_sql = mysqli_query($con,"SELECT * FROM product_detailes WHERE product_id	='$product_id'");
                                while($row_price=mysqli_fetch_assoc($attei_sql)){
                            ?>
                                <h4>&#8377; <?php echo $row_price['price'];?> <span> for <?php echo $row_price['attribute'];?></span></h4>
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
                            <a href="?c_id=<?php echo $row['id'] ?>&type=cart"><button class="btn">Add To Cart</button></a>
                        </div>
                    </div>
                    <?php } 
                    }else{ ?>
                       <p class="text-capitalize p-5 text-danger">No Product Found !<p>
                    <?php } ?>
                </div>
            </div>
        <!-- Product Display Body -->
    </div>
<!--X-Shop Page-X-->
       
<?php
    include 'includes/footer.php';
?>