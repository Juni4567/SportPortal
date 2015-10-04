<?php
if($_GET['id']){
    $id=$_GET['id'];
//    $id = mysqli_escape_string($id);

    require_once("includes/db_connect.php");

    $del = "DELETE FROM users WHERE user_id='$id'";
    $result = mysqli_query($mysqli, $del);
//
//    $del = "DELETE from course_details where course_id = ".$id."";
//    $result = mysql_query($del);
}

