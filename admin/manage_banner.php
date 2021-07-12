<?php 
include('top.php');
if($_SESSION['ADMIN_ROLE']=='0'){
	redirect('product');
}
$msg="";
$image="";
$heading="";
$order_number="";
$id="";
$image_status='required';
$image_error="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from banner where id='$id'"));
	$image=$row['image'];
	$heading=$row['heading'];
	$order_number=$row['order_number'];
	$image_status='';
}

if(isset($_POST['submit'])){
	$heading=get_safe_value($_POST['heading']);
	$order_number=get_safe_value($_POST['order_number']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$type=$_FILES['image']['type'];
		if($type!='image/jpeg' && $type!='image/png'){
			$image_error="Invalid image format";
		}else{		
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BANNER_IMAGE.$image);
			mysqli_query($con,"insert into banner(heading,order_number,status,added_on,image) values('$heading','$order_number',1,'$added_on','$image')");
			redirect('banner');
		}
	}else{
		if($_FILES['image']['type']==''){
			mysqli_query($con,"update banner set heading='$heading',order_number='$order_number' where id='$id'");
			redirect('banner');
		}else{
			$type=$_FILES['image']['type'];	
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format";
			}else{
				$sql = mysqli_fetch_assoc(mysqli_query($con,"select * from banner where id='$id'"));
				$old_image = unlink(SERVER_BANNER_IMAGE.$sql['image']);
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BANNER_IMAGE.$image);
			
				mysqli_query($con,"update banner set heading='$heading',order_number='$order_number',image='$image' where id='$id'");
				redirect('banner');
			}
		}
	}
}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Banner</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
					<div class="form-group">
                      <label for="exampleInputName1">Image</label>
                      <input type="file" class="form-control" placeholder="Image" name="image" <?php echo $image_status?>>
					  <div class="error mt8"><?php echo $image_error?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Heading</label>
                      <input type="text" class="form-control" placeholder="Heading" name="heading" required value="<?php echo $heading?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Order Number</label>
                      <input type="textbox" class="form-control" placeholder="Order Number" name="order_number"  value="<?php echo $order_number?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>