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
                    $over = $_POST["over"];
                    $score = $_POST["score"];
                    $wickets = $_POST["wicket"];
                    //Check if over already exist
                    $checkif_over_exist = "SELECT * FROM livescores WHERE over = '$over' AND match_id= '$match_id'";
                    $query_run_check    = mysqli_query($mysqli, $checkif_over_exist);
                    $query_row_check    = mysqli_num_rows($query_run_check);
                    if($query_row_check >0){

                    }else{
                        $query = "INSERT INTO livescores (over, runs, wicket, match_id) VALUES('$over', '$score', '$wickets', '$match_id')";
                        $query_run = mysqli_query($mysqli, $query);
                    }

                }
                ?>
                <div class="page-header text-center text-uppercase">
                    <h2><?php
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
                        echo $se_row_team1['team_name'] . ' VS ' . $se_row_team2['team_name'];
                        ?>
                        At <span class="text-uppercase"><?php
                            $se_match = "select * from matches where match_id = '$match_id'";
                            $se_run = mysqli_query($mysqli, $se_match);
                            $se_row = mysqli_fetch_assoc($se_run);
                            echo $se_row['location']; ?></span><br/>
                    </h2></div>
                <div class="well white score-update-table text-center">
                    <div class="well">
                        Team Innings:
                        <select class="text-uppercase">
                            <option value="" name=>Select one</option>
                            <?php
                            require_once 'includes/db_connect.php';
                            $qu = "select * from matches where match_id = '$match_id'";
                            $run = mysqli_query($mysqli, $qu);
                            while ($row = mysqli_fetch_array($run)) {
                                $team1 = $se_row_team1['team_name'];
                                $team2 = $se_row_team2['team_name'];
                                ?>
                                <option><?php echo "$team1"; ?></option>
                                <option><?php echo "$team2"; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <form method="post" action="table.php?match_id=<?php if (isset($_GET['match_id'])) {
                        echo $_GET['match_id'];
                    } else {
                        echo $match_id;
                    } ?>">
                        <div class="row form-group">
                            <div class="col-xs-4">

                                <input type="integer" name="over" id="over" required="required" placeholder="Over" class="form-control">
                            </div>
                            <div class="col-xs-4">
                                <input type="integer" name="score" id="score" placeholder="Score" required="required" class="form-control">

                            </div>
                            <div class="col-xs-4">
                                <input type="integer" name="wicket" id="wicket" placeholder="Wicket" required="required" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-info">Submit over</button>
                        </div>
                    </form>
                    <form class="text-center">
                        Winning team:<select class="text-uppercase">
                            <option value="" name="winning team">Select one</option>
                            <?php
                            require_once 'includes/db_connect.php';
                            $qu = "select * from matches where match_id = '$match_id'";
                            $run = mysqli_query($mysqli, $qu);
                            while ($row = mysqli_fetch_array($run)) {
                                $team1 = $se_row_team1['team_name'];
                                $team2 = $se_row_team2['team_name'];
                                ?>
                                <option><?php echo "$team1"; ?></option>
                                <option><?php echo "$team2"; ?></option>
                            <?php } ?>
                        </select><br/>

                        Comments: <input class="text-center" type="text" name="result" required="required">
                        <br/><br/>
                        <button name="End" type="button" class="btn btn-primary">End match</button>
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
                            <th>Over</th>
                            <th>Score</th>
                            <th>Wickets</th>
                            <th class="hidden-xs">Updated</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="scores">
                        <?php
                            $overs = "SELECT * FROM livescores WHERE match_id = '$match_id' ORDER BY over";
                            $query_run_overs = mysqli_query($mysqli, $overs);
                        ?>
                        <?php while($query_row_overs = mysqli_fetch_assoc($query_run_overs)){ ?>
                            <tr>
                                <td><?php echo $query_row_overs['over']; ?></td>
                                <td><?php echo $query_row_overs['runs']; ?></td>
                                <td><?php echo $query_row_overs['wicket']; ?></td>
                                <td class="hidden-xs">18-02-2015 8:00PM</td>
                                <td class="text-right">
                                    <div class="dropdown pull-right">
                                        <button aria-expanded="false" class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-template="assets/tpl/partials/dropdown-navbar.html" data-toggle="dropdown">
                                            <i class="md md-delete f20"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <div class="p-10">
                                                <div class="w300">
                                                    Please confirm if you want to delete this user
                                                </div>

                                                <div class="form-group">
                                                <button type="submit" id="<?php echo $query_row_overs['id']; ?>" class="btn btn-primary delbutton">Confirm
                                                </button>
                                                <a href="#" class="btn btn-link">Cancel</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>
                            <?php
                            $sum_scores = "SELECT SUM(runs), COUNT(over), SUM(wicket) FROM livescores where match_id='$match_id'";
                            $query_run_scores = mysqli_query($mysqli, $sum_scores);
                            $query_row_scores = mysqli_fetch_assoc($query_run_scores);
//                            var_dump($query_row_scores); exit;
                            ?>
                          <tr style="background-color: rgba(41, 31, 33, 0.28); font-weight: 900; font-size: 16px;">
                                <td><?php echo $query_row_scores['COUNT(over)'];?></td>
                                <td><?php echo $query_row_scores['SUM(runs)'];?></td>
                                <td><?php echo $query_row_scores['SUM(wicket)'];?></td>
                                <td colspan="2" class="text-right">Total</td>
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