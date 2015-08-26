<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sport Portal</title>
	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans|Oswald|Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/styles.css">
</head>

<body class="sp-body">

	<header id="main-header">

		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-list">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img class="img-responsive" src="assets/images/Logo.png" alt="Sport portal"></a>
				</div>
				<div class="collapse navbar-collapse" id="navigation-list">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">LIVE SCORE</a></li>
						<li><a href="#">DEPARTMENTS</a></li>
						<li><a href="#">FIXTURES</a></li>
						<li><a href="#">NEWS</a></li>
					</ul>
					<div class="yellow-bg">
						<a class="cta-btn-orange cta-header btn dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">LOGIN <span class="caret"></span></a>
						<div class="dropdown-menu">
                            <?php
                            if (!isset($_POST['submit'])){
                                ?>
                                <!-- The HTML login form -->
                                <form action='<?=$_SERVER['PHP_SELF']?>' method='post'>
                                    <label for='name'>Username</label>
                                    <input id='name' type='text' class='form-control' name='username'>

                                    <label for='password'>Password</label>
                                    <input id='password' type='password' class='form-control form-control' name='password'>

                                    <input type='submit' name='submit' value='Login' class='btn btn-primary pull-right'>
                                </form>
                            <?php
                            } else {
                                require_once("db_connect.php");
                                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                # check connection
                                if ($mysqli->connect_errno) {
                                    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                                    exit();
                                }
                                $_SESSION['username']="";
                                $username = $_SESSION['username'] = $_POST['username'];
                                $password = $_POST['password'];

                                $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
                                $result = $mysqli->query($sql);
                                if (!$result->num_rows == 1) {
                                    echo "<p>Invalid username/password combination</p>";
                                    ?>
                                    <form action='<?=$_SERVER['PHP_SELF']?>' method='post'>
                                        <label for='name'>Username</label>
                                        <input id='name' type='text' class='form-control' name='username' value="<?php $username ?>">

                                        <label for='password'>Password</label>
                                        <input id='password' type='password' class='form-control form-control' name='password'>

                                        <input type='submit' name='submit' value='Login' class='btn btn-primary pull-right'>
                                    </form>
                            <?php
                                } else {
                                    echo "<p>Logged in successfully</p>";
                                    echo "<a href='logout.php'>Logout</a> ";
                                    // do stuffs
                                }
                            }
                            ?>

						</div>
						<a href="#" data-toggle="modal" data-target="#sp_register">REGISTER</a>
					</div>
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
                                    if (!isset($_POST['submit'])) {
                                    ?>	<!-- The HTML registration form -->
                                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
										<!-- Text input-->
										<div class="row">
											<div class="col-sm-6">
												<label class="control-label" for="username">User Name</label>
												<div class="controls">
													<input id="username" name="username" type="text" placeholder="User name" class="form-control" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<!-- Text input-->
												<label class="control-label" for="fullname">Full name</label>
												<div class="controls">
													<input id="fullname" name="Full name" type="text" placeholder="Full name" class="form-control" required="">
												</div>
											</div>
										</div>
										<!-- Password input-->
										<label class="control-label" for="email">Email</label>
										<div class="controls">
											<input id="email" name="email" type="text" placeholder="Email" class="form-control" required="">
										</div>

										<!-- Password input-->
										<label class="control-label" for="password">Password</label>
										<div class="controls">
											<input id="password" name="password" type="password" placeholder="Password" class="form-control" required="">
											
										</div>

										<div class="row">
											<div class="col-sm-6">
												<label class="control-label" for="Age">Age</label>
												<div class="controls">
													<input id="Age" name="age" type="number" placeholder="Your Age" class="form-control" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<label class="control-label" for="Gender">Gender</label>
												<div class="controls">
													<select id="Gender" name="Gender" class="form-control">
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>

											</div>
										</div>
										
										
										<!-- Select Basic -->
										<label class="control-label" for="Department">Department</label>
										<div class="controls">
											<select id="Department" name="department" class="form-control">
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
											<button id="register" type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
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
                                        $exists = 0;
                                        $result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
                                        if ($result->num_rows == 1) {
                                            $exists = 1;
                                            $result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
                                            if ($result->num_rows == 1) $exists = 2;
                                        } else {
                                            $result = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
                                            if ($result->num_rows == 1) $exists = 3;
                                        }

                                        if ($exists == 1) echo "<p>You are already registered</p>";
                                        else if ($exists == 2) echo "<p>Username and Email already exists! or you are already logged in <a href=\"logout.php\">logout</a></p>";
                                        else if ($exists == 3) echo "<p>Email already exists!</p>";
                                        else {
                                            # insert data into mysql database
                                        $sql = "INSERT INTO `sp_db`.`users` (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `c_id`, `g_id`)
                                        VALUES                              (NULL, '$username', '$fullname', '$email', '$password', '$age', '$gender', '$department', '$role', NULL, '$game')";
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
			</div>
		</nav>

	</header>
	<div id="main">
<!--        --><?php
//        echo $username;
//    ?>