<?php
include("db_connect.php");
session_start();
$username =  $_SESSION['username'];

if(!$_SESSION['username']){
header ('location:logout.php');
}
?>
