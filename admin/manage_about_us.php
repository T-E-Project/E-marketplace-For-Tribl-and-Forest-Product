<?php 
include('top.php');
if($_SESSION['ADMIN_ROLE']=='0'){
	redirect('product');
}
$msg="";
$image="";
$heading="";
$message="";
$order_number="";
$id="";
$image_status='required';
$image_error="";

	if(isset($_GET['id']) && $_GET['id']>0){
		$id=get_safe_value($_GET['id']);
		$row=mysqli_fetch_assoc(mysqli_query($con,"select * from about_us where id='$id'"));
		$image=$row['image'];
		$heading=$row['heading'];
		$message=$row['message'];
		$order_number=$row['order_number'];
		$image_status='';
	}

	if(isset($_POST['submit'])){
		$heading=get_safe_value($_POST['heading']);
		$message=get_safe_value($_POST['about_detail']);
		$order_number=get_safe_value($_POST['order_number']);
		$added_on=date('Y-m-d h:i:s');
		
		if($id==''){
			$type=$_FILES['image']['type'];
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format";
			}else{		
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_ABOUT_IMAGE.$image);
				mysqli_query($con,"insert into about_us(heading,message,order_number,status,added_on,image) values('$heading','$message','$order_number',1,'$added_on','$image')");
				redirect('about_us');
			}
		}else{
			if($_FILES['image']['type']==''){
				mysqli_query($con,"update about_us set heading='$heading',message='$message',order_number='$order_number' where id='$id'");
				redirect('about_us');
			}else{
				$type=$_FILES['image']['type'];	
				if($type!='image/jpeg' && $type!='image/png'){
					$image_error="Invalid image format";
				}else{
					$sql = mysqli_fetch_assoc(mysqli_query($con,"select * from about_us where id='$id'"));
					$old_image = unlink(SERVER_ABOUT_IMAGE.$sql['image']);
					$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],SERVER_ABOUT_IMAGE.$image);
				
					mysqli_query($con,"update about_us set heading='$heading',message='$message',order_number='$order_number',image='$image' where id='$id'");
					redirect('about_us');
				}
			}
		}
	}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage About Us</h1>
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
					  <?php echo $msg;?>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3" required>About Message</label>
                      <textarea name="about_detail" class="form-control" placeholder="About Detail"><?php echo $message?></textarea>
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