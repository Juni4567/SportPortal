<?php
var_dump($_POST);

if($_POST['ball_status']=='custom'){
    $score 	= $_POST['score'];
    $wicket = $_POST['wicket'];
    $team_id = $_POST['team_id'];
    $match_id = $_POST['match_id'];
    $extra=0;
    $total = $score;
    if($wicket > 1){
        echo"Woah! it's impossible, is it? 1 ball one person out!";
    }
    else{
        require_once 'includes/db_connect.php';
        $query_insert_ball = "INSERT INTO over_balls ( over, match_id, team_id, ball_score, wicket, extra, total) VALUES ('1', '$match_id', '$team_id', '$score', '$wicket', '$extra', '$total')";
        var_dump($query_insert_ball);
        if(mysqli_query($mysqli, $query_insert_ball)){
            echo "data inserted successfully for Custom Score";
        }
    }
}
if($_POST['ball_status']=='noBall'){
    $score 	= 'noBall';
    $wicket = $_POST['wicket'];
    $extra	= $_POST['extra'];
    $team_id = $_POST['team_id'];
    $match_id = $_POST['match_id'];
    $total_noball  = $score+ $extra;
    if($wicket > 1){
        echo "Hey it's not possible! \"No ball\" and more than one people gone??";
		}
    else{
        require_once 'includes/db_connect.php';
        $query_insert_noball = "INSERT INTO over_balls ( over, match_id, team_id, ball_score, wicket, extra, total) VALUES ('1', '$match_id', '$team_id', '$score', '$wicket', '$extra', '$total_noball')";
        var_dump($query_insert_noball);
        if(mysqli_query($mysqli, $query_insert_noball)){
          echo "data inserted successfully for noball";
        }
		}
}

if($_POST['ball_status']=='wideBall'){
    $score 	= 'wideBall';
    $wicket = $_POST['wicket'];
    $extra	= $_POST['extra'];
    $team_id = $_POST['team_id'];
    $match_id = $_POST['match_id'];
    $total_wideball  = $score+ $extra;
    if($wicket > 1){
        echo "Hey it's not possible! No ball and more than one people gone??";
		}
    else{
        require_once 'includes/db_connect.php';
        $query_insert_wideball = "INSERT INTO over_balls (over, match_id, team_id, ball_score, wicket, extra, total) VALUES ('1', '$match_id', '$team_id', '$score', '$wicket', '$extra', '$total_wideball')";
        var_dump($query_insert_wideball);
        if(mysqli_query($mysqli, $query_insert_wideball)){
            echo "data inserted successfully for wideBall";
        }
		}

}