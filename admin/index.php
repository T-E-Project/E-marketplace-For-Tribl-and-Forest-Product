<?php include('top.php');
if($_SESSION['ADMIN_ROLE']=='0'){
	redirect('product');
}
include('footer.php');?>