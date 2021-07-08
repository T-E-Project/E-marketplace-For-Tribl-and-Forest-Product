<?php
    include '../includes/top.php';
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
                    alert(`Your Are Not Login Please Login Now For Access $page Page`);
                </script>"; 
        }
    }

    if(isset($_POST['login'])){
        $username = mysqli_escape_string($con,$_POST['username']);
        $password = mysqli_escape_string($con,$_POST['password']);
        $check = mysqli_query($con,"select * from admin where username = ' $username' AND password='$password' AND status='1'");
        $res = mysqli_fetch_assoc($check);
        if(mysqli_num_rows($check)){
            $_SESSION['ADMIN_LOGIN'] = 'yes';
            $_SESSION['ADMIN_NAME'] = $res['name'];
            $_SESSION['ADMIN_ID'] = $res['id'];
            header('Location:index.php');
        }else{
            $msg = "<div class='alert' role='alert'>
            Please Enter Correct Username And Password Otherwise <a href='registration.php'> SIGNUP NOW </a>
            </div>";
        }
    }
?>

<!-- Login Page -->
<div class="container login_page">
    <div class="row heading">
        <div class="col-xl-12">
            <h2>Login Now As Vendor</h2>
            <p>LOGIN YOUR SELF</p>
        </div>
    </div>
    <?php echo $msg; ?>
    <div class="row signup-form-body">
        <div class="col-xl-6">
            <div class="social_register">
                <button class="btn"><span><i class="fa fa-google" aria-hidden="true"></i></span> &nbsp; Login With Google </button>
                <p>OR</p>
            </div>
            <form method="post" action="">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter Your Username" required>
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <div class="form-input d-flex align-items-center flex-wrap">
                    <button type="submit" name="login">Login Now</button>
                    <p>You are Not Signup,Please <a href="<?php echo WEBSITE_PATH; ?>admin/registration.php">signup Here</a>.</p>
                </div>
            </form>
        </div>
    </div>
</div>
<!--X- Login Page -X-->

<?php
    include '../includes/bottum.php';
?>