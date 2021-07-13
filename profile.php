<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login?type=msg&page=Cart');
    }
    $user_id= $_SESSION['USER_ID'];
    $sql =mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
    $res = mysqli_fetch_assoc($sql);

    $profile = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user_profile WHERE user_id='$user_id'"));
?>

<!-- profile body -->

    <div class="container profile">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Your Profile</h2>
                <p>Update Now</p>
            </div>
            <div class="update_profile">
                    <a href="<?php echo WEBSITE_PATH; ?>manage_user_profile?type=update"><button class="btn">Update Now</> &nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                    <a href="<?php echo WEBSITE_PATH; ?>manage_user_profile?type=add"><button class="btn">Insert Now &nbsp; <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            </div>
        </div>
        <!-- Personal Info -->
            <div class="row personal_info">
                <div class="col-xl-6 personal_info_row">
                    <p>Personal Information</p>
                    <div class="prosonal_filed">
                        <ul>
                            <li>Name : <span><?php echo $res['name'];?></span></li>
                            <li>Email Id : <span><?php echo $res['email'];?></span></li>
                            <li>Mobile No : <span><?php echo $profile['mobile_no']?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        <!--X- Personal Info -X-->
        <!-- Address Info -->
            <div class="row personal_info">
                <div class="col-xl-6 personal_info_row">
                    <p>Address</p>
                    <div class="prosonal_filed">
                        <ul>
                            <li>House / Building No : <span><?php echo $profile['house_no']?></span></li>
                            <li>City / Vilage : <span><?php echo $profile['city']?></span></li>
                            <li>Pin Code : <span><?php echo $profile['pin_code']?></span></li>
                            <li>Type Of Address : <span><?php echo $profile['address_type']?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        <!--X- Address Info -X-->
        <!-- Account Info -->
            <div class="row personal_info">
                <div class="col-xl-6 personal_info_row">
                    <p>Account Details</p>
                    <div class="prosonal_filed">
                        <ul>
                            <li>User Name : <span><?php echo $res['username'];?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        <!--X- Account Info -X-->
    </div>

<!--X- profile body -X-->

<?php
    include 'includes/footer.php';
?>