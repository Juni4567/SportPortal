<!-- Registration Modal -->
					<div class="modal fade sp-modal" id="sp_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Registration Form</h4>
								</div>
								<div class="modal-body">
                                    <?php
                                    require_once("db_connect.php");
                                    if (!isset($_POST['register'])) {
                                        ?>	<!-- The HTML registration form -->
                                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="sp-regform">
                                            <!-- Text input-->
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label" for="username">User Name</label>
                                                    <div class="controls">
                                                        <input id="username" name="username" type="text" class="form-control" required="">
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
                                            <!-- Password input-->
                                            <label class="control-label" for="email">Email</label>
                                            <div class="controls">
                                                <input id="email" name="email" type="text" class="form-control" required="">
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
                                                    <option value="1">IT</option>
                                                    <option value="2">Physics</option>
                                                    <option value="3">Chemistry</option>
                                                    <option value="4">Biology</option>
                                                    <option value="5">Zoology</option>
                                                    <option value="6">Botony</option>
                                                    <option value="7">Geology</option>
                                                    <option value="8">CS</option>
                                                    <option value="9">Mathematics</option>
                                                    <option value="10">English</option>
                                                    <!--												<option value="urdu">Urdu</option>-->
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
                                                    <option value="1">Cricket</option>
                                                    <option value="2">Hockey</option>
                                                    <option value="3">Football</option>
                                                    <option value="4">Basketball</option>
                                                    <option value="5">Snooker</option>
                                                    <option value="6">Table tennis</option>
                                                    <option value="7">Squash</option>
                                                    <option value="8">Chess</option>
                                                    <option value="9">Volleyball</option>
                                                </select>
                                            </div>

                                            <!-- Button -->
                                            <label class="control-label" for="register"></label>
                                            <div class="controls text-right">
                                                <button id="register" type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                                            </div>
                                        </form>
                                    <?php
                                    } else {
                                        ## connect mysql server
                                        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                        # check connection
                                        if ($mysqli->connect_errno) {
                                            echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                                            exit();
                                        }
                                        ## query database
                                        # prepare data for insertion
                                        $username	= $_POST["username"];
                                        $fullname	= $_POST["fullname"];
                                        $email		= $_POST["email"];
                                        $password	= $_POST["password"];
                                        $age        = $_POST["age"];
                                        $gender     = $_POST["gender"];
                                        $department = $_POST["department"];
                                        $role       = $_POST["role"];
                                        $game       = $_POST["game"];


                                        # check if username and email exist else insert
                                        $result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
                                        $email_exist = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
                                        if ($result->num_rows == 1 || $email_exist) {
                                            echo "<p>That User name or email already exist</p>";
                                        }
                                        else {
                                            # insert data into mysql database
                                            $sql = "INSERT INTO `sp_db`.`users` (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `c_id`, `g_id`)
                                                    VALUES                      (NULL, '$username', '$fullname', '$email', '$password', '$age', '$gender', '$department', '$role', NULL, '$game')";
//                                            $sql = "INSERT  INTO `users` (`user_id`, `username`, 'fullname', `email`, `password`, `age`, `gender`)
//				                            VALUES (26, '{$username}', '{$fullname}', '{$email}', '{$password}', '{$age}', '{$gender}')";
                                            if ($mysqli->query($sql)) {
                                                //echo "New Record has id ".$mysqli->insert_id;
                                                echo "<p>Registred successfully!</p>";
                                            } else {
                                                echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
                                                exit();
                                            }
                                        }
                                    }
                                    ?>
</div>
</div>
</div>
</div><!--modal end-->
</div>