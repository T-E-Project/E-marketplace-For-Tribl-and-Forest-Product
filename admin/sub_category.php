<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from sub_category where id='$id'");
		redirect('sub_category.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update sub_category set status='$status' where id='$id'");
		redirect('sub_category.php');
	}

}

$sql="select * from sub_category order by id desc";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Sub Category Master</h1>
			  <a href="manage_sub_category.php" class="add_link">Add Sub Category</a>
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Sub Category</th>
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
                            <td><?php echo $row['sub_category']?></td>
							<td><?php echo $row['added_by']?></td>
							<td><?php echo date("d F Y",strtotime($row['added_on']))?></td>
							<td>
								<a href="manage_sub_category.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
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