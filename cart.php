<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login.php?type=msg&page=Cart');
    }
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
            <div class="d-flex  shopping_cart_iteam">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="cart_iteam_desc">
                    <h3>Tomato</h3>
                    <h4 >&#8377; 32.00 <span>per kg</span></h4>
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
                <select name="qunty" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <h3>&#8377; 32.00</h3>
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <div class="d-flex shopping_cart_iteam">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="cart_iteam_desc">
                    <h3>Tomato</h3>
                    <h4 >&#8377; 32.00 <span>per kg</span></h4>
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
                <select name="qunty" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <h3>&#8377; 32.00</h3>
                <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row shopping_cart_total">
             <h3>Total : <span>&#8377; 64.00</span></h3>
        </div>
        <div class="row cart_checkout">
            <a href="<?php echo WEBSITE_PATH; ?>shop.php"><button class="btn">Continue Shopping</button></a>
            <a href="<?php echo WEBSITE_PATH; ?>shop.php"><button class="btn">Checkout Now</button></a>
        </div>
    </div>
<!--X-Cart Page-X -->

<?php
    include 'includes/footer.php';
?>