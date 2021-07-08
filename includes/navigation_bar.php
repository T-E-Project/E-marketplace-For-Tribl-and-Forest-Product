<?php include 'top.php'; ?>
    <!--NavBar Start -->
        <nav class="d-flex fixed-top">
            <div class="nav_brand">
                <a href="<?php echo WEBSITE_PATH; ?>index.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Tribal & Forrest</span></a>
            </div>
            <div class="responsive_icon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="nav_menu">
                <ul class="d-flex">
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>index.php">home</a>
                    </li>
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>about.php">about</a>
                    </li>
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>shop.php">shop</a>
                    </li>
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>contact.php">contact</a>
                    </li>
                    <?php if(!isset($_SESSION['USER_LOGIN'])){?>
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>registration.php">signup</a>
                        </li>
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>login.php">login</a>
                        </li>
                    <?php }else{?>
                        <li>
                            <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello ,  <span><?php echo $_SESSION['USER_NAME']; ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Orders</a>
                                <a class="dropdown-item" href="<?php echo WEBSITE_PATH; ?>logout.php"">LogOut</a>
                            </div>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <div class="cart_nav">
                <a href="<?php echo WEBSITE_PATH; ?>cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>2</span></a>
            </div>
        </nav>
    <!--X-NavBar End -X-->
