<?php
session_start();
include('../includes/database.inc.php');
include('../includes/function.inc.php');
include('../includes/constant.inc.php');

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

if(!isset($_SESSION['ADMIN_LOGIN'])){
	redirect('admin_login');
}
$page_title='';
if($cur_path=='' || $cur_path=='index'){
	$page_title='Dashboard';
}elseif($cur_path=='category' || $cur_path=='manage_category'){
	$page_title='Manage Category';
}elseif($cur_path=='sub_category' || $cur_path=='manage_sub_category'){
	$page_title='Manage Sub Category';
}elseif($cur_path=='user' || $cur_path=='manage_user'){
	$page_title='Manage User';
}elseif($cur_path=='vendores' || $cur_path=='manage_vendores'){
	$page_title='Manage Vendore';
}elseif($cur_path=='delivery_boy' || $cur_path=='manage_delivery_boy'){
	$page_title='Manage Delivery Boy';
}elseif($cur_path=='coupon_code' || $cur_path=='manage_coupon_code'){
	$page_title='Manage Coupon Code';
}elseif($cur_path=='product' || $cur_path=='manage_product'){
	$page_title='Manage Product';
}elseif($cur_path=='banner' || $cur_path=='manage_banner'){
	$page_title='Manage Banner';
}elseif($cur_path=='contact_us'){
	$page_title='Contact Us';
}elseif($cur_path=='about_us' || $cur_path=='manage_about_us'){
	$page_title='About Us';
}elseif($cur_path=='orders' || $cur_path=='order_detailes'){
	$page_title='Orders';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
  <!-- Font Awsome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--X- Font Awsome Icon -X-->
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index"></a>
          <a class="navbar-brand brand-logo-mini" href="index"></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">Welcome ! <?php echo $_SESSION['ADMIN_NAME']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <?php if($_SESSION['ADMIN_ROLE']!='0'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="index">
            <i class="fa fa-dashcube" aria-hidden="true"></i>
            <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="product">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>
              <span class="menu-title">Product</span>
            </a>
          </li>
          <?php if($_SESSION['ADMIN_ROLE']=='0'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="orders_vendor">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
            <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="orders">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['ADMIN_ROLE']!='0'){ ?>
          
          <li class="nav-item">
            <a class="nav-link" href="category">
              <i class="fa fa-copyright" aria-hidden="true"></i>&nbsp;
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sub_category">
              <i class="fa fa-copyright" aria-hidden="true"></i>&nbsp;
              <span class="menu-title">Sub Category</span>
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="user">
              <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vendores">
              <i class="fa fa-handshake-o" aria-hidden="true"></i>
              <span class="menu-title">Vendors</span>
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="delivery_boy">
              <i class="fa fa-motorcycle" aria-hidden="true"></i>
              <span class="menu-title">Delivery Boy</span>
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="coupon_code">
              <i class="fa fa-btc" aria-hidden="true"></i>&nbsp;&nbsp;
              <span class="menu-title">Coupon Code</span>
            </a>
          </li>
		  
		     
		  
		      <li class="nav-item">
            <a class="nav-link" href="banner">
              <i class="fa fa-sliders" aria-hidden="true"></i>&nbsp;&nbsp;
              <span class="menu-title">Banner</span>
            </a>
          </li>
		  
		      <li class="nav-item">
            <a class="nav-link" href="contact_us">
              <i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;
              <span class="menu-title">Contact Us</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about_us">
              <i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;
              <span class="menu-title">About Us</span>
            </a>
          </li>
		  
          <?php } ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">