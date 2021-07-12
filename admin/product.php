<?php 
include('top.php');
$condition ='';
$condition1 ='';
if($_SESSION['ADMIN_ROLE']=='0'){
	$condition=" and product.added_by='".$_SESSION['ADMIN_ID']."'" ;
	$condition1=" and added_by='".$_SESSION['ADMIN_ID']."'" ;
}

$oldImage ='';
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update product set status='$status' $condition1 where id='$id'");
		redirect('product');
	}

	if($type == 'delete'){
		$res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product $condition1 WHERE id='$id'"));
		$oldImage = $res['image'];
		mysqli_query($con,"DELETE FROM product WHERE id='$id'");
		mysqli_query($con,"DELETE FROM product_detailes WHERE product_id='$id'");
		unlink(SERVER_PRODUCT_IMAGE.$oldImage);
		redirect('product');
	}

}


$sql="select product.*,category.category from product,category where product.category_id=category.id $condition order by product.id desc";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Product Master</h1>
			  <a href="manage_product" class="add_link">Add Product</a>
			  <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Product</th>
							<th>Image</th>
							<th>Added By</th>
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
                            <td><?php echo $row['category']?></td>
							<td><?php echo $row['product']?> (<?php echo strtoupper($row['type'])?>)</td>
							<td><a target="_blank" href="<?php echo SITE_PRODUCT_IMAGE.$row['image']?>"><img src="<?php echo SITE_PRODUCT_IMAGE.$row['image']?>"/></a></td>
							<td><?php echo $row['added_by']?></td>
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);
							echo date('d-m-Y',$dateStr);
							?>
							</td>
							<td>
								<a href="manage_product?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
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