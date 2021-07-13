<?php
    if(isset($_GET['id']) && $_GET['id']>0){
        echo "<script>
            alert('Congractulation ! Your Email Id sussesfuly Verifed Please Login Now');
        </script>";
    }

    include 'includes/navigation_bar.php';
    $username = '';
    $password ='';
    $msg = '';
    $type = '';
    $page='';

    if(isset($_GET['type']) && $_GET['type']!='' && isset($_GET['page']) && $_GET['page']!=''){
        $type = mysqli_escape_string($con,$_GET['type']);
        $page = mysqli_escape_string($con,$_GET['page']);
        if($type=='msg'){
            $msg = "<script>
                    alert(`Your Are Not Login Please Login Now For Access $page`);
                </script>"; 
        }
    }

    if(isset($_POST['login'])){
        $username = mysqli_escape_string($con,$_POST['username']);
        $password = mysqli_escape_string($con,$_POST['password']);
        $password = md5($password);
        $check = mysqli_query($con,"select * from users where username = ' $username' AND password='$password' AND email_verification='1' AND status='1'");
        $res = mysqli_fetch_assoc($check);
        if(mysqli_num_rows($check)){
            $_SESSION['USER_LOGIN'] = 'yes';
            $_SESSION['USER_NAME'] = $res['name'];
            $_SESSION['USER_ID'] = $res['id'];
            header('Location:index');
        }else{
            $msg = "<div class='alert' role='alert'>
            Please Enter Correct Username And Password Or Verify Your Email Id</a>
            </div>";
        }
    }
?>

<!-- Login Page -->
<div class="container login_page">
    <div class="row heading">
        <div class="col-xl-12">
            <h2>Login Now</h2>
            <p>LOGIN YOUR SELF</p>
        </div>
    </div>
    <?php echo $msg; ?>
    <div class="row signup-form-body">
        <div class="col-xl-6">
            <!-- <div class="social_register">
                <button class="btn"><span><i class="fa fa-google" aria-hidden="true"></i></span> &nbsp; Login With Google </button>
                <p>OR</p>
            </div> -->
            <form method="post" action="">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter Your Username" required>
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <p class="m-0">Forgot Password?<a href="<?php echo WEBSITE_PATH; ?>forgot_password"> Here</a>.</p>
                <div class="form-input d-flex align-items-center flex-wrap">
                    <button type="submit" name="login">Login Now</button>
                    <p>You are Not Signup,Please <a href="<?php echo WEBSITE_PATH; ?>registration">signup Here</a>.</p>
                </div>
            </form>
        </div>
    </div>
</div>
<!--X- Login Page -X-->

<?php
    include 'includes/footer.php';
?>