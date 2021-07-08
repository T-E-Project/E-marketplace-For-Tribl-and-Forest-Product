<?php 
    include 'includes/navigation_bar.php';
?>

<!-- Home Body Here -->
    <div class="container-fluid home_page">
        <div class="row home_slider">
        <?php 
            $sql = mysqli_query($con,"SELECT * FROM banner where status = '1'");
            while($row = mysqli_fetch_assoc($sql)){
        ?>
           <a href="<?php echo WEBSITE_PATH; ?>shop.php"><div class="home_banner">
                <img src="<?php echo SITE_BANNER_IMAGE.$row['image'] ?>" class="img-fluid" alt="">
            </div></a>
        <?php } ?>
        </div>
    </div>
    <div class="container product_view">
        <div class="row" id="recent_home">
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
            <div class="recent_body">
                <img src="<?php echo WEBSITE_PATH; ?>assets/products/img1.jpg" alt="">
                <div class="product_desc">
                    <h3>tomato</h3>
                    <h4>&#8377; 32.00 <span>Per Kg</span></h4>
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
                    <a href="#"><button class="btn">Shop Now</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section -->
        <div class="container-fliud services">
            <div class="row heading">
                <div class="col-xl-12">
                    <h2 class="text-white pb-2">Our Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 text-center">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <h3>Home Delivery</h3>
                    <p>With sites in 5 languages, we ship to over 200
                    countries & regions.</p>
                </div>
                <div class="col-xl-3 text-center">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <h3>Cash On Delivery</h3>
                    <p>Pay with the world’s most popular and secure
                    payment methods.</p>
                </div>
                <div class="col-xl-3 text-center">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h3>Shop with Confidence</h3>
                    <p>Our Buyer Protection covers your purchase
                        from click to delivery.</p>
                </div>
                <div class="col-xl-3 text-center">
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <h3>Return Policy</h3>
                    <p>Return Your Product In 30 Dayes</p>
                </div>
            </div>
        </div>
    <!-- Services Section -->
    <!-- Contat Us -->
        <div class="container-fluid contact mt-3">
            <div class="row heading">
                <div class="col-xl-12">
                    <h2>Get in Touch</h2>
                    <p>CONTACT INFORMATION</p>
                </div>
            </div>
            <div class="row form-body">
                <div class="col-xl-4">
                    <div class="contact-body">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="contact-info">
                            <p>155 Main Street, 17B, Brooklyn, NY</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="contact-body">
                        <div class="contact-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="contact-info">
                            <p>800-123-4567</p>
                        </div>
                    </div>
                </div>
                 <div class="col-xl-4">
                    <div class="contact-body">
                        <div class="contact-icon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="contact-info">
                            <p>example@sitename.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--X- Contact Page -X-->
<!-- Home Body Here -->


<?php 
    include 'includes/footer.php';
?>