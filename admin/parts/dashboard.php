<section class="dashboard">
    <div class="page-header">
        <h1><i class="md md-input"></i> SP dashboard</h1>

        <p class="lead">Sport portal admin dashboard</p>
    </div>
    <?php
    require_once 'includes/db_connect.php';
    //select live matches
    $livematches            = "SELECT * FROM matches WHERE matchstatus = 'live'";
    $query_run_livematches  = mysqli_query($mysqli, $livematches);
    $number_of_livematches  = mysqli_num_rows($query_run_livematches);

    //select number of teams registered
    $teams               = "SELECT * FROM teams";
    $query_run_teams     = mysqli_query($mysqli, $teams);
    $number_of_teams   = mysqli_num_rows($query_run_teams);

    //select number of coordinators
    $coordinators               = "SELECT * FROM users where user_role ='Coordinator'";
    $query_run_coordinators     = mysqli_query($mysqli, $coordinators);
    $number_of_coordinators     = mysqli_num_rows($query_run_coordinators);

    //select number of sub-coordinators
    $subcoordinators               = "SELECT * FROM users where user_role ='Sub-coordinator'";
    $query_run_subcoordinators     = mysqli_query($mysqli, $subcoordinators);
    $number_of_subcoordinators     = mysqli_num_rows($query_run_subcoordinators);

    //select number of players
    $players               = "SELECT * FROM users where user_role ='Player'";
    $query_run_players     = mysqli_query($mysqli, $players);
    $number_of_players     = mysqli_num_rows($query_run_players);
    ?>
            <div class="row dashboard-content">
                <div class="col-sm-4">
                    <div class="well white text-center">
                        <div class="half">
                            <a href="#">Today Matches</a>
                            <h2><?php echo $number_of_livematches;?></h2>
                        </div>
                        <div class="half">
                            <a href="#">Teams</a>
                            <h2><?php echo $number_of_teams; ?></h2>
                        </div>
                        <div class="half">
                            <a href="#">Players</a>
                            <h2><?php echo $number_of_players; ?></h2>
                        </div>
                        <div class="half">
                            <a href="#">Co/Sub-Co's</a>
                            <h2><?php echo $number_of_coordinators; ?>/<?php echo $number_of_subcoordinators; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well white">
                        <?php
                            //select upcomming matches
                            $upcomingmatches            = "SELECT * FROM matches WHERE matchstatus = 'scheduled' LIMIT 3";
                            $query_run_upcomingmatches  = mysqli_query($mysqli, $upcomingmatches);
                        ?>
                        <h3>Upcomming Matches</h3>
                        <ul>
                            <?php while($query_row_upcomingmatches  = mysqli_fetch_assoc($query_run_upcomingmatches)){?>
                                <li><h5><?php echo $query_row_upcomingmatches['location'] ?></h5> <span class="date"><?php echo $query_row_upcomingmatches['match_date_time'] ?></span></li>
                                <?php } ?>

                        </ul>
                        <div class="readmore text-right">
                        <a href="#">See More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well white">
                        <h3>Members Activity</h3>
                        <ul>
                            <li><h5>Junaid Anwar</h5> Has Joined Portal as <span class="role">Player</span></li>
                            <li><h5>Usman Bilal</h5> Has Joined Portal as <span class="role">Coordinator</span></li>
                            <li><h5>Fazeel Fiaz</h5> Has Joined Portal as <span class="role">Sub-Coordinator</span></li>
                        </ul>
                        <div class="readmore text-right">
                            <a href="#">See More...</a>
                        </div>
                    </div>
                </div>
            </div>

</section>