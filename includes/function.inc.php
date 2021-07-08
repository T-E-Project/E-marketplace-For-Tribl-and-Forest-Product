<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($str){
	global $con;
	$str=mysqli_real_escape_string($con,$str);
	return $str;

}

function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}

function send_email($email,$html,$subject){
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="pruthvirajrajput305@gmail.com";
	$mail->Password="Pruthvi@7384";
	$mail->SetFrom("pruthvirajrajput305@gmail.comL");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject=$subject;
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		// echo "done";
	}else{
		// echo "Error occur";
	}
}

function rand_str(){
	$str=str_shuffle("abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz");
	return $str=substr($str,0,15);
	
}


function getUserCart(){
	global $con;
	$arr=array();
	$id=$_SESSION['FOOD_USER_ID'];
	$res=mysqli_query($con,"select * from dish_cart where user_id='$id'");
	while($row=mysqli_fetch_assoc($res)){
		$arr[]=$row;
	}
	return $arr;
}

function manageUserCart($uid,$qty,$attr){
	global $con;
	$res=mysqli_query($con,"select * from dish_cart where user_id='$uid' and dish_detail_id='$attr'");
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$cid=$row['id'];
		mysqli_query($con,"update dish_cart set qty='$qty' where id='$cid'");
	}else{
		$added_on=date('Y-m-d h:i:s');
		mysqli_query($con,"insert into dish_cart(user_id,dish_detail_id,qty,added_on) values('$uid','$attr','$qty','$added_on')");
	}
}

function getUserFullCart($attr_id=''){
	$cartArr=array();
	if(isset($_SESSION['FOOD_USER_ID'])){
		$getUserCart=getUserCart();
		$cartArr=array();
		foreach($getUserCart as $list){
			$cartArr[$list['dish_detail_id']]['qty']=$list['qty'];
		}
	}else{
		if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
			$cartArr=$_SESSION['cart'];	
		}
	}
	if($attr_id!=''){
		return $cartArr[$attr_id]['qty'];
	}else{
		return $cartArr;
	}
}
?>