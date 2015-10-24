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
                        echo $se_row_team1['team_name'].' VS '.$se_row_team2['team_name'];
                        ?>
                    </h2></div>
            <div class="well white score-update-table text-center">



                <form>
                        Date:<input type="date" name="date"><br>
                        Ground Name:<?php
                        require_once 'includes/db_connect.php';
                        $se_match = "select * from matches where match_id = '$match_id'";
                        $se_run = mysqli_query($mysqli, $se_match);
                        $se_row = mysqli_fetch_assoc($se_run);
                        $g_name = $se_row['location'];?>
                        <?php echo "$g_name"; $i=1;?><br>
                        Team Innings:
                        <select>
                            <option value="" name=>Select one</option>
                            <?php
                            require_once 'includes/db_connect.php';
                            $qu ="select * from matches where match_id = '$match_id'";
                            $run = mysqli_query($mysqli,$qu);
                            while ($row=mysqli_fetch_array($run))
                            {
                                $team1 = $se_row_team1['team_name'];
                                $team2 = $se_row_team2['team_name'];
                                ?>
                                <option><?php echo "$team1"; ?></option>
                                <option><?php echo "$team2"; ?></option>
                            <?php } ?>
                        </select>
                    </form>
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
                <button type="submit" name="submit">Submit over</button>
                </form>
                <br>
                <form class="text-center">
                    Winning team:<select>
                        <option value="" name="winning team">Select one</option>
                        <?php
                        require_once 'includes/db_connect.php';
                        $qu ="select * from matches where match_id = '$match_id'";
                        $run = mysqli_query($mysqli,$qu);
                        while ($row=mysqli_fetch_array($run))
                        {
                            $team1 = $se_row_team1['team_name'];
                            $team2 = $se_row_team2['team_name'];
                            ?>
                            <option><?php echo "$team1"; ?></option>
                            <option><?php echo "$team2"; ?></option>
                        <?php } ?>
                    </select><br></br>
                    Comments: <input class="text-center"type="text" name="result" required="required"><br></br>
                    <button name="End"type="button">End match</button>
                </form><br>
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