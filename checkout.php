<?php
    include 'includes/navigation_bar.php';
    include('smtp/PHPMailerAutoload.php');
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login?type=msg&page=Cart');
    }

    $qunty ='';
    $price ='';

    $name = '';
    $mobile_no ='';
    $house_no='';
    $city='';
    $pin_code='';
    $address_type='';
    $product_iteam_img='';
    

    $total='';

    $cart_total =0;
    $user_id = $_SESSION['USER_ID'];
    $product_id ='';

    if(isset($_GET['cart_total'])){
        $total_cart = mysqli_escape_string($con,$_GET['cart_total']);
        if($total_cart==0){
            echo "<script>
                    alert('You are not cart any product plese cart the product.');
                </script>";
            redirect('shop');
        }
        if($total_cart!=1){
            echo "<script>
                    alert('Please Only One Iteam Checkout at a time');
                </script>";
            redirect('shop');
        }
    }

   

    $sql = mysqli_query($con,"SELECT * FROM user_cart WHERE user_id='$user_id' ORDER BY product_id DESC");
?>

<!-- Checkout Page -->
    <div class="container checkout">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Welcome !</h2>
                <p>Place Your order</p>
            </div>
        </div>
        <div class="row checkout_row">
            <div class="col-xl-6">
                <div class="checkout_sumery">
                    <h2><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp;<span>Cart Summary</span></h2>
                    <?php 
                        while($res = mysqli_fetch_assoc($sql)){
                            $product_id=$res['product_id'];
                            $product_iteam = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM product WHERE id='$product_id'"));
                            $attei_sql = mysqli_query($con,"SELECT * FROM product_detailes WHERE product_id	='$product_id'");
                            $row_price=mysqli_fetch_assoc($attei_sql);
                    ?>
                    <div class="cart_sumary_info d-flex">
                        <div class="cart_summary_iteam_details">
                            <h3><?php echo $res['qty'];?> X <span><?php echo $product_iteam['product'] ?> ( <?php echo $row_price['price'] ?> <?php echo $row_price['attribute'] ?> )</span></h3>
                            <h3>Delivery Charges</h3>
                        </div>
                        <div class="cart_iteam_total_sumary">
                            <?php
                                $qunty = $res['qty'];
                                $price = $row_price['price'];
                                $total = $qunty * $price;
                                $cart_total = $cart_total + $total;
                            ?>
                            <h3>&#8377; <span><?php echo $total; ?></span></h3>
                            <h3>FREE</h3>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="checkout_total">
                            <h3>Sub Total : <span>&#8377;  <?php echo $cart_total;?></span></h3>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-6">
                <h2>Billing Details</h2>
                <?php
                    $sql_info =mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
                    $res_row = mysqli_fetch_assoc($sql_info);
                
                    $profile = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user_profile WHERE user_id='$user_id'"));
                ?>
                <form method="post" action="">
                    <div class="form-input">
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo  $res_row['name']?>">
                    </div>
                    <div class="form-input">
                        <label for="">Mobile Number</label>
                        <input type="number" name="mobile_no" value="<?php echo  $profile['mobile_no']?>">
                    </div>
                    <div class="form-input">
                        <label for="">House / Building No</label>
                        <input type="text" name="house_no" value="<?php echo  $profile['house_no']?>">
                    </div>
                    <div class="form-input">
                        <label for="">City / Vilage</label>
                        <input type="text" name="city" value="<?php echo  $profile['city']?>">
                    </div>
                    <div class="form-input">
                        <label for="">Pin Code</label>
                        <input type="number" name="pin_code" value="<?php echo  $profile['pin_code']?>">
                    </div>
                    <div class="form-input">
                        <label for="">Type Of Address</label>
                        <select name="address_type" id="" >
                            <option value="<?php echo  $profile['address_type']?>"><?php echo  $profile['address_type']?></option>
                            <option value="Home">Home</option>
                            <option value="Work">Work</option>
                        </select>
                    </div>

                    <h2 class="mt-5">Payment Method</h2>
                    
                    <div class="payment">
                        <input type="radio" value="cod" checked="checked" name="payment"> <label for="">Cash On Delivery (COD)</label>
                    </div>
                    <p>By Clicking the button , you are agree to the <a href="#">Terms and Conditions.</a></p>
                    <div class="form-input d-flex align-items-center flex-wrap">
                        <button type="submit" name="update">Place Order Now</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
<!--X- Checkout Page -X-->

<?php

if(isset($_POST['update'])){
    $name= mysqli_escape_string($con,$_POST['name']);
    $mobile_no =mysqli_escape_string($con,$_POST['mobile_no']);
    $house_no=mysqli_escape_string($con,$_POST['house_no']);
    $city=mysqli_escape_string($con,$_POST['city']);
    $pin_code=mysqli_escape_string($con,$_POST['pin_code']);
    $address_type=mysqli_escape_string($con,$_POST['address_type']);
    $product_iteam_img = $product_iteam['image'];

    mysqli_query($con,"UPDATE users SET name='$name' WHERE id='$user_id'");
    mysqli_query($con,"UPDATE user_profile SET mobile_no='$mobile_no',house_no='$house_no',city='$city',pin_code='$pin_code',address_type='$address_type' WHERE user_id='$user_id'");
    mysqli_query($con,"INSERT INTO order_master(user_id,product_id,qty,total_price,payment_status,delivery_boy_id,status) VALUES('$user_id','$product_id','$qunty','$cart_total','0','0','Pending')");
    $insert_id=mysqli_insert_id($con);
	$_SESSION['ORDER_ID']=$insert_id;
    $order_id =$_SESSION['ORDER_ID'];
    $user_email = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'"));
    $email=$user_email['email'];
    $product_email_name = $product_iteam['product'];
    $html="
            <h2>Hi,$name<br> Your Order has been <br> placed successfully !</h2>
                <ul style='list-style-type:none;'>
                    <li>Name : <span>$name</span></li>
                    <li>Order Id : <span>$order_id</span></li>
                    <li>Email : <span>$email</span></li>
                    <li>Mobile No : <span>$mobile_no</span></li>
                    <li>Address : <span>$house_no $city $pin_code $address_type</li>
                </ul>
            </div>
            <table class='table table-striped table-responsive'>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>qunty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$product_email_name</td>
                        <td>$qunty</td>
                        <td>&#8377; $cart_total</td>
                    </tr>
                </tbody>
            </table>
            <div class='subtotal'>
                <h2>SubToal <span>&#8377;$cart_total</span></h2>
            </div>
           ";

    send_email($email,$html,'E-MarketPlace ~ Order Status');

    redirect('success?id='.$user_id);
}

    include 'includes/footer.php';
?>