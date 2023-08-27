<?php
if(!isset($_SESSION['USER_ID']))
{
   header('location:login.php');
}
session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['ROLE']);
header('location:login.php');
die();

?>