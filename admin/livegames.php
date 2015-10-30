<?php session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin') {
    ?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
            <?php
            require_once 'includes/db_connect.php';
            $query = "SELECT m.*, t1.team_name as `team_1_name`, t2.team_name as `team_2_name`FROM matches AS m INNER JOIN teams AS t1 ON (t1.team_id = m.team1_id) INNER JOIN teams AS t2 ON (t2.team_id = m.team2_id) WHERE m.matchstatus='live' AND m.g_id=1";
            $query_run = mysqli_query($mysqli, $query);
            if (!$query_run->num_rows) {
                ?> <h4 class="alert alert-danger">No matches are live for this game right now</h4>
            <?php
            }
            if ($query_run){
            ?>
            <div class="row dashboard-content">
                <div class="col-sm-12">
                    <div class="scorecard-header text-center">
                        <h2>Total <?php echo $query_run->num_rows; ?> Cricket matches are live</h2>
                    </div>
                    <div class="col-sm-4">


                        <?php
                        while ($query_row = mysqli_fetch_assoc($query_run)) {
                            $team1_id = $query_row['team_1_name'];
                            $team2_id = $query_row['team_2_name'];
                            $match_id = $query_row['match_id'];
                            echo '<div class="well white text-center"><a style="text-transform: uppercase;" href="table.php?match_id=' . $match_id . '">' . $team1_id . ' VS ' . $team2_id . '</a></div>';
                        }
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('parts/footer.php'); ?>
<?php
} else {
    header('location: login.php');
}
?>