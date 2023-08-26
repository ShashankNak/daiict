<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "daiict");
if(!$con)
{
    die('Error establishing the database');
}

?>