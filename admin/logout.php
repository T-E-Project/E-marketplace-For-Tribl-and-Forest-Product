<?php
session_start();
include('../includes/function.inc.php');
unset( $_SESSION['ADMIN_LOGIN']);
redirect('admin_login');
?>