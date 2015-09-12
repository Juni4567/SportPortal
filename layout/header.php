<?php
    session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sport Portal</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css"/>
	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans|Oswald|Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/styles.css">
    <script src="assets/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#user_name').focusout(function(){
                var user_name = $('#user_name').val();


                if(user_name.length > 2) {
                    $('#username_availability_result').html('Loading..');
                    var post_string = 'username='+user_name;
                    $.ajax({
                        type : 'POST',
                        data : post_string,
                        url  : 'username-check.php',
                        success: function(responseText){
                            if(responseText == 0){
                                $('#username_availability_result').html('<span class="success">Congratulatios! username available :)</span>');
                            }else if(responseText > 0){
                                $('#username_availability_result').html('<span class="error">:( Username already taken</span>');
                            }else{
                                alert('Problem with mysql query');
                            }
                        }
                    });
                }else  if(user_name.length<3){
                    $('#username_availability_result').html('<span class="error">Minimum 3 characters required</span>');
                }
                else{
                    $('#username_availability_result').html('');
                }
            });
        });
    </script>
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
					<a class="navbar-brand" href="index.php"><img class="img-responsive" src="assets/images/Logo.png" alt="Sport portal"></a>
				</div>
				<div class="collapse navbar-collapse" id="navigation-list">
					<ul class="nav navbar-nav sp-nav">
						<li id="scores"><a href="scores.php">LIVE SCORE</a></li>
                        <li id="fixtures"><a href="fixtures.php">FIXTURES</a></li>
                        <li id="dept"><a href="departments.php">TEAMS</a></li>
						<li id="news"><a href="news.php">NEWS</a></li>
					</ul>
					<div class="yellow-bg">
						<a class="cta-btn-orange cta-header btn dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
							<?php
								if(isset($_SESSION['logged_user']))
								{
									echo $_SESSION['logged_user']. " ";
								}
								else{
									echo "LOGIN ";
								}
							?><span class='caret'></span>
						</a>
						<div class="dropdown-menu">
							<?php 
							
							if(isset($_SESSION['logged_user']))
							{
								$logged_user= $_SESSION['logged_user'];
								echo "<p>Welcome ". $logged_user. "</p>";
								echo "<a href='logout.php'>Logout</a> ";
							} else{
								?>
								<form action='login.php' method='post' class="sp-form">
									<label for='name'>Username</label>
									<input id='name' type='text' class='form-control' name='username'>
									<label for='password'>Password</label>
									<input id='password' type='password' class='form-control form-control' name='password'>
									<input type='submit' name='submit' value='Login' class='btn btn-primary pull-right sp-login'>
								</form>
								<?php
							}
							?>
						</div>
                        <?php if(!isset($_SESSION['logged_user'])){ ?>
                            <a href="#" data-toggle="modal" data-target="#sp_register">REGISTER</a>
                        <?php } ?>
					</div>
<!--                        pasting register code-->
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

                                    if (!isset($_POST['register'])) {
                                        ?>
                                        <!-- The HTML registration form -->
                                        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="sp-form">
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
                                                <input id="email" name="email" type="text" class="form-control" required="">
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
                                                    <!--                                                <option value="urdu">Urdu</option>-->
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
                                                <button id="register" type="submit" name="register" class="btn btn-primary btn-lg sp-cta">Register</button>
                                            </div>
                                        </form>

                                    <?php
                                    }
                                    if(isset($_POST['register'])){
                                        ?>
                                        <script>
                                        $( document ).ready(function() {
                                            $("#sp_register").modal('show');
                                            console.log("model opened");
                                        });
                                        </script>
                                        <?php
                                        // query database
                                        require_once("includes/db_connect.php");
                                        // prepare data for insertion
                                        $username	= $_POST["username"];
                                        $fullname	= $_POST["fullname"];
                                        $email		= $_POST["email"];
                                        $password	= $_POST["password"];
                                        $age        = $_POST["age"];
                                        $gender     = $_POST["gender"];
                                        $department = $_POST["department"];
                                        $role       = $_POST["role"];
                                        $game       = $_POST["game"];
                                        // check if username and email exist else insert
                                        $result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
                                        $email_exist = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
                                        if ($result->num_rows == 1 || $email_exist->num_rows ==1) {
                                            echo "<div class='alert alert-danger' role='alert'>Username <?php echo $username; ?> or email<?php echo $email; ?> already exist</div>";
                                            ?>
                                            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="sp-form">
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
                                                            <input id="Age" name="age" type="number" class="form-control" required="" min="14" max="90" pattern="\d*" step="1" >
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
                                                        <!--                                                <option value="urdu">Urdu</option>-->
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
                                        }
                                        else {
                                            // insert data into mysql database
                                            $sql = "INSERT INTO users (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `g_id`)
                                            VALUES                      (NULL, '$username', '$fullname', '$email', '$password', '$age', '$gender', '$department', '$role', '$game')";
                                            //$sql = "INSERT  INTO `users` (`user_id`, `username`, 'fullname', `email`, `password`, `age`, `gender`)
                                            //VALUES (26, '{$username}', '{$fullname}', '{$email}', '{$password}', '{$age}', '{$gender}')";
                                            if ($mysqli->query($sql)) {
                                                //echo "New Record has id ".$mysqli->insert_id;
                                                echo "<div class='alert alert-success' role='alert'>Registered successfully! Please login to continue.</div>";
                                            } else {
                                                echo "MySQL error no {$mysqli->errno} : {$mysqli->error}";
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

<!--                    pasting register code-->
				</div> <!--container -->
			</nav>

		</header>
		<div id="main">
            <?php if(isset($_SESSION['logged_user'])){ ?>
                <ul class="nav nav-justified sp-left-bar-fixed">
                    <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-heart"></i></a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
                </ul>
                <?php } ?>
