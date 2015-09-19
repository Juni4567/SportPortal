<?php
include 'includes/db_connect.php';
$user_name    =   $mysqli->real_escape_string($_POST['username']);
$sqlUser='SELECT * FROM users WHERE username = "'.$user_name.'"';
$resUser=$mysqli->query($sqlUser);
if($resUser === false) {
    trigger_error('Error: ' . $mysqli->error, E_USER_ERROR);
} else {
    echo $rows_returned = $resUser->num_rows;
}