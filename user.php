<?php
//include header template
include('layout/header.php');
if(isset($_SESSION['logged_user']))
{
//    Ftploy test
    require_once 'includes/db_connect.php';
    $query = "SELECT * FROM users WHERE username = '$logged_user'";
    $query_run = mysqli_query($mysqli, $query);
    $query_row = mysqli_fetch_assoc($query_run);
?>
    <div class="general-section">
        <div class="container">
            <div class="sp-profile">
                <div class="profile-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="sp-userimg">
                                <img src="<?php echo "uploads/profile/". $query_row['images'];?>" alt="<?php echo $query_row['username'];?>"/>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="userinfo">
                                <h2><?php echo $query_row['fullname']; ?> &#9670; <span class="user-age"><?php echo $query_row['age']; ?></span>
                                    <span class="profile-status">
                                        <?php
                                            if($query_row['user_role']=='Coordinator'){
                                        ?>
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <?php  } ?>
                                        <?php
                                         if($query_row['user_role']=='Player'){
                                        ?>
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <?php  } ?>
                                        <?php
                                        if($query_row['user_role']=='sub-Coordinator'){
                                            ?>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <?php  } ?>

                                </h2>

                                <div class="user-bio"><span class="teamname glyphicon glyphicon-globe"><?php echo $query_row['dept_id']; ?> </span>
                                    <span class="languages glyphicon glyphicon-comment"><?php echo $query_row['languages']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-body">
                    <div class="profile-left">
                        <div class="row">`
                            <div class="col-sm-3">
                                <div class="sp-profile-nav">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pils" role="tablist">
                                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Notifications</a></li>
                                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                                        <li role="presentation"><a href="#playerrequest" aria-controls="playerrequest" role="tab" data-toggle="tab">Player Requests</a></li>
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
                                            <p>Please describe your sports history here. What sports did you played in the past and what are the most interesting sports that you want to play. why did you register for this sport?</p>

                                            <h2>Life Events</h2>
                                            <p>Any life events that you want to share. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur exercitationem hic itaque quasi quia similique sunt voluptate! Architecto esse et inventore magnam porro quae? Ad delectus enim hic voluptatum?</p>

                                            <h2>Awards</h2>
                                            <p>Any awards you have received. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur exercitationem hic itaque quasi quia similique sunt voluptate! Architecto esse et inventore magnam porro quae? Ad delectus enim hic voluptatum?</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="messages">sdfsdfa</div>
                                        <div role="tabpanel" class="tab-pane fade" id="settings">
                                            <form action="upload.php" method="post" enctype="multipart/form-data">

                                                <label class="control-label" for="fileToUpload">Select profile picture:</label>
                                                <div class="controls">
                                                <input type="file" name="fileToUpload" id="fileToUpload">
                                                <input type="submit" value="Upload Image" name="submit" class="btn btn-default" style="margin: 5px 0;">
                                                </div>
                                            </form>
                                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="">
                                                <!-- Text input-->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="username">User Name</label>
                                                        <div class="controls">
                                                            <input placeholder="<?php echo $query_row['username']; ?>" type="text" class="form-control" required="" min="3" disabled>
                                                            <div class="username_availability_result" id="username_availability_result"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="fullname">Full name</label>
                                                        <div class="controls">
                                                            <input id="fullname" placeholder="<?php echo $query_row['fullname']; ?>" name="fullname" type="text" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Email input-->
                                                <label class="control-label" for="email">Email</label>
                                                <div class="controls">
                                                    <input id="email" placeholder="<?php echo $query_row['email']; ?>" name="email" type="email" class="form-control" required="">
                                                </div>

                                                <!-- Password input-->
                                                <label class="control-label" for="password">Password</label>
                                                <div class="controls">
                                                    <input id="password" name="password" type="password" class="form-control" required="">
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="Age">Age</label>
                                                        <div class="controls">
                                                            <input id="Age" placeholder="<?php echo $query_row['age']; ?>" name="age" type="number" class="form-control" required="" min="14" pattern="\d*" step="1" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="Gender">Gender</label>
                                                        <div class="controls">
                                                            <input id="gender" placeholder="<?php echo $query_row['gender']; ?>"class="form-control" disabled>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Select Basic -->
                                                <label class="control-label" for="Department">Department</label>
                                                <div class="controls">
                                                    <input id="department" placeholder="<?php echo $query_row['dept_id']; ?>"class="form-control">
                                                </div>

                                                <!-- Select Basic -->
                                                <label class="control-label" for="User role">User Role</label>
                                                <div class="controls">
                                                    <input id="department" placeholder="<?php echo $query_row['user_role']; ?>" class="form-control" disabled>
                                                </div>

                                                <!-- Select Basic -->
                                                <label class="control-label" for="Game">Game</label>
                                                <div class="controls">
                                                    <input id="department" placeholder="<?php echo $query_row['g_id']; ?>"class="form-control">
                                                </div>

                                                <!-- Button -->
                                                <label class="control-label" for="register"></label>
                                                <div class="controls text-right">
                                                    <button id="register" type="submit" name="register" class="btn btn-primary">Update</button>
                                                    <button id="register" type="reset" name="register" class="btn btn-primary">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="playerrequest">
                                            <table class="table table-bordered">
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
                                            $query1 = "SELECT * FROM users WHERE g_id='$game_id' and dept_id = '$dept_id' and user_id!='$user_id'";
                                            $query1_run = mysqli_query($mysqli, $query1);
                                            while($query1_row = mysqli_fetch_assoc($query1_run))
                                            {
                                                $user_id = $query1_row['user_id'];
                                                $name = $query1_row['username'];
                                                $email = $query1_row['email'];
                                                $status = $query1_row['status_id'];?>
                                                <tr>
                                                    <td><input type="hidden" name="id" value="<?php echo $user_id;?>" /><?php echo $i;?></td>
                                                    <td ><?php echo $name;?></td>
                                                    <td><?php echo $email;?></td>
                                                    <td><button type="submit" name="accepted">Accepted</button></td>
                                                    <td><button type="submit" name="rejected">Rejected</button></td>
                            
                                                </tr>
                                            <?php
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
//include header template
include('layout/footer.php');
?>