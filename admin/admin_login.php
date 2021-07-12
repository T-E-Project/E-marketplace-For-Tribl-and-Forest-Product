<?php
    if(isset($_GET['id']) && $_GET['id']>0){
        echo "<script>
            alert('Congractulation ! Your Email Id sussesfuly Verifed Please Login Now');
        </script>";
    }
    session_start();
    require_once '../includes/database.inc.php';
    include_once("../includes/constant.inc.php");
    include '../includes/function.inc.php';
    include('../smtp/PHPMailerAutoload.php');
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
        // $password = md5($password);
        // echo $password;
        $check = mysqli_query($con,"SELECT * FROM admin WHERE username = ' $username' AND password='$password' AND email_verification='1'");
        $res = mysqli_fetch_assoc($check);
        if(mysqli_num_rows($check)){
            $_SESSION['ADMIN_LOGIN'] = 'yes';
            $_SESSION['ADMIN_NAME'] = $res['name'];
            $_SESSION['ADMIN_ID'] = $res['id'];
            $_SESSION['ADMIN_ROLE'] = $res['roll'];
            header('Location:index');
        }else{
            $msg = "<div class='alert' role='alert'>
            Please Enter Correct Username And Password Otherwise <a href='admin_registration'> SIGNUP NOW </a>
            </div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo WEBSITE_NAME; ?>  Vendor Login</title>
        <!-- Favicon -->
            <link href="https://pics.freeicons.io/uploads/icons/png/8026814321579250998-512.png" rel="icon" type="image/x-icon" />
        <!-- Favicon -->

        <!-- Google Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <!--X- Google Fonts -X-->

        <!-- Font Awsome Icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--X- Font Awsome Icon -X-->

        <!-- Slick -->
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <!--X- Slick -X-->

        <!--Boostrap CDN -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--X- Boostrap CDN -X-->

        <!--External Style Sheet  -->
            <link rel="stylesheet" href="<?php echo WEBSITE_PATH; ?>style/style.css">
        <!--X-External Style Sheet  -X-->
</head>
<body>
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
                        <p>You are Not Signup,Please <a href="<?php echo WEBSITE_PATH; ?>admin/admin_registration">signup Here</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--X- Login Page -X-->

</body>
</html>
