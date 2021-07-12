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
                        <a href="<?php echo WEBSITE_PATH; ?>index">home</a>
                    </li>
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>about">about</a>
                    </li>
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>shop">shop</a>
                    </li>
                    <li>
                        <a href="<?php echo WEBSITE_PATH; ?>contact">contact</a>
                    </li>
                    <?php if(!isset($_SESSION['USER_LOGIN'])){?>
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>registration">signup</a>
                        </li>
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>login">login</a>
                        </li>
                    <?php }else{?>
                        <li>
                            <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello ,  <span><?php echo $_SESSION['USER_NAME']; ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo WEBSITE_PATH; ?>profile">Profile</a>
                                <a class="dropdown-item" href="<?php echo WEBSITE_PATH; ?>orders">Orders</a>
                                <a class="dropdown-item" href="<?php echo WEBSITE_PATH; ?>logout.">LogOut</a>
                            </div>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <?php if(isset($_SESSION['USER_LOGIN'])){?>
                <?php
                    $user_id=$_SESSION['USER_ID'];
                    $total_cart = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user_cart WHERE user_id='$user_id'"));
                ?>
                <div class="cart_nav">
                    <a href="<?php echo WEBSITE_PATH; ?>cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span><?php echo $total_cart; ?></span></a>
                </div>
              <?php }else{ ?>
                  <div class="cart_nav">
                    <a href="<?php echo WEBSITE_PATH; ?>cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>0</span></a>
                  </div>
                <?php } ?>  
        </nav>
    <!--X-NavBar End -X-->
