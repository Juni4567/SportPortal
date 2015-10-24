<?php
if($_GET['id']){
    $id=$_GET['id'];

    require_once("includes/db_connect.php");

    $del = "DELETE FROM livescores WHERE id='$id'";
    $result = mysqli_query($mysqli, $del);
}