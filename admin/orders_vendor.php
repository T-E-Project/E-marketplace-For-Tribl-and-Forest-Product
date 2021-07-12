<?php 
include('top.php');


$sql = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM order_master"));
$product_id= $sql['product_id'];
$added_by = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product WHERE id = '$product_id' AND added_by='".$_SESSION['ADMIN_ID']."'"));

$order_row=mysqli_query($con,"select * from order_master where product_id='".$added_by['id']."'");

?>
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
                            <th width="20%">Name/Email/Mobile</th>
							<th width="20%">Address/Zipcode</th>
							<th width="5%">Price</th>
							<th width="10%">Payment Status</th>
							<th width="10%">Order Status</th>
                            <th width="15%">Added On</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($order_row)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($order_row)){
                            $user_id=$row['user_id'];
                            $user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'"));
                            $user_profile = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user_profile WHERE user_id='$user_id'"));
						?>
						<tr>
                            <td>
								<div class="div_order_id">
									<a href="order_detailes?id=<?php echo $row['id']?>"><?php echo $row['id']?></a>
								</div>
							</td>
                            <td>
								<p><?php echo $user['name']?></p>
								<p><?php echo $user['email']?></p>
								<p><?php echo $user_profile['mobile_no']?></p>
							<td>
								<p><?php echo $user_profile['house_no']?> <?php echo $user_profile['city']?> <?php echo $user_profile['address_type']?></p>
								<p><?php echo $user_profile['pin_code']?></p>
							</td>
							<td><?php echo $row['total_price']?></td>
							<td>
								<?php 
                                    if( $row['payment_status']=='0'){ ?>
                                       <a href='?id=<?php echo $row['id'] ?>&type=success'><label class='badge badge-primary hand_cursor'>Panding</label></a>
                                   <?php }else{ ?>
									<a href='?id=<?php echo $row['id'] ?>&type=panding'><label class='badge badge-success hand_cursor'>Success</label></a>
                                   <?php } ?>
							</td>
							<td><?php echo $row['status']?></td>
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);
							echo date('d-m-Y h:s',$dateStr);
							?>
							</td>
							
                        </tr>
                        <?php 
						$i++;
						} } else { ?>
						<tr>
							<td colspan="5">No data found</td>
						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>