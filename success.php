<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['ORDER_ID'])){
        redirect(FRONT_SITE_PATH.'shop');
    }
    if(isset($_GET['id']) && $_GET['id']>0){
        $id= mysqli_escape_string($con,$_GET['id']);
        mysqli_query($con,"DELETE FROM user_cart WHERE user_id ='$id'");
    }

?>

<!-- Success Message -->
    <div class="container success_page">
        <div class="row">
            <div class="col-xl-12 text-center">
                <img src="<?php echo WEBSITE_PATH; ?>assets/success.jpg" alt="">
                <h2>Your Order has been <br> placed successfully !</h2>
                <h3>Your Order Id Is ~ <?php echo $_SESSION['ORDER_ID']?></h3>
                <p>Future Communication Check Your Email.</p>
            </div>
        </div>
    </div>
<!--X- Success Message -X-->

<?php
    include 'includes/footer.php';
?>