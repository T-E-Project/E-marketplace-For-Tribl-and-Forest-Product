<?php
    include 'includes/navigation_bar.php';
    $id='';
    $password ='';
    $password1 ='';
    $msg ='';
   if(isset($_GET['id']) && $_GET['id']>0){
        $id= get_safe_value($_GET['id']);
   }
   if(isset($_POST['Forgot'])){
        $password1 =get_safe_value($_POST['password1']);
        $password1=md5($password1);
        $password =get_safe_value($_POST['password']);
        $password=md5($password);
        if($password1==$password){
            mysqli_query($con,"UPDATE users SET password='$password' WHERE id='$id'");
            echo "<script>
                alert('Your Password Change Successfuly !');
            </script>";
            redirect('login');
        }else{
            $msg ="<div class='alert' role='alert'>
                Your Password Not Match Please Enter Correct Password !</a>
            </div>";
        }
   }
?>
    <!--Update Password Page -->
<div class="container login_page">
    <div class="row heading">
        <div class="col-xl-12">
            <h2>Update Now</h2>
            <p>Change Password Now</p>
        </div>
    </div>
    <?php echo $msg; ?>
    <div class="row signup-form-body">
        <div class="col-xl-6">
            <form method="post" action="">
                <div class="form-input">
                    <input type="password" name="password1" placeholder="Enter Your Password" required>
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Confoem your password" required>
                </div>
                <div class="form-input d-flex align-items-center flex-wrap">
                    <button type="submit" name="Forgot">Forgot Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--X- Update Password Page -X-->
<?php
    include 'includes/footer.php';
?>
