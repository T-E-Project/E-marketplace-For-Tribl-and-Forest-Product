<?php
session_start();
include('../includes/database.inc.php');
include('../includes/function.inc.php');

if(!isset($_SESSION['DELIVERY_BOY_USER_LOGIN'])){
	redirect('login');
}

if(isset($_GET['id']) && $_GET['id']>0){
  $order_id = get_safe_value($_GET['id']);
  mysqli_query($con,"UPDATE order_master SET 	status='Delivered' WHERE id='$order_id'");
}


$id = 	$_SESSION['DELIVERY_BOY_ID'];

$sql = mysqli_query($con,"SELECT * FROM order_master WHERE delivery_boy_id='$id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Delivery Boy</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admin/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../admin/assets/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../admin/assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../admin/assets/css/style.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">

          </li>
          
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['DELIVERY_BOY_USER']?></span>
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
            <div class="main-panel" style="width:100%;">
               <div class="content-wrapper">
                  <div class="card">
                     <div class="card-body">
                        <h1 class="grid_title">Order Master</h1>
                        <div class="row grid_box">
                           <div class="col-12">
                              <div class="table-responsive">
                                 <table id="order-listing" class="table">
                                    <thead>
                                       <tr>
                                          <th width="5%">Order Id</th>
                                          <th width="20%">Name/Mobile</th>
                                          <th width="20%">Address/Zipcode</th>
                                          <th width="5%">Price</th>
                                          <th width="10%">Payment Status</th>
                                          <th width="10%">Order Status</th>
                                          <th width="15%">Added On</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                            if(mysqli_num_rows($sql) >0){
                                              while($row = mysqli_fetch_assoc($sql)){
                                                $user_id=$row['user_id'];
                                                $name_user =mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'"));
                                                $address = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user_profile WHERE user_id='$user_id'"));
                                      ?>
                                       <tr>
                                          <td>
                                               <?php echo $row['id']; ?>
                                          </td>
                                          <td>
                                            <p><?php echo $name_user['name'] ?></p>
                                            <p><?php echo $address['mobile_no'] ?></p>
                                          <td>
                                            <p><?php echo $address['house_no'] ?> <?php echo $address['city'] ?></p>
                                            <p><?php echo $address['pin_code'] ?> <?php echo $address['address_type'] ?></p>
                                          </td>
                                          <td style="font-size:14px;">
                                              <?php echo $row['total_price']; ?>
                                          </td>
                                          <td>
                                            <?php 
                                            if( $row['payment_status']=='0'){
                                                echo"<label class='badge badge-primary hand_cursor'>Panding</label>";
                                            }else{
                                                echo"<label class='badge badge-success hand_cursor'>Success</label>";
                                            }
                                          ?>
                                          <td><a href="?id=<?php echo $row['id']; ?>" style="text-decoration: none">Set Delivered</a></td>
                                          <td>
                                            <?php 
                                              $dateStr=strtotime($row['added_on']);
                                              echo date('d-m-Y h:s',$dateStr);
                                              ?>
                                          </td>
							
                                       </tr>
                                       <?php } ?>
                                       <?php }else{ ?>
                                        <tr>
                                          <td colspan="6">No data found</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->
               
               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../admin/assets/js/vendor.bundle.base.js"></script>
      <script src="../admin/assets/js/jquery.dataTables.js"></script>
      <script src="../admin/assets/js/dataTables.bootstrap4.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="../admin/assets/js/Chart.min.js"></script>
      <script src="../admin/assets/js/bootstrap-datepicker.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../admin/assets/js/off-canvas.js"></script>
      <script src="../admin/assets/js/hoverable-collapse.js"></script>
      <script src="../admin/assets/js/template.js"></script>
      <script src="../admin/assets/js/settings.js"></script>
      <script src="../admin/assets/js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="../admin/assets/js/data-table.js"></script>
      <!-- End custom js for this page-->
</body>
</html>