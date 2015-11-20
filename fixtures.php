<?php
//include header template
require('layout/header.php');
?>

<div id="score-board" class="general-section">
    <div class="container">
        <div class="sport-nav tabbable">
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#cricket" aria-controls="cricket" role="tab" data-toggle="tab">Cricket</a></li>
                <li role="presentation"><a href="#football" aria-controls="football" role="tab" data-toggle="tab">Football</a></li>
                <li role="presentation"><a href="#hockey" aria-controls="hockey" role="tab" data-toggle="tab">Hockey</a></li>
                <li role="presentation"><a href="#tennis" aria-controls="tennis" role="tab" data-toggle="tab">Tennis</a></li>
                <li role="presentation"><a href="#vollyball" aria-controls="vollyball" role="tab" data-toggle="tab">Volly Ball</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active fade in" id="cricket">
                    <?php
                    require_once 'includes/db_connect.php';
//                    $query = "SELECT * FROM matches WHERE matchstatus='scheduled' AND g_id='1' ";
			$query     = "SELECT m.*, t1.team_name as `team_1_name`, t2.team_name as `team_2_name` FROM matches AS m INNER JOIN teams AS t1 ON (t1.team_id = m.team1_id) INNER JOIN teams AS t2 ON (t2.team_id = m.team2_id) WHERE m.matchstatus='scheduled' ANd m.g_id='1' AND m.match_date_time != '0000-00-00 00:00:00'";

                    $query_run = mysqli_query($mysqli, $query);
                    if(!$query_run->num_rows){
                        ?> <h4 class="alert alert-danger">No matches are scheduled for this game right now</h4>
                        <?php
                    }
                    if ($query_run){
                        ?>
                        <div class="scorecard-header">
                            <h2>Scheduled</h2>
                            <h4>Total <?php echo $query_run->num_rows; ?> Cricket matches are Scheduled</h4>
                        </div>
                        <?php
                        while ($query_row = mysqli_fetch_assoc($query_run)) {
                            $team1_id = $query_row['team_1_name'];
                            $team2_id = $query_row['team_2_name'];
                            $match_date_time = $query_row['match_date_time'];
                            $location = $query_row['location'];
                            $matchstatus = $query_row['matchstatus'];
//                                        echo $team1_id. 'VS'.$team2_id. 'AT'. $match_date_time. 'LIVE FROM'.$location;

                            ?>
                            <div class="scorecard-container">
                                <div class="match-card general-section">
                                    <span class="scheduled"><?php echo $matchstatus; ?></span>
                                    <h4>At <?php echo $location; ?></h4>
                                    <div class="teams">
                                        <h3><?php echo $team1_id; ?></h3> <h2>VS</h2> <h3><?php echo $team2_id; ?></h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled <?php echo $match_date_time; ?> </h4>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        echo "mysql_error()";
                    }
                    ?>
                </div>
                <!--Cricket container end-->
                <div role="tabpanel" class="tab-pane fade in" id="football">
                    <?php
                    require_once 'includes/db_connect.php';
                    $query = "SELECT m.*, t1.team_name as `team_1_name`, t2.team_name as `team_2_name` FROM matches AS m INNER JOIN teams AS t1 ON (t1.team_id = m.team1_id) INNER JOIN teams AS t2 ON (t2.team_id = m.team2_id) WHERE m.matchstatus='scheduled' AND m.g_id='2'";
                    $query_run = mysqli_query($mysqli, $query);
                    if(!$query_run->num_rows){
                        ?> <h4 class="alert alert-danger">No matches are being played for this sport</h4>
                        <?php return;
                    }
                    if ($query_run){
                        ?>
                        <div class="scorecard-header">
                            <h2>Live Now</h2>
                            <h4>Total <?php echo $query_run->num_rows; ?> Football matches are Scheduled</h4>
                        </div>
                        <?php
                        while ($query_row = mysqli_fetch_assoc($query_run)) {
                            $team1_id = $query_row['team_1_name'];
                            $team2_id = $query_row['team_2_name'];
                            $match_date_time = $query_row['match_date_time'];
                            $location = $query_row['location'];
                            $matchstatus = $query_row['matchstatus'];
//                                        echo $team1_id. 'VS'.$team2_id. 'AT'. $match_date_time. 'LIVE FROM'.$location;

                            ?>
                            <div class="scorecard-container">
                                <div class="match-card general-section">
                                    <span class="scheduled"><?php echo $matchstatus; ?></span>
                                    <h4>At <?php echo $location; ?></h4>
                                    <div class="teams">
                                        <h3><?php echo $team1_id; ?></h3> <h2>VS</h2> <h3><?php echo $team2_id; ?></h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled <?php echo $match_date_time; ?> </h4>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        echo "mysql_error()";
                    }
                    ?>
                </div>
                <!--Football container end-->
                <div role="tabpanel" class="tab-pane fade" id="hockey">
                    <?php for($i=1; $i<8; $i++){ ?>
                        <div class="scorecard-container">
                            <div class="match-card general-section">
                                <span class="scheduled">Live</span>
                                <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                <div class="teams">
                                    <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                </div>
                                <div class="match-time">
                                    <h4>Scheduled at 16:00</h4>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--Hockey container end-->
                <div role="tabpanel" class="tab-pane fade" id="tennis">
                    <?php for($i=1; $i<4; $i++){ ?>
                        <div class="scorecard-container">
                            <div class="match-card general-section">
                                <span class="scheduled">Live</span>
                                <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                <div class="teams">
                                    <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                </div>
                                <div class="match-time">
                                    <h4>Scheduled at 16:00</h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--Tennis container end-->
                <div role="tabpanel" class="tab-pane fade" id="vollyball">
                    <div class="scorecard-header">
                        <h2>Live Now</h2>
                        <h4 class="alert alert-danger">No matches are being played for this sport</h4>
                    </div>
                </div>
                <!-- Vollyball conainer end -->
            </div>
        </div> <!-- tabbable	-->

    </div>
</div><!--score board end-->
<?php
//include footer template
require('layout/footer.php');
?>
<script>
    $( document ).ready(function() {
        $('.sp-nav').find('#fixtures').addClass('active').children('a').removeAttr('href');
    });
</script>