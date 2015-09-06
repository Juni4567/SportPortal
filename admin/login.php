<?php session_start();
        if(isset($_SESSION['logged_user'])){
            header('location:index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico">

    <title>Login to your account</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="assets/css/vendors.min.css" rel="stylesheet"/>
    <link href="assets/css/styles.min.css" rel="stylesheet"/>

    <link href="assets/css/custom.css" rel="stylesheet"/>
</head>

<body class="page-login theme-template-dark theme-amber" init-ripples="">

<div class="center">
    <div class="card bordered z-depth-2" style="margin:0% auto; max-width:400px;">
        <div class="card-header">
            <div class="brand-logo">
                <img src="assets/images/logo.png" alt="">
            </div>
            <?php

            if (!isset($_POST['submit'])) {
            ?>
            <div class="card-content">

                <form class="form-floating" method="post" action="<?php $_SERVER['PHP_SELF']?>">

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">Email</label>
                        <input type="text" name="admin_email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Password</label>
                        <input type="password" name="admin_pass" class="form-control" id="inputPassword">
                    </div>
                    <div class="card-action clearfix">
                        <div class="pull-right">
                            <!--  <a href="password.html" class="btn btn-link"><span class="black-text">Forgot password</span></a>-->
                            <input type="submit" name="submit" value="Login" class="btn btn-link  black-text">
                        </div>
                    </div>
                </form>

            </div>
            <?php }
            if(isset($_POST['submit'])){

                $admin_email = $_POST['admin_email'];
                $admin_pass  = $_POST['admin_pass'];

                if(!strlen($admin_email) || !strlen($admin_pass)){
                    echo "<h2>Email or password not entered</h2>";
                }
                else{
                    //connect to database
                    require_once("includes/db_connect.php");

                    //find if the user exists or return if not
                    $sql = "SELECT * from users WHERE email LIKE '{$admin_email}' AND password LIKE '{$admin_pass}' AND user_role LIKE 'Admin' LIMIT 1";
                    $result = $mysqli->query($sql);


                    if (!$result->num_rows == 1) {
                        echo "<h2>Invalid email/password try again!</h2>";
                    }

                    //if found start session log user in
                    else {
                        $row = $result->fetch_assoc();

                        //store current users information in session
                        $_SESSION['logged_user']    = $row["username"];
                        $_SESSION['user_role']      = $row["user_role"];
                        $_SESSION['user_email']     = $admin_email;

                        echo "<p>Logged in successfully as</p>" . $_SESSION['logged_admin'];

                        //redirect to admin page
                        header('location: index.php');
                    }
                }

                }
            ?>


        </div>
    </div>

    <script charset="utf-8" src="assets/js/vendors.min.js"></script>
    <script charset="utf-8" src="assets/js/app.min.js"></script>
</body>
</html>