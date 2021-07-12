<?php 
include('top.php');
if($_SESSION['ADMIN_ROLE']=='0'){
	redirect('product');
}
$msg="";
$category="";
$sub_category="";
$id="";
$admin_name="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from sub_category where id='$id'"));
	$category=$row['category'];
	$sub_category=$row['sub_category'];
}

if(isset($_POST['submit'])){
	$category=get_safe_value($_POST['category']);
	$sub_category=get_safe_value($_POST['sub_category']);
	$added_on=date('Y-m-d h:i:s');
	
	$admin_name = $_SESSION['ADMIN_NAME'];
	if($id==''){
		$sql="select * from sub_category where sub_category='$sub_category'";
	}else{
		$sql="select * from sub_category where sub_category='$sub_category' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Category already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into sub_category(category,sub_category,status,added_on,added_by) values('$category','$sub_category',1,'$added_on','$admin_name')");
		}else{
			mysqli_query($con,"update sub_category set category='$category',sub_category='$sub_category',added_by='$admin_name' where id='$id'");
		}
		
		redirect('sub_category');
	}
}
?>
		<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Sub Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
				  <div class="form-group">
                      <label for="exampleInputName1">Sub Category</label>
                      <select name="category" required class="form-control">
					  	<?php if($id==''){?>
						  <option value="">Select Category</option>
						<?php } else {?>
							<option value="<?php echo $category;?>"><?php echo $category;?></option>
						<?php } ?>
						<?php
							$sql = mysqli_query($con,"SELECT * FROM category");
							while ($row = mysqli_fetch_assoc($sql)){
						?>
							<option value="<?php echo $row['category']?>"><?php echo $row['category']?></option>
						<?php } ?>
					  </select>
					  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Sub Category</label>
                      <input type="text" class="form-control" placeholder="Category" name="sub_category" required value="<?php echo $sub_category?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>