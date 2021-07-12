<?php
    include 'includes/navigation_bar.php';
    include('smtp/PHPMailerAutoload.php');
    $email = '';
    $msg='';
    if(isset($_POST['signup'])){
        $email = mysqli_escape_string($con,$_POST['email']);
        $check = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check)==0){
            $msg = "<div class='alert' role='alert'>
                        You Are Not Register Please <a href='registration'> SIGNUP NOW </a>
                    </div>";
        }else{
            $sql = mysqli_fetch_assoc($check);
            $id= $sql['id'];
            $html=WEBSITE_PATH."update_password?id=".$id;
            send_email($email,$html,'Forgot Password');
            echo "<script>
                    alert('Forget Password Link Shared Your Email Id ');
                </script>";
        }
    }
?>

<!-- Forgot Page -->
    <div class="container registration">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Forgot Password</h2>
                <p>Change Password Here</p>
                <p class="text-center text-danger"><?php $email_msg; ?></p>
            </div>
        </div>
            <?php echo $msg; ?>
        <div class="row signup-form-body">
            <div class="col-xl-6">
                <form method="post" action="">
                    <div class="form-input">
                        <input type="email" name="email" placeholder="Enter Your Email Id for Forgot Password " required>
                    </div>
                    <div class="form-input d-flex align-items-center flex-wrap">
                        <button type="submit" name="signup">Send Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--X- Forgot Page -X-->

<?php
    include 'includes/footer.php';
?>