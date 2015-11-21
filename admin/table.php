<?php session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin') {
    ?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
            <section class="forms-advanced">
                <?php
                require_once 'includes/db_connect.php';
                if (isset($_POST['submit'])) {
                    $match_id   = $_GET['match_id'];
                    $teaminnings = $_POST["teaminnings"];
                    //Check whitch team is currently Playing
                    $_SESSION['team_playing'] = $teaminnings;
                    $team_playing = $_SESSION['team_playing'];
                    $over = $_POST["over"];
                    $score = $_POST["score"];
                    $wickets = $_POST["wicket"];
                    //Check if over already exist for the currently playing team
                    $checkif_over_exist = "SELECT * FROM livescores WHERE over = '$over' AND match_id= '$match_id' AND teaminnings = '$teaminnings'";
                    $query_run_check    = mysqli_query($mysqli, $checkif_over_exist);
                    $query_row_check    = mysqli_num_rows($query_run_check);
                    if(!$query_row_check>0){
                        $query      = "INSERT INTO `livescores` (`id`, `match_id`, `teaminnings`, `over`, `runs`, `wicket`, `datetime`) VALUES (NULL, '$match_id', '$teaminnings', '$over', '$score', '$wickets', CURRENT_TIMESTAMP)";
                        $query_run  = mysqli_query($mysqli, $query);
                        echo "Score update";
                    }
                    else{ echo "Update failed"; }
                }
                else{
                    $_SESSION['team_playing'] = 0;
                    $team_playing = $_SESSION['team_playing'];
                } ?>

                <div class="page-header text-center text-uppercase">
                    <h2><?php
                        $match_id = $_GET['match_id'];
                        $query_match = "SELECT * from matches where match_id = '$match_id'";
                        $se_run = mysqli_query($mysqli, $query_match);
                        $se_row = mysqli_fetch_assoc($se_run);
                        $team1 = $se_row['team1_id'];
                        $team2 = $se_row['team2_id'];
                        $se_team1 = "select * from teams where team_id = '$team1'";
                        $se_run_team1 = mysqli_query($mysqli, $se_team1);
                        $se_row_team1 = mysqli_fetch_assoc($se_run_team1);
                        $se_team2 = "select * from teams where team_id = '$team2'";
                        $se_run_team2 = mysqli_query($mysqli, $se_team2);
                        $se_row_team2 = mysqli_fetch_assoc($se_run_team2);
                        echo $se_row_team1['team_name'] . ' VS ' . $se_row_team2['team_name'];
                        ?>
                        At <span class="text-uppercase">
                            <?php
                                echo $se_row['location'];
                            ?>
                        </span><br/>
                    </h2></div>
                <div class="well white score-update-table text-center">
                    <form method="post" action="table.php?match_id=<?php if (isset($_GET['match_id'])) {
                        echo $_GET['match_id'];
                    } else {
                        echo $match_id;
                    } ?>">
                    <div class="well">
                        Team Innings:
                        <select name="teaminnings" class="text-uppercase" required="required">
                            <?php
                            require_once 'includes/db_connect.php';
                            $qu = "select * from matches where match_id = '$match_id'";
                            $run = mysqli_query($mysqli, $qu);
                            if($_SESSION['team_playing'] == 0){
                                $playing_team_name = null;
                            }
                            if($_SESSION['team_playing'] == $se_row_team1['team_id']){ $playing_team_name = $se_row_team1['team_name']; ?>
                                <option value="<?php echo $_SESSION['team_playing']; ?>">
                                    <?php echo $se_row_team1['team_name']; ?>
                                </option>
                            <?php } else if($_SESSION['team_playing'] == $se_row_team2['team_id']){
                                $playing_team_name = $se_row_team2['team_name']; ?>
                                    <option value="<?php echo $_SESSION['team_playing']; ?>"><?php echo $se_row_team2['team_name']; ?></option>
                                <?php } else{ ?>
                                    <option value="0" name=>Select one</option>
                                <?php }

                            while ($row = mysqli_fetch_array($run)) {
                                    $team1 = $se_row_team1['team_name'];
                                    $team2 = $se_row_team2['team_name'];
                            ?>

                                <option value="<?php echo $se_row_team1['team_id']; ?>"><?php echo "$team1"; ?></option>
                                <option value="<?php echo $se_row_team2['team_id']; ?>"><?php echo "$team2"; ?></option>
                            <?php } ?>

                        </select>

                    </div>
                        <div class="row form-group">
                            <table class="table table-full over-table">
                            <thead>
                                <tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
                                    <th>Over</th>
                                    <th>Ball</th>
                                    <th>Score</th>
                                    <th class="hidden-xs">Wickets</th>
                                    <th class="text-right">Extra</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
                                    <td style="width: 20px;"><button name="over" id="over" class="btn btn-primary" disabled>1</button></td>
                                    <td style="width: 20px;"><button name="over" id="over" class="btn btn-primary" disabled>1</button></td>
                                    <td style="max-width: 65px; overflow: hidden;">
                                        <div class="form-group filled">
                                            <input type="text" name="score" id="customTextBox"/>
                                            <select class="form-control" id="selectScore">
                                              <option value="">Select one</option>
                                              <option value="custom">Custom</option>
                                              <option value="wideBall">Wide Ball</option>
                                              <option value="noBall">No Ball</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="max-width: 65px; overflow: hidden;"><input type="number" autocomplete="off" name="wicket" id="wicket" placeholder="Wickets" required="required" min="0" max="6" class="form-control"></td>
                                    <td><input type="number" autocomplete="off" name="extra" id="extra" placeholder="Extra score if Wide/No" required="required" min="0" max="6" class="form-control"></td>
                                    <td style="max-width: 65px; overflow: hidden; text-align: right;"><button class="btn btn-primary btn-round btn-xs" data-title="New User" data-toggle="modal" data-target="#new" title=""><i class="md md-add white-text"></i><div class="ripple-wrapper"></div></button></td>

                                </tr>
                            </tbody>
                        </div>

                    </form>
                            </table>

                    <form class="text-center" method="post" action="table.php?match_id=<?php if (isset($_GET['match_id'])) {
                        echo $_GET['match_id'];
                    } else {
                        echo $match_id;
                    } ?>">
                        Winning team:<select class="text-uppercase" name="winningteam">
                            <option value="">Select one</option>
                            <?php
                            require_once 'includes/db_connect.php';
                            $qu = "select * from matches where match_id = '$match_id'";
                            $run = mysqli_query($mysqli, $qu);
                            while ($row = mysqli_fetch_array($run)) {
                                $team1 = $se_row_team1['team_name'];
                                $team2 = $se_row_team2['team_name'];
                                ?>
                                <option value="<?php echo $se_row_team1['team_id']; ?>"><?php echo "$team1"; ?></option>
                                <option value="<?php echo $se_row_team2['team_id']; ?>"><?php echo "$team2"; ?></option>
                            <?php } ?>
                        </select><br/>
                        Comments: <input class="text-center" type="text" name="Comments" required="required">
                        <br/>
                        Status: <select name="Status">
                            <option>Select one</option>
                            <option value="completed">completed</option>
                        </select><br><br />
                        <button name="End" type="submit" class="btn btn-primary">End match</button>
                        <?php
                        require_once 'includes/db_connect.php';
                        if(isset($_POST['End'])){
                          $match_id = $_GET['match_id'];
                          $se_ls = "SELECT count(*) AS records from matches where match_id='$match_id'";
                          $se_run = mysqli_query($mysqli, $se_ls);
                          $se_row = mysqli_fetch_assoc($se_run);
                          if($se_row['records'] > 0)
                          {
                            $winningteam = $_POST["winningteam"];
                            $Comments = $_POST["Comments"];
                            $status = $_POST["Status"];
                            $query ="UPDATE matches SET matchstatus = '$status', winningteam = '$winningteam', comments= '$Comments' WHERE match_id = '$match_id'";
                            // var_dump($query);
                            $query_run = mysqli_query($mysqli, $query);
                              // Add winnig team the next match
                                $query_empty_team_slot  	= "select * from matches where team1_id='67' or team2_id= '67' LIMIT 1";
                                $query_run_empty_team_slot	= mysqli_query($mysqli, $query_empty_team_slot);
                                $query_row_empty_team_slot  = mysqli_fetch_assoc($query_run_empty_team_slot);
                                if($query_row_empty_team_slot['team1_id']==67){
                                    echo "putting winning team_id in team_1_slot";
                                    $match_id_of_empty_slot     = $query_row_empty_team_slot['match_id'];
                                    $query_update_winning_team1 ="UPDATE matches SET team1_id = '$winningteam' WHERE match_id = '$match_id_of_empty_slot'";
                                    // var_dump($query_update_winning_team1);
                                    $query_run_update_winning_team1 = mysqli_query($mysqli, $query_update_winning_team1);
                                    ?>
                                    <script>window.location.assign("thankyou.php");</script>
                                    <?php

                                }
                                else if($query_row_empty_team_slot['team2_id']==67){
                                    echo "putting winning team_id in team_2_slot";
                                    $match_id_of_empty_slot = $query_row_empty_team_slot['match_id'];
                                    $query_update_winning_team2 ="UPDATE matches SET team2_id = '$winningteam' WHERE match_id = '$match_id_of_empty_slot'";
                                    // var_dump($query);
                                    $query_run_update_winning_team2 = mysqli_query($mysqli, $query_update_winning_team2);
                                    ?>
                                    <script>window.location.assign("thankyou.php");</script>
                                <?php }
                          }
                            $query = "SELECT count(*) AS records from matches where matchstatus='completed'";
                            $query_run = mysqli_query($mysqli,$query);
                            $query_row = mysqli_fetch_assoc($query_run);
                            if ($query_row['records'] > 0){
                            $checkif_match_exist = "SELECT * FROM results WHERE match_id= '$match_id'";
                            $query_run_check     = mysqli_query($mysqli, $checkif_match_exist);
                            $query_row_check     = mysqli_num_rows($query_run_check);
                            }


                                $query1 = "INSERT INTO results (team_id, match_id, g_id, comments) SELECT winningteam, match_id, g_id, comments from matches where matchstatus= 'completed' AND match_id = '$match_id' ";
                                $query1_run = mysqli_query($mysqli,$query1);

                            // if ($query1_run) {
                            //     $query = "DELETE FROM matches WHERE match_id= '$match_id' AND matchstatus= 'completed'";
                            //     $query_run = mysqli_query($mysqli,$query);
                            // }
                      }
                          ?>
                    </form>
                </div>
            </section>
            <section>
                <div class="page-header text-center text-uppercase">
                <h2>Current Match Summery</h2>
                </div>
                <div class="table-responsive well no-padding white no-margin">

                    <table class="table table-full m-b-60" id="table-area-1" style="margin-bottom:0;">
                        <thead>
                        <tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
                            <th>Overs</th>
                            <th>Scores</th>
                            <th>Wickets</th>
                            <th class="hidden-xs">Updated</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="scores">
                        <?php
                            $overs = "SELECT * FROM livescores WHERE match_id = '$match_id' ORDER BY over AND teaminnings ='$team_playing'";
                            $query_run_overs = mysqli_query($mysqli, $overs);
                        ?>
                        <?php while($query_row_overs = mysqli_fetch_assoc($query_run_overs)){ ?>
                            <tr>
                                <td><?php echo $query_row_overs['over']; echo " of Team: " . $query_row_overs['teaminnings']; ?></td>
                                <td><?php echo $query_row_overs['runs']; ?></td>
                                <td><?php echo $query_row_overs['wicket']; ?></td>
                                <td class="hidden-xs"><?php echo $query_row_overs['datetime']; ?></td>
                                <td class="text-right">
                                    <div class="dropdown pull-right">
                                        <button aria-expanded="false" class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-template="assets/tpl/partials/dropdown-navbar.html" data-toggle="dropdown">
                                            <i class="md md-delete f20"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <div class="p-10">
                                                <div class="w300">
                                                    Please confirm if you want to delete this over
                                                </div>

                                            <div class="form-group">
                                                <button type="submit" id="<?php echo $query_row_overs['id']; ?>" class="btn btn-primary delbutton">Confirm </button>
                                                <a href="#" class="btn btn-link">Cancel</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php

                            $sum_scores = "SELECT SUM(runs), COUNT(over), SUM(wicket) FROM livescores where match_id='$match_id' AND teaminnings ='$team_playing'";
                            $query_run_scores = mysqli_query($mysqli, $sum_scores);
                            $query_row_scores = mysqli_fetch_assoc($query_run_scores);

                            // var_dump($query_row_scores); exit;
                        ?>
                            <tr style="background-color: rgba(41, 31, 33, 0.28); font-weight: 900; font-size: 16px;">
                                <td><?php echo $query_row_scores['COUNT(over)'];?></td>
                                <td><?php echo $query_row_scores['SUM(runs)'];?></td>
                                <td><?php echo $query_row_scores['SUM(wicket)'];?></td>
                                <td colspan="2" class="text-right">Total(<?php echo "<span class='text-uppercase'>" . $playing_team_name . "</span>"; ?>)</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
    <?php include('parts/footer.php'); ?>
<?php
} else {
    header('location: login.php');
}
?>
