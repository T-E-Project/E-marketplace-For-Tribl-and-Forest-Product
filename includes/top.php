<?php
    session_start();
    require_once 'database.inc.php';
    include_once("constant.inc.php");
    include 'function.inc.php';

    $curStr=$_SERVER['REQUEST_URI'];
    $curArr=explode('/',$curStr);
    $cur_path=$curArr[count($curArr)-1];
    $page_title='';
    if($cur_path=='' || $cur_path=='index'){
        $page_title='Home';
    }elseif($cur_path=='about'){
        $page_title='About Us';
    }elseif($cur_path=='shop'){
        $page_title='Shop';
    }elseif($cur_path=='contact'){
        $page_title='Contact Us';
    }elseif($cur_path=='cart'){
        $page_title='Shopping Cart';
    }elseif($cur_path=='profile'){
        $page_title='Profile';
    }elseif($cur_path=='orders'){
        $page_title='Orders History';
    }elseif($cur_path=='login'){
        $page_title='Login';
    }elseif($cur_path=='registration'){
        $page_title='SignUp';
    }elseif($cur_path=='admin_login'){
        $page_title='Vendor Login';
    }elseif($cur_path=='prices'){
        $page_title='Current Market Prices';
    }elseif($cur_path=='whether'){
        $page_title='Current Whether';
    }elseif($cur_path=='forgot_password' || $cur_path=='update_password'){
        $page_title='Forgot Password';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo WEBSITE_NAME; ?>  <?php echo $page_title; ?> </title>
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
            <link rel="stylesheet" href="<?php echo WEBSITE_PATH; ?>style/prices.css">
            <link rel="stylesheet" href="<?php echo WEBSITE_PATH; ?>style/style.css">
            <link rel="stylesheet" href="<?php echo WEBSITE_PATH; ?>style/whether.css">
        <!--X-External Style Sheet  -X-->
</head>
<body onload="myloader()">
     <!--Added the loading div-->
        <div id="loading"></div>
     <!-- End loading -->