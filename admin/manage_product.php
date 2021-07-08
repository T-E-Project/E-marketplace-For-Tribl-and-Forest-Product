<?php 
include('top.php');

$msg="";
$category_id="";
$sub_category_id ='';
$product="";
$product_detail="";
$image="";
$type="";
$id="";
$image_status='required';
$image_error="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$id'"));
	$category_id=$row['category_id'];
	$sub_category_id=$row['sub_category_id'];
	$product=$row['product'];
	$type=$row['type'];
	$product_detail=$row['product_detail'];
	$image=$row['image'];
	$image_status='';
	$admin_name ='';
}


if(isset($_POST['submit'])){
	
	$category_id=get_safe_value($_POST['category_id']);
	$sub_category_id=get_safe_value($_POST['sub_category_id']);
	$product=get_safe_value($_POST['product']);
	$product_detail=get_safe_value($_POST['product_detail']);
	$product_type=get_safe_value($_POST['type']);
	$added_on=date('Y-m-d h:i:s');

	$admin_name = $_SESSION['ADMIN_NAME'];
	
	if($id==''){
		$sql="select * from product where product='$product'";
	}else{
		$sql="select * from product where product='$product' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Product already added";
	}else{
		$type=$_FILES['image']['type'];
		if($id==''){
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format please select png/jpeg format";
			}else{
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PRODUCT_IMAGE.$image);
				mysqli_query($con,"insert into product(category_id,sub_category_id,product,product_detail,status,added_on,image,type,added_by) values('$category_id','$sub_category_id','$product','$product_detail',1,'$added_on','$image','$product_type','$admin_name')");
				$did=mysqli_insert_id($con);
				
				$attributeArr=$_POST['attribute'];
				$priceArr=$_POST['price'];
				$attri =mysqli_query($con,"select * from product_detailes where attribute='$attributeArr' and product_id='$id'");
			
					foreach($attributeArr as $key=>$val){
						$attribute=$val;
						$price=$priceArr[$key];
						mysqli_query($con,"insert into product_detailes(product_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')");
					}
				redirect('product.php');
			}
		}else{
			if($_FILES['image']['type']==''){
                mysqli_query($con,"UPDATE product SET category_id='$category_id', sub_category_id='$sub_category_id',product='$product',product_detail='$product_detail',image='$image',type='$product_type',added_by='$admin_name' WHERE id='$id'");
				$attributeArr=$_POST['attribute'];
				$priceArr=$_POST['price'];
				$productDetailsIdArr=$_POST['product_details_id'];
				foreach($attributeArr as $key=>$val){
					$attribute=$val;
					$price=$priceArr[$key];
					
					if(isset($productDetailsIdArr[$key])){
						$did=$productDetailsIdArr[$key];
						mysqli_query($con,"update product_detailes set attribute='$attribute',price='$price' where id='$did'");
					}else{
						mysqli_query($con,"insert into product_detailes(product_id,attribute,price,status,added_on) values('$id','$attribute','$price',1,'$added_on')");
					}
					
					
					//echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
				}
				redirect('product.php');
            }else 
				if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format please select png/jpeg format";
				}else{
				$sql = mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$id'"));
				$old_image = unlink(SERVER_PRODUCT_IMAGE.$sql['image']);
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PRODUCT_IMAGE.$image);
				mysqli_query($con,"UPDATE product SET category_id='$category_id',sub_category_id='$sub_category_id',product='$product',product_detail='$product_detail',image='$image',type='$product_type',added_by='$admin_name' WHERE id='$id'");
				
				foreach($attributeArr as $key=>$val){
					$attribute=$val;
					$price=$priceArr[$key];
					
					if(isset($productDetailsIdArr[$key])){
						$did=$productDetailsIdArr[$key];
						mysqli_query($con,"update product_detailes set attribute='$attribute',price='$price' where id='$did'");
					}else{
						mysqli_query($con,"insert into product_detailes(product_id,attribute,price,status,added_on) values('$id','$attribute','$price',1,'$added_on')");
					}
					
					
					//echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
				}
				redirect('product.php');
				}
		
			}
		}
}
$res_category=mysqli_query($con,"select * from category where status='1' order by order_no");
$res_sub_category=mysqli_query($con,"select * from sub_category where status='1'");
$arrType=array("tribal","forest");
?>

