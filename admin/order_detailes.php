<?php 
include('top.php');
include('../smtp/PHPMailerAutoload.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);

    if(isset($_GET['order_status'])){
		$order_status=get_safe_value($_GET['order_status']);
		mysqli_query($con,"update order_master set	status='$order_status' where id='$id'");
    $users_id_row = mysqli_fetch_assoc(mysqli_query($con,"select * from order_master where id='$id'"));
    $user_email_id=$users_id_row['user_id'];
    $email=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_email_id'"));
    $email_id=$email['email'];
    $name=$email['name'];
    $html="<h2>Hi, $name<br> Your Order Sussesfuly $order_status ! <br> Order Id Is $id</h2>";
    send_email($email_id,$html,'E-MarketPlace ~ Order Status');
		redirect(WEBSITE_PATH.'admin/order_detailes?id='.$id);
	}

    if(isset($_GET['delivery_boy'])){
		$delivery_boy=get_safe_value($_GET['delivery_boy']);
		mysqli_query($con,"update order_master set delivery_boy_id='$delivery_boy' where id='$id'");
		redirect(WEBSITE_PATH.'admin/order_detailes?id='.$id);
	}

    $sql = mysqli_fetch_assoc(mysqli_query($con,"select * from order_master where id='$id'"));
    $user_id =  $sql['user_id'];
    $product_id = $sql['product_id'];
    $delivery_boy_id= $sql['delivery_boy_id'];
    $delivery_boy_name = mysqli_fetch_assoc(mysqli_query($con,"select * from delivery_boy where id=' $delivery_boy_id'"));
    $user_name = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
    $user_profile = mysqli_fetch_assoc(mysqli_query($con,"select * from user_profile where user_id='$user_id'"));
    $product_info = mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
    $product_actual_price = mysqli_fetch_assoc(mysqli_query($con,"select * from product_detailes where product_id='$product_id'"));
}
?>
  <div class="page-header">
              <h3 class="page-title"> Invoice </h3>
              
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card px-2">
                  <div class="card-body">
                    <div class="container-fluid">
                      <h3 class="text-right my-5">Order ID&nbsp;&nbsp;<?php echo $id?></h3>
                      <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                        <p class="mt-5 mb-2"><b></b></p>
                        <p></p>
                      </div>
                      <div class="col-lg-3 pr-0">
                        <p class="mt-5 mb-2 text-right"><b>Invoice to</b></p>
                        <p class="text-right">
                            <?php echo $user_name['name']; ?><br>
							<?php echo $user_profile['mobile_no'] ?><br>
                            <?php echo $user_profile['house_no'] ?> <?php echo $user_profile['city'] ?><br>
                            <?php echo $user_profile['pin_code'] ?>
                            <?php echo $user_profile['address_type'] ?>
						</p>
                      </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5">Order Date : <?php $dateStr=strtotime($sql['added_on']);
							echo date('d-m-Y',$dateStr);?></p>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                        <table class="table">
                          <thead>
                            <tr class="bg-dark">
                              <th>#</th>
                              <th>Description</th>
                              <th class="text-right">Quantity</th>
                              <th class="text-right">Unit cost</th>
                              <th class="text-right">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-right">
                              <td class="text-left">1</td>
                              <td class="text-left"><?php echo $product_info['product']?></td>
                              <td><?php echo $sql['qty']; ?></td>
                              <td><?php echo $product_actual_price['price']?></td>
                              <td><?php echo $sql['total_price']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                      <h4 class="text-right mb-5">Total : <?php echo $sql['total_price']; ?></h4>
                      <hr>
                    </div>
                    <div class="container-fluid w-100">
                      <a href="../download_invoice?id=<?php echo $id?>" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i>PDF</a>
                    </div>
					<?php
					$orderStatusRes=mysqli_query($con,"select * from order_status order by id");
					
					$orderDeliveryBoyRes=mysqli_query($con,"select * from delivery_boy where status=1 order by name");
					
					?>
					<div>
						<h4>Order Status:- <?php echo $sql['status'] ?> </h4>
						
						<select class="form-control wSelect200" name="order_status" id="order_status"  onchange="updateOrderStatus()">
							<option val=''>Update Order Status</option>
                            <?php
                                while ($row_status= mysqli_fetch_assoc($orderStatusRes)){?>
                                    <option value="<?php echo $row_status['order_status']?>"><?php echo $row_status['order_status'] ?></option>
                            <?php }?>
						</select>
						<br/>
						
						    <h4>Delivery Boy:- <?php echo $delivery_boy_name['name'] ?> </h4>
					
						<select class="form-control wSelect200" name="delivery_boy" id="delivery_boy" onchange="updateDeliveryBoy()">
							<option val=''>Assign Delivery Boy</option>
                            <?php
                                while ($row_status_delivery_boy= mysqli_fetch_assoc($orderDeliveryBoyRes)){?>
                                    <option value="<?php echo $row_status_delivery_boy['id']?>"><?php echo $row_status_delivery_boy['name'] ?></option>
                            <?php }?>
						</select>
					</div>
					
                  </div>
				  
                </div>
              </div>
              
              <script>
                  function updateOrderStatus(){
                    var order_status=jQuery('#order_status').val();
                    if(order_status!=''){
                        var oid="<?php echo $id?>";
                        window.location.href='<?php echo WEBSITE_PATH ?>admin/order_detailes?id='+oid+'&order_status='+order_status;
                    }
                }

                function updateDeliveryBoy(){
                    var delivery_boy=jQuery('#delivery_boy').val();
                    if(delivery_boy!=''){
                        var oid="<?php echo $id?>";
                        window.location.href='<?php echo WEBSITE_PATH ?>admin/order_detailes?id='+oid+'&delivery_boy='+delivery_boy;
                    }
                }
              </script>
              
<?php include('footer.php');?>