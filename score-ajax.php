<div class="tab-content">
    <!--match container-->

    <?php
    $tabs = array(
        'cricket'   => 1,
        'football'  => 2,
        'hockey'    => 3,
        'tennis'    => 4,
        'vollyball' => 5
    );

    foreach ( $tabs as $tab_name => $tab_id ) :
        ?>
        <div role="tabpanel" class="tab-pane fade in <?php if($tab_id == 1){echo "active";} ?>" id="<?php echo $tab_name; ?>">


            <?php
            require_once 'includes/db_connect.php';

            $query     = "SELECT m.*, t1.team_name as `team_1_name`, t2.team_name as `team_2_name` FROM matches AS m INNER JOIN teams AS t1 ON (t1.team_id = m.team1_id) INNER JOIN teams AS t2 ON (t2.team_id = m.team2_id) WHERE m.matchstatus='live' AND m.g_id='$tab_id' ";
            $query_run = mysqli_query( $mysqli, $query );

            if ( ! $query_run->num_rows ) {
                ?>
                <h4 class="alert alert-danger">No matches are being played for this sport</h4>
                <?php return;
            }

            if ( $query_run ) {
                ?>
                <div class="scorecard-header">
                    <h2>Live Now</h2>
                    <h4>Total <?php echo $query_run->num_rows; ?> <?php echo $tab_name; ?> matches are live now</h4>
                </div>
                <?php
                while ( $query_row = mysqli_fetch_assoc( $query_run ) ) {
                    $team1_name        = $query_row['team_1_name'];
                    $team1_id          = $query_row['team1_id'];
                    $team2_name        = $query_row['team_2_name'];
                    $team2_id          = $query_row['team2_id'];
                    $match_date_time   = $query_row['match_date_time'];
                    $location          = $query_row['location'];
                    $matchstatus       = $query_row['matchstatus'];
                    $match_id          = $query_row['match_id'];

                //    $query     = "SELECT m.*, t.team_name as `team_name` FROM livescores AS m INNER JOIN teams AS t1 ON (t.team_id = m.teaminnings) WHERE m.teaminnings='$teaminnings'";
                //    $query_run = mysqli_query( $mysqli, $query );
                    $se_ls      = "SELECT l.*, t.team_name as `teaminnings` FROM livescores AS l INNER JOIN teams AS t ON (t.team_id = l.teaminnings) where match_id='$match_id'";
                    $se_run     = mysqli_query($mysqli, $se_ls);
                    $se_row     = mysqli_fetch_assoc($se_run);
                    $runs       = $se_row['runs'];
                    $overs      = $se_row['over'];
                    $wickets    = $se_row['wicket'];
                    $teaminnings = $se_row['teaminnings'];

                    // select Sum of scores
                    $sum_scores1         = "SELECT SUM(runs), COUNT(over), SUM(wicket) , teaminnings FROM livescores where match_id='$match_id' AND teaminnings='$team1_id'";
                    $query_run_scores1   = mysqli_query($mysqli, $sum_scores1);
                    $query_row_scores1   = mysqli_fetch_assoc($query_run_scores1);

                    $sum_scores2         = "SELECT SUM(runs), COUNT(over), SUM(wicket) , teaminnings FROM livescores where match_id='$match_id' AND teaminnings='$team2_id'";
                    $query_run_scores2   = mysqli_query($mysqli, $sum_scores2);
                    $query_row_scores2   = mysqli_fetch_assoc($query_run_scores2);


//             echo $team1_id. 'VS'.$team2_id. 'AT'. $match_date_time. 'LIVE FROM'.$location;

                    ?>
                    <div class="scorecard-container">
                        <div class="match-card general-section">
                            <span class="live"><?php echo $matchstatus; ?></span>
                            <h4>At <?php echo $location; ?></h4>

                            <div class="teams">
                                <h3><?php echo $team1_name; ?></h3>

                                <h2>V/S</h2>

                                <h3><?php echo $team2_name; ?></h3>
                            </div>
                            <!--							<div class="match-time">-->
                            <!--								<h4>Scheduled --><?php //echo $match_date_time; ?><!-- </h4>-->
                            <!--							</div>-->
                            <div class="match-time">
                                <?php
                                $team_se_inn = $query_row_scores1['teaminnings'];
                                ?>
                                <h4><?php echo $team1_name;?> <?php echo $query_row_scores1['SUM(runs)'].'/'.$query_row_scores1['SUM(wicket)']. '   Overs: '.$query_row_scores1['COUNT(over)']; ?> </h4>
                            </div>
                            <div class="match-time">
                                <?php
                                $team_se_inn = $query_row_scores2['teaminnings'];
                                ?>
                                <h4><?php echo $team2_name;?> <?php echo $query_row_scores2['SUM(runs)'].'/'.$query_row_scores2['SUM(wicket)']. '   Overs: '.$query_row_scores2['COUNT(over)']; ?> </h4>
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
    <?php endforeach; ?>

</div>