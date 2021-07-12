<?php
     session_start();
     require_once '../includes/database.inc.php';
     include_once("../includes/constant.inc.php");
     include '../includes/function.inc.php';
     include('../smtp/PHPMailerAutoload.php');
    $id='';
    $password ='';
    $password1 ='';
    $msg ='';
   if(isset($_GET['id']) && $_GET['id']>0){
        $id= get_safe_value($_GET['id']);
   }
   if(isset($_POST['Forgot'])){
        $password1 =get_safe_value($_POST['password1']);
        $password =get_safe_value($_POST['password']);
        if($password1==$password){
            mysqli_query($con,"UPDATE admin SET password='$password' WHERE id='$id'");
            echo "<script>
                alert('Your Password Change Successfuly !');
            </script>";
            redirect('admin_login');
        }else{
            $msg ="<div class='alert' role='alert'>
                Your Password Not Match Please Enter Correct Password !</a>
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
</body>
</html>