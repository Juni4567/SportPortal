<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    require_once 'includes/db_connect.php';
    if(isset($_POST['submit'])){
      $match_id = $_GET['match_id'];
      $se_ls = "SELECT count(*) AS records from livescores where match_id='$match_id'";
      $se_run = mysqli_query($mysqli, $se_ls);
      $se_row = mysqli_fetch_assoc($se_run);
      if($se_row['records'] > 0)
      {
        $over = $_POST["over"];
        $score = $_POST["score"];
        $wickets = $_POST["wicket"];
        $query ="UPDATE livescores set over = '$over', runs = '$score', wicket = '$wickets' where match_id = '$match_id'";
        $query_run = mysqli_query($mysqli, $query);
             
      }
      else
      {
      $query = "INSERT INTO livescores (match_id,over, runs, wicket)
      VALUES ('".$_GET['match_id']."','".$_POST["over"]."','".$_POST["score"]."','".$_POST["wicket"]."')";
      $query_run = mysqli_query($mysqli, $query);
      }
    } 
?>
<div class="container">
  <center>
    <h2><?php 
    require_once 'includes/db_connect.php';
    $match_id = $_GET['match_id'];
    $se_match = "SELECT * from matches where match_id = '$match_id'";
    $se_run = mysqli_query($mysqli, $se_match);
    $se_row = mysqli_fetch_assoc($se_run);
    $team1 = $se_row['team1_id'];
    $team2 = $se_row['team2_id'];
    $se_team1 = "select * from teams where team_id = '$team1'";
    $se_run_team1 = mysqli_query($mysqli, $se_team1);
    $se_row_team1 = mysqli_fetch_assoc($se_run_team1);
    $se_team2 = "select * from teams where team_id = '$team2'";
    $se_run_team2 = mysqli_query($mysqli, $se_team2);
    $se_row_team2 = mysqli_fetch_assoc($se_run_team2);
    echo $se_row_team1['team_name'].' VS '.$se_row_team2['team_name'];
    ?>
    </h2>
    </center>
  <CENTER><form>
    Date:<input type="date" name="date"><br>
    Ground Name:<?php 
    require_once 'includes/db_connect.php';
    $se_match = "select * from matches where match_id = '$match_id'";
    $se_run = mysqli_query($mysqli, $se_match);
    $se_row = mysqli_fetch_assoc($se_run);
    $g_name = $se_row['location'];?>
    <?php echo "$g_name";?><br>
    Team Innings:
      <select>
      <option value="text">BS 11</option>
      <option value="text">CS 11</option>
      </select>
  </form></CENTER><br>
   <table name="over" class="table table-bordered">
      <tr>
        <th>over</th>
        <th>score</th>
        <th>wicket</th>
      </tr>
      <form method="post" action="table.php?match_id=<?php if (isset($_GET['match_id'])) { echo $_GET['match_id'];}else{ echo $match_id;}?>">
          <tr>
            <td><input type="integer" name="over" id="over" required="required" class="form-control"></td>
            <td><input type="integer" name="score" id="score" required="required" class="form-control"></td>
            <td><input type="integer" name="wicket" id="wicket" required="required" class="form-control"></td>
          </tr>  
    </table>
      <CENTER><button type="submit" name="submit">Submit over</button></CENTER>
      </form>
  <br>
  <form class="text-center">
      Winning team:<select>
      <option value="text">BS 11</option>
      <option value="text">CS 11</option>
      </select><br></br>
      RESULT: <input class="text-center"type="text" name="result" required="required"><br></br>
      <button type="button">End match</button>
  </form><br>
</div>
</body>
</html>
