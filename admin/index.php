<?php include('top.php');
if($_SESSION['ADMIN_ROLE']=='0'){
	redirect('product');
}
?>
<div class="row">
	<div class="col-md-6 col-lg-3 grid-margin stretch-card text-center">
	  <div class="card">
		<div class="card-body">
			<?php
				$total_users = mysqli_num_rows(mysqli_query($con,"select * from users where email_verification='1'"));
			?>
		  <h1 class="font-weight-light mb-4">
			<?php echo $total_users; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">TOTAL USERS</h4>
			</div>
			<i class="mdi mdi-account icon-lg text-primary ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 text-center col-lg-3 grid-margin stretch-card">
	  <div class="card">
		<div class="card-body">
			<?php
				$total_Vendors = mysqli_num_rows(mysqli_query($con,"select * from admin where email_verification='1' and roll='0'"));
			?>
		  <h1 class="font-weight-light mb-4">
			<?php echo $total_Vendors; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">TOTAL VENDORES</h4>
			</div>
			<i class="mdi mdi-account icon-lg text-success ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card text-center">
	  <div class="card">
		  <?php
			$total_delivery_boy = mysqli_num_rows(mysqli_query($con,"select * from delivery_boy where status= '1'"));
		  ?>
		<div class="card-body">
		  <h1 class="font-weight-light mb-4">
		 	<?php echo $total_delivery_boy;?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">TOTAl DELIVERY BOY</h4>
			</div>
			<i class="mdi  mdi-cart icon-lg text-danger ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card text-center">
	  <div class="card">
		  <?php
			$total_orders = mysqli_num_rows(mysqli_query($con,"select * from order_master"));
		  ?>
		<div class="card-body">
		  <h1 class="font-weight-light mb-4">
		  		<?php echo $total_orders; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">TOTAl ORDERS</h4>
			</div>
			<i class="mdi mdi-shopping icon-lg text-info ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card text-center">
	  <div class="card">
		<div class="card-body">
			<?php 
				$pandings_orders=mysqli_num_rows(mysqli_query($con,"select * from order_master where status='Pending'"));
			?>
		  <h1 class="font-weight-light mb-4">
		 	<?php echo $pandings_orders; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">TOTAL PANDING ORDERS</h4>
			</div>
			<i class="mdi mdi-shopping icon-lg text-success ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 grid-margin stretch-card text-center">
	  <div class="card">
		<div class="card-body">
		<?php 
			$deliverd_orders = mysqli_num_rows(mysqli_query($con,"select * from order_master where status='Delivered'"))
		?>
		  <h1 class="font-weight-light mb-4">
				<?php echo $deliverd_orders; ?>
		  </h1>
		  <div class="d-flex flex-wrap align-items-center">
			<div>
			  <h4 class="font-weight-normal">TOTAl DELIVERD ORDERS</h4>
			  
			</div>
			<i class="mdi mdi-shopping icon-lg text-primary ml-auto"></i>
		  </div>
		</div>
	  </div>
	</div>
</div>
  
<?php include('footer.php');?>