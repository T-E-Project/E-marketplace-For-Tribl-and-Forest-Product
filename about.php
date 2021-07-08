<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login.php?type=msg&page=About');
    }
?>
<!-- About Us  -->
    <div class="container about_us">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Welcome !</h2>
                <p>About Us</p>
            </div>
        </div>
        <!--Mission Section-->
            <div class="row" id="subtitle">
                <div class="col-xl-12">
                    <h3>Our Mission</h3>
                </div>
            </div>
            <div class="row about_body">
                <div class="col-xl-6">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> To Desing the E-Marketplace Farmer and Tribal sell their product online and they give better prices for their products and also our team aim to develop digital farm. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
                </div>
                <div class="col-xl-6">
                    <img src="<?php echo WEBSITE_PATH; ?>assets/about/about_d1.jpg" class="img-responsive img-thumbnail img-fluid" alt="">
                </div>
            </div>
        <!--X-Mission Section-X-->

        <!--Visson Section-->
            <div class="row mt-5" id="subtitle">
                <div class="col-xl-12">
                    <h3>Our Visson</h3>
                </div>
            </div>
            <div class="row about_body">
                <div class="col-xl-6">
                    <img src="<?php echo WEBSITE_PATH; ?>assets/about/about_vission.png" class="img-responsive img-thumbnail img-fluid" alt="">
                </div>
                <div class="col-xl-6">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> Our vision is to achieve sustainable growth within India’s agricultural industry by simplifying the everyday lives of farmers throughout the country. We aim to improve the quality of life for farmers throughout India by providing the technological infrastructure necessary to create the smarter future of farming. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
                </div>
            </div>
        <!--X-Visson-X-->

        <!-- Our Story -->
             <div class="row mt-5" id="subtitle">
                <div class="col-xl-12">
                    <h3>Our Story</h3>
                </div>
            </div>
            <div class="row our_slider">
                <div class="story_body" id="story_bg">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> This web app is very helpful for tribal and farmer. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
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
                        <li>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <center>
                        <img src="<?php echo WEBSITE_PATH; ?>assets/about/about_vission.png" alt="">
                    </center>
                    <h5>Pruthviraj Rajput</h5>
                </div>
                <div class="story_body">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> This web app is very helpful for tribal and farmer. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
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
                        <li>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <center>
                        <img src="<?php echo WEBSITE_PATH; ?>assets/about/about_vission.png" alt="">
                    </center>
                    <h5>Pruthviraj Rajput</h5>
                </div>
                <div class="story_body">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> This web app is very helpful for tribal and farmer. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
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
                        <li>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <center>
                        <img src="<?php echo WEBSITE_PATH; ?>assets/about/about_vission.png" alt="">
                    </center>
                    <h5>Pruthviraj Rajput</h5>
                </div>
                <div class="story_body">
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i> This web app is very helpful for tribal and farmer. <i class="fa fa-quote-right" aria-hidden="true"></i></p>
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
                        <li>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </li>
                    </ul>
                    <center>
                        <img src="<?php echo WEBSITE_PATH; ?>assets/about/about_vission.png" alt="">
                    </center>
                    <h5>Pruthviraj Rajput</h5>
                </div>
            </div>
        <!-- Our Story -->
    </div>
<!-- X-About Us -X -->

<?php 
    include 'includes/footer.php';
?>