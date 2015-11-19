<?php
//include header template
include('layout/header.php');
if (isset($_SESSION['logged_user'])) {
//    Ftploy test
    require_once 'includes/db_connect.php';
    $query = "SELECT * FROM users WHERE username = '$logged_user'";
    $query_run = mysqli_query($mysqli, $query);
    $query_row = mysqli_fetch_assoc($query_run);
    $game_id = $query_row['g_id'];
    $dept_id = $query_row['dept_id'];
    $user_id = $query_row['user_id'];

    //Get department name from department table with it's id
    $query_dept_name = "SELECT * FROM departments WHERE dept_id = '$dept_id'";
    $query_dept_name_run = mysqli_query($mysqli, $query_dept_name);
    $query_dept_name_row = mysqli_fetch_assoc($query_dept_name_run);
    ?>
    <div class="container">
    <div class="general-section">
        <div class="sp-profile">
            <div class="profile-header">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="sp-userimg">
                            <img src="<?php echo "uploads/profile/" . $query_row['images']; ?>" alt="<?php echo $query_row['username']; ?>"/>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="userinfo">
                            <h2><?php echo $query_row['fullname']; ?> &#9670; <span class="user-age"><?php echo $query_row['age']; ?></span>
                                    <span class="profile-status"> <?php
                                        if ($query_row['user_role'] == 'Coordinator') {
                                            ?>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <?php } ?>
                                        <?php
                                        if ($query_row['user_role'] == 'Player') {
                                            ?>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <?php } ?>
                                        <?php
                                        if ($query_row['user_role'] == 'Sub-coordinator') {
                                            ?>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <?php } ?>
                                        <?php
                                        if ($query_row['user_role'] == 'Admin') {
                                            ?>
                                            <span class="glyphicon glyphicon-star"
                                                  aria-hidden="true">Welcome Admin</span>
                                        <?php } ?>
                                    </span>
                            </h2>

                            <div class="user-bio"><span class="teamname glyphicon glyphicon-globe"> <?php echo $query_dept_name_row['dept_name']; ?> </span>
                            </div>
                        </div>
                    </div>
                </div> <!-- row end -->
            </div> <!-- profile header end -->
        <div class="profile-body">
        <div class="profile-left">
            <div class="row">`
                <div class="col-sm-3">
                    <div class="sp-profile-nav">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pils" role="tablist">
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab"
                                                                      data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a>
                            </li>
                            <?php if ($query_row['user_role'] == 'Sub-coordinator') {
                                $query_player_num = "SELECT * FROM users WHERE g_id='$game_id' AND dept_id = '$dept_id' AND user_role= 'Player' AND user_id!='$user_id' AND status_id= 0 ";
                                $query_player_num_run = mysqli_query($mysqli, $query_player_num);
                                $query_player_num_row = mysqli_num_rows($query_player_num_run);
                                ?>
                                <li role="presentation"><a href="#createteam" aria-controls="createteam" role="tab" data-toggle="tab">Create team</a></li>
                                <li role="presentation"><a href="#playerrequest" aria-controls="playerrequest" role="tab" data-toggle="tab">Player Requests <?php if($query_player_num_row){?><span class="notification-number"><?php echo $query_player_num_row;?></span><?php } ?></a></li>
                            <?php } ?>
                            <?php if ($query_row['user_role'] == 'Coordinator') { ?>
                                <li role="presentation"><a href="#playerrequest" aria-controls="playerrequest" role="tab" data-toggle="tab">Sub-Coordinators Request</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="profile-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                <?php echo $query_row['introduction']; ?>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="settings">
                                <form action="upload.php" method="post" enctype="multipart/form-data">

                                    <label class="control-label" for="fileToUpload">Select profile
                                        picture:</label>

                                    <div class="controls">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <input type="submit" value="Upload Image" name="submit"
                                               class="btn btn-default" style="margin: 5px 0;">
                                    </div>
                                </form>
                                <form action="updateprofile.php?u_id=<?php echo $query_row['user_id']; ?>" method="POST">
                                    <!-- Text input-->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label" for="username">User Name</label>

                                            <div class="controls">
                                                <input placeholder="<?php echo $query_row['username']; ?>" type="text" class="form-control"
                                                       required="" min="3" disabled>

                                                <div class="username_availability_result" id="username_availability_result"></div>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <!-- Text input-->
                                            <label class="control-label" for="fullname">Full name</label>

                                            <div class="controls">
                                                <input id="fullname"
                                                       placeholder="<?php echo $query_row['fullname']; ?>"
                                                       name="fullname" type="text" class="form-control"
                                                       required="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Email input-->
                                    <label class="control-label" for="email">Email</label>

                                    <div class="controls">
                                        <input id="email" placeholder="<?php echo $query_row['email']; ?>"
                                               name="email" type="email" class="form-control" required="">
                                    </div>

                                    <!-- Password input-->
                                    <label class="control-label" for="password">Password</label>

                                    <div class="controls">
                                        <input id="password" name="password" type="password"
                                               class="form-control" required="">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label" for="Age">Age</label>

                                            <div class="controls">
                                                <input id="Age" placeholder="<?php echo $query_row['age']; ?>"
                                                       name="age" type="number" class="form-control" required=""
                                                       min="14" pattern="\d*" step="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label" for="Gender">Gender</label>

                                            <div class="controls">
                                                <input id="gender"
                                                       placeholder="<?php echo $query_row['gender']; ?>"
                                                       class="form-control" disabled>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Select Basic -->
                                    <?php if (!$query_row['user_role'] == 'Admin') { ?>
                                        <label class="control-label" for="Department">Department</label>

                                        <div class="controls">
                                            <input id="department"
                                                   placeholder="<?php echo $query_row['dept_id']; ?>"
                                                   class="form-control">
                                        </div>
                                    <?php } ?>
                                    <!-- Select Basic -->
                                    <label class="control-label" for="User role">User Role</label>

                                    <div class="controls">
                                        <input id="department"
                                               placeholder="<?php echo $query_row['user_role']; ?>"
                                               class="form-control" disabled>
                                    </div>
                                    <?php if (!$query_row['user_role'] == 'Admin') { ?>
                                        <!-- Select Basic -->
                                        <label class="control-label" for="Game">Game</label>

                                        <div class="controls">
                                            <input id="department" placeholder="<?php echo $query_row['g_id']; ?>"
                                                   class="form-control">
                                        </div>
                                    <?php } ?>
                                    <!-- Button -->
                                    <label class="control-label" for="register"></label>

                                    <div class="controls text-right">
                                        <button id="register" type="submit" name="update" class="btn btn-primary">Update</button>
                                        <button id="register" type="reset" class="btn btn-primary">Cancel</button>
                                </form>
                            </div>
                        </div> <!-- tab-content -->
                        <?php if ($query_row['user_role'] == 'Sub-coordinator') { ?>
                            <div role="tabpanel" class="tab-pane fade" id="playerrequest">
                                <table class="table table-bordered" id="players-list">
                                    <thead>
                                    <th class="text-center">s.no</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th colspan="2" class="text-center">Status</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once 'includes/db_connect.php';
                                    $i = 1;


                                    $query_player = "SELECT * FROM users WHERE g_id='$game_id' AND dept_id = '$dept_id' AND user_role= 'Player' AND user_id!='$user_id' AND status_id= 0 ";
                                    $query_player_run = mysqli_query($mysqli, $query_player);
                                    while ($query_player_row = mysqli_fetch_assoc($query_player_run)) {
                                        $user_id = $query_player_row['user_id'];
                                        $name = $query_player_row['username'];
                                        $email = $query_player_row['email'];
                                        $status = $query_player_row['status_id'];?>
                                        <tr>
                                            <!-- Ths is for Sub-coordinator for displaying players list -->
                                            <td><input type="hidden" name="id" value="" /><?php echo $i++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td>
                                                <input type="hidden" class="deptId" value="<?php echo $dept_id ?>" />
                                                <input type="hidden" class="gameId" value="<?php echo $game_id ?>" />
                                                <button type="submit" name="accept" class="accept-btn" value="<?php echo $user_id; ?>">Accept</button>
                                            </td>
                                            <td>
                                                <button type="submit" name="reject" class="reject-btn" value="<?php echo $user_id; ?>">Reject</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                        <?php if ($query_row['user_role'] == 'Coordinator') { ?>
                            <div role="tabpanel" class="tab-pane fade" id="playerrequest">
                                <table id="sc-list" class="table table-bordered">
                                    <thead>
                                    <th class="text-center">s.no</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th colspan="2" class="text-center">Status</th>
                                    </thead>
                                    <tbody id="coordinators">
                                    <?php
                                    require_once 'includes/db_connect.php';
                                    $i = 1;
                                    $game_id = $query_row['g_id'];
                                    $dept_id = $query_row['dept_id'];
                                    $user_id = $query_row['user_id'];

                                    $query1 = "SELECT * FROM users WHERE dept_id = '$dept_id' AND user_role= 'Sub-coordinator' AND user_id!='$user_id' AND status_id='0'";
                                    $query1_run = mysqli_query($mysqli, $query1);
                                    while ($query1_row = mysqli_fetch_assoc($query1_run)) {
                                        $user_id = $query1_row['user_id'];
                                        $name = $query1_row['username'];
                                        $email = $query1_row['email'];
                                        $status = $query1_row['status_id'];?>
                                        <tr>
                                            <!--   This is for Coordinator to see the list of sub-coordinators-->
                                            <td><input type="hidden" name="id" value=""/><?php echo $i++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td>
                                               <input type="hidden" class="deptId" value="<?php echo $dept_id ?>" />
                                                <input type="hidden" class="gameId" value="<?php echo $game_id ?>" />
                                                <button type="submit" name="accept" class="accept-btn" value="<?php echo $user_id; ?>">Accept</button>
                                            </td>
                                            <td>
                                                <button type="submit" name="reject" class="reject-btn" value="<?php echo $user_id; ?>">Reject</button>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>

                        <?php if ($query_row['user_role'] == 'Sub-coordinator') { ?>
                        <?php
                        $query_sc_id       = "SELECT * FROM sub_coordinator WHERE user_id='$user_id' AND dept_id = '$dept_id' AND g_id='$game_id'";
//                        var_dump($query_sc_id);
                        $query_run_sc_id   = mysqli_query($mysqli, $query_sc_id);
                        $query_row_sc_id   = mysqli_fetch_assoc($query_run_sc_id);
//                        var_dump($query_row_sc_id);
                        $sc_id             = $query_row_sc_id['sc_id'];
//                                                        echo "sc_id ";
//                                                        var_dump($query_row_sc_id);
                        $query_list_teams       = "SELECT * FROM teams WHERE dept_id = '$dept_id' AND g_id='$game_id'";
                        $query_run_list_teams   = mysqli_query($mysqli, $query_list_teams); ?>

                        <div role="tabpanel" class="tab-pane fade" id="createteam">
                        <!-- Team Logo -->
                         <form action="uploadteamlogo.php?sc_id=<?php echo $sc_id; ?>&dept_id=<?php echo $dept_id; ?>" method="post" enctype="multipart/form-data">
                            <label class="control-label" for="fileToUpload">Select Team Logo</label>
                            <div class="controls">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        <div class="row form-group">
                            <div class="col-xs-8">
                                <input type="text" autocomplete="off" name="teamname" id="teamname" required="required" class="text-center form-control" placeholder="Enter Team Name" class="form-control">
                            </div>
                            <div class="col-xs-4">
                                <div class="controls">
                                    <select id="Game" name="game" class="form-control">
                                        <option value="NULL">Select Game</option>
                                        <?php
                                        require_once 'includes/db_connect.php';
                                        $query_games                = "SELECT * FROM games";
                                        $query_run_games            = mysqli_query($mysqli, $query_games);
                                        while ($query_row_games     = mysqli_fetch_assoc($query_run_games))
                                        { ?>
                                            <option value="<?php echo $query_row_games['g_id']; ?>">
                                                <?php echo $query_row_games['g_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->
                        <div class="text-center" >
                                <button type="submit" name="addteam" class="btn btn-info form-control">Add Team</button>
                        </div>
                        </form>
                            <!-- display List of teams that belongs to this sub-coordinator -->
                        <div class="list-of-teams">

                                <table class="table table-bordered" id="players-list">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Dept Id</th>
                                            <th class="text-center">Game ID</th>
                                            <th class="text-center">SC ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($query_row_list_teams   = mysqli_fetch_assoc($query_run_list_teams)){ ?>
                                    <tr>
                                      <td><?php echo $query_row_list_teams['team_id'] ?></td>
                                      <td><?php echo $query_row_list_teams['team_name'] ?></td>
                                      <td><?php echo $query_row_list_teams['dept_id'] ?></td>
                                      <td><?php echo $query_row_list_teams['g_id'] ?></td>
                                      <td><?php echo $query_row_list_teams['sc_id'] ?></td>
                                    </tr>
                                    <?php }
                                    //      echo"list teams";
                                    //      var_dump($query_row_list_teams);
                                    ?>

                                    </tbody>
                                </table>

                            </div> <!-- list-of-teams -->
                        </div>
                        </div>
                    </div>
                <?php }?>
                    </div><!-- Profile-inner end -->
                </div>
            </div><!-- row end -->
        </div> <!-- profile left end -->
    </div><!--profile-body end -->
        </div><!-- sp-profile end -->
        </div>
    </div><!-- general-section end -->
    </div><!-- container end -->
<?php
}
//include footer template
include('layout/footer.php');
?>