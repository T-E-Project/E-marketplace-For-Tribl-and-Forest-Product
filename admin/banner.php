<?php 
include('top.php');

if($_SESSION['ADMIN_ROLE']=='0'){
	redirect('product');
}

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		$res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM banner WHERE id='$id'"));
		$oldImage = $res['image'];
		mysqli_query($con,"DELETE FROM banner WHERE id='$id'");
		unlink(SERVER_BANNER_IMAGE.$oldImage);
		redirect('banner');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update banner set status='$status' where id='$id'");
		redirect('banner');
	}
}

$sql="select * from banner order by order_number";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Banner Master</h1>
			  <a href="manage_banner" class="add_link">Add Banner</a>
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Heading</th>
							<th>Order Number</th>
							<th>Added On</th>
							<th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><img src="<?php echo SITE_BANNER_IMAGE.$row['image']?>"/></td>
							<td><?php echo $row['heading']?></td>
							<td><?php echo $row['order_number']?></td>
							<td><?php $dateStr=strtotime($row['added_on']);
							echo date('d-m-Y',$dateStr);
							?></td>
							<td>
								<a href="manage_banner?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
								<?php
								if($row['status']==1){
								?>
								<a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
								<?php
								}else{
								?>
								<a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
								<?php
								}
								
								?>
								&nbsp;
								<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
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