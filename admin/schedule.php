<?php session_start();
if(isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin'){?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
          <section class="dashboard">
            <div class="page-header">
                <h1><i class="md md-input"></i> Schedules</h1>
                <p class="lead">Please click on shuffle and insert button to add matches to database</p>
            </div>
              <div class="well white addnews-table text-center">
            <div class="row">
              <?php
                $query_teams                = "SELECT * FROM teams";
                $query_run_teams            = mysqli_query($mysqli, $query_teams);
                while ($query_row_teams     = mysqli_fetch_assoc($query_run_teams)){ ?>
                    <div class="col-sm-3 height-fix">
                        <div class="well white <?php if($query_row_teams['team_name']=='0'){?> hidden <?php };?>">
                            <h2 class="text-uppercase"><?php echo $query_row_teams['team_name'];?></h2>
                              <strong> Mr. <?php echo $query_row_teams['sc_id']; ?></strong>
                        </div>
                    </div>
                <?php
                $teams[] = $query_row_teams['team_id']; ?>
                <?php
                }?>
                </div>
                <?php
            $schedules         = array();
            $total_num_teams   = count($teams);
            // suppose teams are 8
//            shuffle($teams);
            $teams_per_group  = $total_num_teams / 2;

            for($i = 0; $i < 4; $i++)
            {
                $starting_point = $i * 2; //i*2= 0, 1*2=2, 2*2=4, 3*2=6,
                $groups[$i] = array_slice($teams, $starting_point, 2);

            }
            // Add 4 grounds that will be available for matches (an array may be)
            $grounds = array("Rawalpindi Stadium", "COMSATS Main Ground", "Nawaz Sharif Park", "Airport Ground");
            //add g_id=1 => for cricket
            $i=0;
//                var_dump($groups);
            foreach( $groups as $team ) {
                $team1  = $team[0];
                $team2  = $team[1];
                $ground  = $grounds[$i];
                $i++;
//                $query_matches     = "INSERT INTO matches (team1_id, team2_id, g_id, location, matchstatus) VALUES ('$team1', '$team2', 1, '$ground', 'scheduled')";
//                $query_run_teams = mysqli_query($mysqli, $query_matches);
                if($i==3){$i=0;}
            }

                for($r3=1; $r3<=3; $r3++){
                    $team1  = 67;
                    $team2  = 67;
                    $ground  = $grounds[$i];
                    $i++;
//                    $query_matches     = "INSERT INTO matches (team1_id, team2_id, g_id, location, matchstatus) VALUES ('$team1', '$team2', 1, '$ground', 'scheduled')";
//                    $query_run_teams = mysqli_query($mysqli, $query_matches);
                    if($i==3){ $i=0; }
                }


            ?>
                  </div>
              <table class="table table-full" id="table-area-1">
                <thead>
                <h2>List of matches that are scheduled currently</h2>
                <tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
                    <th>Match ID</th>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th>Location</th>
                    <th>Winning Team</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody id="schedules">

                        <?php
                        require_once 'includes/db_connect.php';
                        $query_matches = "SELECT * FROM matches";
                        $query_run_matches = mysqli_query($mysqli, $query_matches);

                        while ($query_matches_row = mysqli_fetch_assoc($query_run_matches)) { ?>
                        <tr>
                        <td><?php echo $query_matches_row['match_id']; ?></td>
                        <td><?php if($query_matches_row['team1_id']==67){ echo 'MW1'; } else{ echo $query_matches_row['team1_id']; } ?></td>
                        <td><?php if($query_matches_row['team2_id']==67){ echo 'MW2'; } else{ echo $query_matches_row['team2_id']; } ?></td>
                        <td><?php echo $query_matches_row['location']; ?></td>
                        <td><?php echo $query_matches_row['winningteam']; ?></td>
                        <td class="text-right">
                            <div class="dropdown pull-right">
                                <div class="form-group">
                                    <?php if($query_matches_row['matchstatus']=='live') {?><button class='btn btn-primary disabled'>Live</button> <?php }
                                        else if($query_matches_row['matchstatus']=='scheduled' && $query_matches_row['match_date_time'] != '0000-00-00 00:00:00'){ ?>
                                            <button class='btn btn-primary disabled'>Scheduled at: <?php echo $query_matches_row['match_date_time']; ?></button>
                                        <?php } else{ ?>

                                            <input type="hidden" class="matchID" value="<?php echo $query_matches_row['match_id']; ?>" />
                                            <button value="" class="make-live btn btn-primary btn-disabled">Make Live</button>
                                            <button value="" class="datetimepicker schedule-date-button reject-btn btn btn-secondary delbutton">Schedule</button>
                                        </div>
                                            <?php } ?>
                            </div>
                        </td>
                    </tr>
                        <?php } ?>
                </tbody>
            </table>
        </section>
        </div>
    </div>
    <?php include('parts/footer.php'); ?>
<?php } else{
    header('location: login.php');
}
?>