<div class="row">
			<h1 class="grid_title ml10 ml15">Product</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select class="form-control" name="category_id" required>
						<option value="">Select Category</option>
						<?php
						while($row_category=mysqli_fetch_assoc($res_category)){
							if($row_category['id']==$category_id){
								echo "<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
							}else{
								echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Sub Category</label>
                      <select class="form-control" name="sub_category_id" required>
						<option value="">Select Category</option>
						<?php
						while($row_sub_category=mysqli_fetch_assoc($res_sub_category)){
							if($row_sub_category['id']==$sub_category_id){
								echo "<option value='".$row_sub_category['id']."' selected>".$row_sub_category['sub_category']."</option>";
							}else{
								echo "<option value='".$row_sub_category['id']."'>".$row_sub_category['sub_category']."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Product</label>
                      <input type="text" class="form-control" placeholder="Product" name="product" required value="<?php echo $product?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Type</label>
                      <select class="form-control" name="type" required>
						<option value="">Select Type</option>
						<?php 
						foreach($arrType as $list){
							if($list==$type){
								echo "<option value='$list' selected>".strtoupper($list)."</option>";
							}else{
								echo "<option value='$list'>".strtoupper($list)."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Product Detail</label>
                      <textarea name="product_detail" class="form-control" placeholder="Dish Detail"><?php echo $product_detail?></textarea>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3">Product Image</label>
                      <input type="file" class="form-control" placeholder="Product Image" name="image" <?php echo $image_status?>>
					  <div class="error mt8"><?php echo $image_error?></div>
                    </div>
					<div class="form-group" id="dish_box1">
						<label for="exampleInputEmail3">Product Attributes</label>
						<?php if($id==0){?>
						<div class="row">
							<div class="col-5">
								<input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required>
							</div>
							<div class="col-5">
								<input type="text" class="form-control" placeholder="Price" name="price[]" required>
							</div>
						</div>
						<?php } else{
						$product_details_res=mysqli_query($con,"select * from product_detailes where product_id='$id'");
						$ii=1;
						while($product_details_row=mysqli_fetch_assoc($product_details_res)){
						?>
						<div class="row mt8">
							<div class="col-5">
								<input type="hidden" name="product_details_id[]" value="<?php echo $product_details_row['id']?>">
								<input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required value="<?php echo $product_details_row['attribute']?>">
							</div>
							<div class="col-5">
								<input type="text" class="form-control" placeholder="Price" name="price[]" required  value="<?php echo $product_details_row['price']?>">
							</div>
							<?php if($ii!=1){
							?>
							<div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick="remove_more_new('<?php echo $product_details_row['id']?>')">Remove</button></div>
							
							<?php
							}
							?>
						</div>
						<?php 
						$ii++;
						} } ?>
					</div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>

					<button type="button" class="btn badge-danger mr-2" onclick="add_more()">Add More</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
		 <input type="hidden" id="add_more" value="1"/>
        <script>
			function add_more(){
				var add_more=jQuery('#add_more').val();
				add_more++;
				jQuery('#add_more').val(add_more);
				var html='<div class="row mt8" id="box'+add_more+'"><div class="col-5"><input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required></div><div class="col-5"><input type="text" class="form-control" placeholder="Price" name="price[]" required></div><div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
				jQuery('#dish_box1').append(html);
			}
			
			function remove_more(id){
				jQuery('#box'+id).remove();
			}
			
			function remove_more_new(id){
				var result=confirm('Are you sure?');
				if(result==true){
					var cur_path=window.location.href;
					window.location.href=cur_path+"&dish_details_id="+id;
				}
			}	
		</script>
<?php include('footer.php');?>