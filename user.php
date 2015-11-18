<?php
//include header template
include('layout/header.php');
if (isset($_SESSION['logged_user'])) {
//    Ftploy test
    require_once 'includes/db_connect.php';
    $query = "SELECT * FROM users WHERE username = '$logged_user'";
    $query_run = mysqli_query($mysqli, $query);
    $query_row = mysqli_fetch_assoc($query_run);
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

                            <div class="user-bio"><span class="teamname glyphicon glyphicon-globe"><?php echo $query_row['dept_id']; ?> </span>
                                <span class="languages glyphicon glyphicon-comment"><?php echo $query_row['languages']; ?></span>
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
                            <?php if ($query_row['user_role'] == 'Sub-coordinator') { ?>
                                <li role="presentation"><a href="#playerrequest" aria-controls="playerrequest" role="tab"
                                                           data-toggle="tab">Player Requests</a></li>
                                <li role="presentation"><a href="#createteam" aria-controls="createteam" role="tab"
                                                           data-toggle="tab">Create team</a></li>
                            <?php } ?>
                            <?php if ($query_row['user_role'] == 'Coordinator') { ?>
                                <li role="presentation"><a href="#playerrequest" aria-controls="playerrequest" role="tab"
                                                           data-toggle="tab">Sub-Coordinators Request</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="profile-inner">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                <h2>Tagline</h2>
                                <p><?php echo $query_row['introduction']; ?></p>
                                <h2>Sports History</h2>
                                <p>Please describe your sports history here. What sports did you played in the
                                    past and what are the most interesting sports that you want to play. why did
                                    you register for this sport?</p>

                                <h2>Life Events</h2>

                                <p>Any life events that you want to share. Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Aliquid consequuntur exercitationem hic itaque
                                    quasi quia similique sunt voluptate! Architecto esse et inventore magnam
                                    porro quae? Ad delectus enim hic voluptatum?</p>

                                <h2>Awards</h2>

                                <p>Any awards you have received. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Aliquid consequuntur exercitationem hic itaque quasi quia
                                    similique sunt voluptate! Architecto esse et inventore magnam porro quae? Ad
                                    delectus enim hic voluptatum?</p>
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
                                    $game_id = $query_row['g_id'];
                                    $dept_id = $query_row['dept_id'];
                                    $user_id = $query_row['user_id'];

                                    $query1 = "SELECT * FROM users WHERE g_id='$game_id' AND dept_id = '$dept_id' AND user_role= 'Player' AND user_id!='$user_id' AND status_id= 0 ";
                                    $query1_run = mysqli_query($mysqli, $query1);
                                    while ($query1_row = mysqli_fetch_assoc($query1_run)) {
                                        $user_id = $query1_row['user_id'];
                                        $name = $query1_row['username'];
                                        $email = $query1_row['email'];
                                        $status = $query1_row['status_id'];?>
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
                                    <tbody>
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
                        <div role="tabpanel" class="tab-pane fade" id="createteam">
                             <form action="uploadteamlogo.php" method="post" enctype="multipart/form-data">
                                    <label class="control-label" for="fileToUpload">Select Team Logo</label>
                                    <div class="controls">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <input type="submit" value="Upload Image" name="submit"
                                               class="btn btn-default" style="margin: 5px 0;">
                                    </div>
                                                    </form>

                            <form method="post" action="user.php?">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <input type="text" autocomplete="off" name="teamname" id="teamname" required="required" class="text-center form-control" placeholder="Enter Team Name" class="form-control">
                            </div><br></br>
                            <div class="col-xs-4">
                                <label class="control-label" for="Department">Department</label>
                                            <div class="controls">
                                                <select id="Department" name="department" placeholder="select" class="form-control">
                                                    <?php
                                                        require_once 'includes/db_connect.php';
                                                        $query = "SELECT * FROM departments";
                                                        $query_run = mysqli_query($mysqli, $query);
                                                        while ($query_row = mysqli_fetch_assoc($query_run))
                                                            {
                                                    ?>
                                                    <option value="<?php echo $query_row['dept_id']; ?>">
                                                        <?php echo $query_row['dept_name']; ?>
                                                    </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                            <div class="col-xs-4">
                                <label class="control-label" for="Game">Game</label>
                                            <div class="controls">
                                                <select id="Game" name="game" class="form-control">
                                                    <?php
                                                    require_once 'includes/db_connect.php';
                                                    $query = "SELECT * FROM games";
                                                    $query_run = mysqli_query($mysqli, $query);
                                                    while ($query_row = mysqli_fetch_assoc($query_run))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $query_row['g_id']; ?>">
                                                            <?php echo $query_row['g_name']; ?>
                                                        </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                            <div class="col-xs-4">
                                <label class="control-label" for="Sub-coordinator">Sub-coordinator</label>
                                            <div class="controls">
                                                <select id="Sub-coordinator" name="subcoordinator" class="form-control">
                                                    <?php

                                                    $query2 = "SELECT * FROM users WHERE user_role = 'Sub-coordinator'";
                                                    $query2_run = mysqli_query($mysqli, $query2);
                                                    while ($query2_row = mysqli_fetch_assoc($query2_run)) {
                                                        $user_id = $query2_row['user_id'];
                                                        // Select from subcoordinator table to find the sc_id of the user
                                                        $query_find_sc_id = "SELECT * FROM sub_coordinator WHERE user_id = '$user_id'";
                                                        $query_run_find_sc_id = mysqli_query($mysqli, $query_find_sc_id);
                                                        $query_row_sc_id = mysqli_fetch_assoc($query_run_find_sc_id);
                                                    ?>
                                                    <option value="<?php echo $query_row_sc_id['sc_id']; ?>">
                                                            <?php echo $query2_row['fullname']; ?>
                                                    </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                            </div>
                            <div class="col-xs-4 text-center" >
                            </div>
                        <div class="col-xs-4 text-center" >
                            <label class="control-label" for=""></label>
                                <button type="submit" name="addteam" class="btn btn-info form-control">Add Team</button>
                        </div>
                    </div>
                </div>
                        <?php
                        if (isset($_POST['addteam'])) {
                            $teamname = $_POST["teamname"];
                            $dept = $_POST["department"];
                            $game = $_POST["game"];
                            $sc = $_POST['subcoordinator'];
                            $query_insert = "INSERT INTO teams (team_name, dept_id, g_id, sc_id) VALUES('$teamname', '$dept', '$game' , '$sc')";
                            $query_run_insert = mysqli_query($mysqli, $query_insert);
                            if($query_run_insert){
                                echo "success";
                            }
                            else{
                                echo"failed";
                            }
                        }
                        ?>
                    </form>
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