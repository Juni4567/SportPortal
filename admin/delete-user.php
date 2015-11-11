<?php
if($_GET['id']){
    $id=$_GET['id'];

    require_once("includes/db_connect.php");

    $del = "DELETE FROM users WHERE user_id='$id'";
    $result = mysqli_query($mysqli, $del);
}

