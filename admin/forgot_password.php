<?php
    session_start();
    require_once '../includes/database.inc.php';
    include_once("../includes/constant.inc.php");
    include '../includes/function.inc.php';
    include('../smtp/PHPMailerAutoload.php');
    $email = '';
    $msg='';
    if(isset($_POST['signup'])){
        $email = mysqli_escape_string($con,$_POST['email']);
        $check = mysqli_query($con,"SELECT * FROM admin WHERE email='$email'");

        if(mysqli_num_rows($check)==0){
            $msg = "<div class='alert' role='alert'>
                        You Are Not Register Please <a href='admin/registration'> SIGNUP NOW </a>
                    </div>";
        }else{
            $sql = mysqli_fetch_assoc($check);
            $id= $sql['id'];
            $html=WEBSITE_PATH."admin/update_password?id=".$id;
            send_email($email,$html,'Forgot Password');
            echo "<script>
                    alert('Forget Password Link Shared Your Email Id ');
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo WEBSITE_NAME; ?>  Vendor Forgot Password</title>
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

</body>
</html>