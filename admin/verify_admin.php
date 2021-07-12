<?php
    include '../includes/database.inc.php';
    $id='';
    $msg ='';
    if (isset($_GET['id'])){
        $id = mysqli_escape_string($con,$_GET['id']);
        mysqli_query($con,"UPDATE admin SET email_verification='1' WHERE id='$id'");
        header("Location:admin_login?id=$id");
    }

?>