<?php
//include header template
include('layout/header.php');
if(isset($_SESSION['logged_user']))
{
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
                                <img src="<?php echo $query_row['images'];?>" alt="<?php echo $query_row['username'];?>"/>
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
                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur exercitationem hic itaque quasi quia similique sunt voluptate! Architecto esse et inventore magnam porro quae? Ad delectus enim hic voluptatum?</p>

                                            <h2>Life Events</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur exercitationem hic itaque quasi quia similique sunt voluptate! Architecto esse et inventore magnam porro quae? Ad delectus enim hic voluptatum?</p>

                                            <h2>Awards</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur exercitationem hic itaque quasi quia similique sunt voluptate! Architecto esse et inventore magnam porro quae? Ad delectus enim hic voluptatum?</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="messages">sdfsdfa</div>
                                        <div role="tabpanel" class="tab-pane fade" id="settings">
                                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                                Select profile picture:
                                                <input type="file" name="fileToUpload" id="fileToUpload">
                                                <input type="submit" value="Upload Image" name="submit" class="btn sp-cta">
                                            </form>
                                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="">
                                                <!-- Text input-->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="username">User Name</label>
                                                        <div class="controls">
                                                            <input id="user_name" name="username" type="text" class="form-control" required="" min="3">
                                                            <div class="username_availability_result" id="username_availability_result"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="fullname">Full name</label>
                                                        <div class="controls">
                                                            <input id="fullname" name="fullname" type="text" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Email input-->
                                                <label class="control-label" for="email">Email</label>
                                                <div class="controls">
                                                    <input id="email" name="email" type="email" class="form-control" required="">
                                                </div>

                                                <!-- Password input-->
                                                <label class="control-label" for="password">Password(We need it once so be careful)</label>
                                                <div class="controls">
                                                    <input id="password" name="password" type="password" class="form-control" required="">

                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="Age">Age</label>
                                                        <div class="controls">
                                                            <input id="Age" name="age" type="number" class="form-control" required="" min="14" pattern="\d*" step="1" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="control-label" for="Gender">Gender</label>
                                                        <div class="controls">
                                                            <select id="Gender" name="gender" class="form-control">
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Select Basic -->
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

                                                <!-- Select Basic -->
                                                <label class="control-label" for="User role">User Role</label>
                                                <div class="controls">
                                                    <select id="User role" name="role" class="form-control">
                                                        <option value="Co-ordinator">Coordinator</option>
                                                        <option value="Sub-coordinator">Sub-coordinator</option>
                                                        <option value="Player">Player</option>
                                                    </select>
                                                </div>

                                                <!-- Select Basic -->
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

                                                <!-- Button -->
                                                <label class="control-label" for="register"></label>
                                                <div class="controls text-right">
                                                    <button id="register" type="submit" name="register" class="btn btn-primary btn-lg sp-cta">Register</button>
                                                </div>
                                            </form>
                                        </div>
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