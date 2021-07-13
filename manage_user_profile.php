<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login?type=msg&page=Cart');
    }
    $type ='';
    $name = '';
    $email = '';
    $mobile_no ='';
    $house_no='';
    $city='';
    $pin_code='';
    $address_type='';
    $username = '';

    $user_id= $_SESSION['USER_ID'];
    $required = '';
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type = mysqli_escape_string($con,$_GET['type']);
        if($type=='update'){
            $required = '';
            $res = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
            $name = $res['name'];
            $email = $res['email'];
            $username = $res['username'];

            $user_profile = mysqli_fetch_assoc(mysqli_query($con,"select * from user_profile where user_id='$user_id'"));

            $mobile_no =$user_profile['mobile_no'];
            $house_no=$user_profile['house_no'];
            $city=$user_profile['city'];
            $pin_code=$user_profile['pin_code'];
            $address_type=$user_profile['address_type'];
        }
    }
    
    if(isset($_POST['update'])){
        $name= mysqli_escape_string($con,$_POST['name']);
        $email = mysqli_escape_string($con,$_POST['email']);
        $mobile_no =mysqli_escape_string($con,$_POST['mobile_no']);
        $house_no=mysqli_escape_string($con,$_POST['house_no']);
        $city=mysqli_escape_string($con,$_POST['city']);
        $pin_code=mysqli_escape_string($con,$_POST['pin_code']);
        $address_type=mysqli_escape_string($con,$_POST['address_type']);
        $username =mysqli_escape_string($con,$_POST['username']);

        if($type=='update'){
            mysqli_query($con,"UPDATE users SET name='$name',email='$email',username='$username' WHERE id='$user_id'");

            mysqli_query($con,"UPDATE user_profile SET user_id='$user_id',mobile_no='$mobile_no',house_no='$house_no',city='$city',pin_code='$pin_code',address_type='$address_type' WHERE user_id='$user_id'");

            echo "<script>
                alert('Congratulation ! Your Profile Successful Updated.');
            </script>";

            redirect('index');
        }else{
            $check = mysqli_query($con,"select * from user_profile where user_id='$user_id'");
            if(mysqli_num_rows($check)>0){
                echo "<script>
                        alert('You are Alrady Inserted Your Profile Plese any changes update now');
                    </script>";
                redirect('profile');
            }else{
                mysqli_query($con,"INSERT INTO user_profile(user_id,mobile_no,house_no,city,pin_code,address_type) VALUES('$user_id','$mobile_no','$house_no','$city','$pin_code','$address_type')");
                echo "<script>
                        alert('Congratulation ! Your Profile Successful Updated.');
                    </script>";
                redirect('index');
            }
        }
    }
?>

<!-- profile body -->
    <div class="container profile">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Your Profile</h2>
                <p>Update Now</p>
            </div>
        </div>
        <div class="row profile_form">
            <div class="col-xl-6">
                <p>Personal Information</p>
                <form method="post" action="">
                    <?php if($type!='add'){ ?>
                        <div class="form-input">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?php echo $name ?>" <?php echo $required; ?>>
                        </div>
                    
                        <div class="form-input">
                            <label for="">Email Id</label>
                            <input type="email" name="email" value="<?php echo $email ?>" <?php echo $required; ?>>
                        </div>
                    <?php } ?>
                    <div class="form-input">
                        <label for="">Mobile Number</label>
                        <input type="number" name="mobile_no" value="<?php echo $mobile_no ?>" <?php echo $required; ?>>
                    </div>

                    <p class="p-3">Manage your Address</p>

                    <div class="form-input">
                        <label for="">House / Building No</label>
                        <input type="text" name="house_no" value="<?php echo $house_no ?>" <?php echo $required; ?>>
                    </div>
                    <div class="form-input">
                        <label for="">City / Vilage</label>
                        <input type="text" name="city" value="<?php echo $city ?>" <?php echo $required; ?>>
                    </div>
                    <div class="form-input">
                        <label for="">Pin Code</label>
                        <input type="number" name="pin_code" value="<?php echo $pin_code ?>" <?php echo $required; ?>>
                    </div>
                    <div class="form-input">
                        <label for="">Type Of Address</label>
                        <select name="address_type" id="" <?php echo $required; ?>>
                           <?php if($type!='update'){ ?>
                            <option value="<?php echo $address_type ?>"><?php echo $address_type ?></option>
                           <?php }else{ ?>
                                <option value="">Sellect Address Type</option>
                            <?php } ?>
                            <option value="Home">Home</option>
                            <option value="Work">Work</option>
                        </select>
                    </div>
                   <?php if($type!='add'){ ?>
                        <p class="p-3">Manage your Account</p>

                        <div class="form-input">
                            <label for="">Username</label>
                            <input type="text" name="username" value="<?php echo $username ?>"  <?php echo $required; ?>>
                        </div>
                    <?php } ?>
                    <div class="form-input d-flex align-items-center flex-wrap">
                        <button type="submit" name="update">Update Now</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
<!--X- profile body -X-->

<?php
    include 'includes/footer.php';
?>