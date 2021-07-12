<?php
   session_start();
    require_once '../includes/database.inc.php';
    include_once("../includes/constant.inc.php");
    include '../includes/function.inc.php';
    include('../smtp/PHPMailerAutoload.php');
    $name = '';
    $email = '';
    $username = '';
    $password = '';
    $msg ='';
    if(isset($_POST['signup'])){
        $name = mysqli_escape_string($con,$_POST['name']);
        $email = mysqli_escape_string($con,$_POST['email']);
        $username = mysqli_escape_string($con,$_POST['username']);
        $password = mysqli_escape_string($con,$_POST['password']);
        // $password = md5($password);
        $check = mysqli_query($con,"SELECT * FROM admin WHERE email='$email'");

        if(mysqli_num_rows($check)>0){
            $msg = "<div class='alert' role='alert'>
                        You Are Alrady Register Please <a href='login'> LOGIN NOW </a>
                    </div>";
        }else{
            mysqli_query($con,"INSERT INTO admin(name,email,username,password,roll,status,email_verification) VALUES('$name','$email',' $username','$password','0','0','0')");
            $id = mysqli_insert_id($con);
            $html=WEBSITE_PATH."admin/verify_admin?id=".$id;
            send_email($email,$html,'Verify your emain id');
            echo "<script>
                    alert('Thank you for register. Please check your email id, to verify your account');
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo WEBSITE_NAME; ?> Vendor SignUp </title>
        <!-- Favicon -->
            <link href="https://pics.freeicons.io/uploads/icons/png/8026814321579250998-512.png" rel="icon" type="image/x-icon" />
        <!-- Favicon -->

        <!-- Google Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <!--X- Google Fonts -X-->

        <!-- Font Awsome Icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--X- Font Awsome Icon -X-->

        <!-- Slick -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <!--X- Slick -X-->

        <!--Boostrap CDN -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--X- Boostrap CDN -X-->

        <!--External Style Sheet  -->
            <link rel="stylesheet" href="<?php echo WEBSITE_PATH; ?>style/style.css">
        <!--X-External Style Sheet  -X-->
</head>
<body>
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

    <!-- Registration Page -->
        <div class="container registration">
            <div class="row heading">
                <div class="col-xl-12">
                    <h2>Signup Now As Vendor</h2>
                    <p>REGISTER YOUR SELF</p>
                </div>
            </div>
                <?php echo $msg; ?>
            <div class="row signup-form-body">
                <div class="col-xl-6">
                    <!-- <div class="social_register">
                        <button class="btn"><span><i class="fa fa-google" aria-hidden="true"></i></span> &nbsp; SignUp With Google </button>
                        <p>OR</p>
                    </div> -->
                    <form method="post" action="">
                        <div class="form-input">
                            <input type="text" name="name" placeholder="Enter Your Full Name" required>
                        </div>
                        <div class="form-input">
                            <input type="email" name="email" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-input">
                            <input type="text" name="username" placeholder="Enter Your Username" required>
                        </div>
                        <div class="form-input">
                            <input type="password" name="password" placeholder="Enter Your Password" required>
                        </div>
                        <div class="form-input d-flex align-items-center flex-wrap">
                            <button type="submit" name="signup">Signup Now</button>
                            <p>You are Alrady Signup,Please <a href="<?php echo WEBSITE_PATH; ?>admin/admin_login">Login Here</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!--X- Registration Page -X-->
    <!-- Footer -->
    <div class="container-fluid footer_bg">
            <div class="row">
                <div class="col-xl-3">
                    <div class="footer_logo">
                        <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Tribal & Forrest</span></a>
                        <ul class="d-flex">
                            <li>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3">
                    <h3>Get To Know Us</h3>
                    <ul class="d-flex">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">about</a>
                        </li>
                        <li>
                            <a href="#">shop</a>
                        </li>
                        <li>
                            <a href="#">contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3">
                    <h3>Make Mony With Us</h3>
                    <ul class="d-flex footer_help">
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>admin/admin_registration"><span> <i class="fa fa-shopping-bag" aria-hidden="true"></i></span> Sell Your Product</a>
                        </li>
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>delivery_boy/login"><span>  <i class="fa fa-motorcycle" aria-hidden="true"></i></span> Delivery Boy Login</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3">
                    <h3>Let Us Help You</h3>
                    <ul class="d-flex footer_help">
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>whether">Current Whether Information.</a>
                        </li>
                        <li>
                            <a href="<?php echo WEBSITE_PATH; ?>prices">Current Market Prices.</a>
                        </li>
                        <li>
                            <a href="#">Any problem Selling With Us.</a>
                        </li>
                        <li>
                            <a href="#">Information About Platform.</a>
                        </li>
                        <li>
                            <a href="#">Live Review.</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Developer Contact -->
                <div class="row developer">
                    <h3>&copy; 2021 ~ Tribal & Farmer, All Rights Reserved.</h3>
                    <p>Designed By ~ <a href="https://github.com/T-E-Project/T.E-Project" target="_blank"> <span><i class="fa fa-github" aria-hidden="true"></i></span> Project Id ~ 17 </a></p>
                    
                </div>
            <!-- Developer Contact -->
        </div>

    <!-- Footer -->
</body>
</html>

