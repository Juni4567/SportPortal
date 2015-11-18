<?php
if($_GET['id']){
    $user_id    = $_GET['id'];
    $dept_id    = $_GET['dept_id'];
    require_once("includes/db_connect.php");
    $update_status      ="UPDATE users SET status_id = '1' where user_id= '$user_id'";
    $run_update_status  = mysqli_query($mysqli, $update_status);
    $insert_coordinator = "INSERT INTO coordinator (user_id, dept_id) VALUES ('$user_id', '$dept_id')";
    $result             = mysqli_query($mysqli, $insert_coordinator);
}
if($_GET['reject']){
    require_once("includes/db_connect.php");
    $reject_id          = $_GET['reject'];
    $delete_coordinator = "DELETE from users WHERE user_id='$reject_id'";
    $result             = mysqli_query($mysqli, $delete_coordinator);
}