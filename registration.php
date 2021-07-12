<?php
    include 'includes/navigation_bar.php';
    include('smtp/PHPMailerAutoload.php');
    $name = '';
    $email = '';
    $username = '';
    $password = '';
    $msg ='';
    $email_msg='';
    if(isset($_POST['signup'])){
        $name = mysqli_escape_string($con,$_POST['name']);
        $email = mysqli_escape_string($con,$_POST['email']);
        $username = mysqli_escape_string($con,$_POST['username']);
        $password = mysqli_escape_string($con,$_POST['password']);
        $password = md5($password);

        $check = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check)>0){
            $msg = "<div class='alert' role='alert'>
                        You Are Alrady Register Please <a href='login'> LOGIN NOW </a>
                    </div>";
        }else{
            mysqli_query($con,"INSERT INTO users (name,email,username,password,status,email_verification) VALUES(' $name','$email',' $username','$password','1','0')");
            $id = mysqli_insert_id($con);
            mysqli_query($con,"INSERT INTO user_profile(user_id) VALUES('$id')");
            $html=WEBSITE_PATH."verify?id=".$id;
            $email_msg ='Please Wait...';
            send_email($email,$html,'Verify Email Id');
            echo "<script>
                    alert('Thank you for register. Please check your email id, to verify your account');
                </script>";
            $email_msg ='';
        }
    }
?>

<!-- Registration Page -->
    <div class="container registration">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Signup Now</h2>
                <p>REGISTER YOUR SELF</p>
                <p class="text-center text-danger"><?php $email_msg; ?></p>
            </div>
        </div>
            <?php echo $msg; ?>
        <div class="row signup-form-body">
            <div class="col-xl-6">
                <!-- <div class="social_register">
                    <button class="btn"><span><i class="fa fa-google" aria-hidden="true"></i></span> &nbsp; SignUp With Google </button>
                    <p>OR</p>
                </div> -->
                <form method="post" action="">
                    <div class="form-input">
                        <input type="text" name="name" placeholder="Enter Your Full Name" required>
                    </div>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" placeholder="Enter Your Username" required>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" placeholder="Enter Your Password" required>
                    </div>
                    <div class="form-input d-flex align-items-center flex-wrap">
                        <button type="submit" name="signup">Signup Now</button>
                        <p>You are Alrady Signup,Please <a href="<?php echo WEBSITE_PATH; ?>login">Login Here</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--X- Registration Page -X-->

<?php
    include 'includes/footer.php';
?>