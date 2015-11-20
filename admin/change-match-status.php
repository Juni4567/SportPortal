<?php
if($_GET['make_live_matchId']){
    $matchID    = $_GET['make_live_matchId'];
    require_once("includes/db_connect.php");
    $update_match_status      ="UPDATE matches SET matchstatus = 'live' where match_id= '$matchID'";
    $run_update_match_status  = mysqli_query($mysqli, $update_match_status);
}
if($_GET['schedule_date_time']){
    require_once("includes/db_connect.php");
    $date_time          = $_GET['schedule_date_time'];
    $match_id           = $_GET['match_id'];
    $update_date_time   = "UPDATE matches SET match_date_time ='$date_time' WHERE match_id='$match_id'";
    $execute_date_time  = mysqli_query($mysqli, $update_date_time);
}