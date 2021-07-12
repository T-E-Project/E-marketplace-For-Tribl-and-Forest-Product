<?php
    include 'includes/database.inc.php';
    $id='';
    $msg ='';
    if (isset($_GET['id'])){
        $id = mysqli_escape_string($con,$_GET['id']);
        mysqli_query($con,"UPDATE users SET email_verification='1' WHERE id='$id'");
        header("Location:login?id=$id");
    }

?>
