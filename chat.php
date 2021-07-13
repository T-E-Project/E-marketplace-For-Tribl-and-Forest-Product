<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login?type=msg&page=Cart');
    }
    $user_name =$_SESSION['USER_NAME'];
    $user_id=$_SESSION['USER_ID'];

    if(isset($_POST['submit'])){
        $message= get_safe_value($_POST['message']);
        mysqli_query($con,"insert into chat(user_id,message) values('$user_id','$message')");
        redirect('chat');
    }
?>

<!-- Chat App Body -->
    <div class="container chat_app">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Welcome !</h2>
                <p>Any Problem Chat With Our Community</p>
            </div>
        </div>
        <div class="row chat_app_body">
            <div class="col-xl-12">
                <div class="Chat_User">
                    <h2>Hello ! <?php echo $user_name; ?></h2>
                    <p>Latest Chat With our community</p>
                </div>
            </div>
            <div class="col-xl-12 chat_actual_body">
                <?php
                    $sql = mysqli_query($con,"SELECT * FROM chat ORDER BY added_on"); 
                    while($res = mysqli_fetch_assoc($sql)){
                        $user_sender_id=$res['user_id'];
                        $name_sender = mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_sender_id'"));
                    ?>
                   <?php
                    if($res['user_id']!=$user_id){ 
                    ?>
                    <div class="reciver_side">
                        <p><?php echo $name_sender['name']; ?></p>
                        <h3><?php echo $res['message']; ?></h3>
                    </div>
                    <?php }else{ ?>
                    <div class="sender_side">
                        <h3><?php echo $res['message']; ?></h3>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class='col-xl-12 m-0 p-0'>
                <form method="post" action="">
                    <div class="form_input">
                        <input type="text" name="message" placeholder="Enter Message Here....">
                        <button class="btn btn-success" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Chat App Body -->

<?php include 'includes/footer.php'; ?>