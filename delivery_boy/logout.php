<?php
session_start();
include('../includes/function.inc.php');
unset($_SESSION['DELIVERY_BOY_USER_LOGIN']);
unset($_SESSION['DELIVERY_BOY_USER']);
unset($_SESSION['DELIVERY_BOY_ID']);
redirect('login');
?>
