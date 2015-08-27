<?php
session_start();
error_reporting(0);
include('../session.php');
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
					<ul class="nav navbar-nav sp-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="scores.php">LIVE SCORE</a></li>
						<li><a href="departments.php">DEPARTMENTS</a></li>
						<li><a href="fixtures.php">FIXTURES</a></li>
						<li><a href="news.php">NEWS</a></li>
					</ul>
					<div class="yellow-bg">
						<a class="cta-btn-orange cta-header btn dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            LOGIN <span class='caret'></span>
                        </a>
                        <div class="dropdown-menu">
                        <?php include_once('layout/login.php'); ?>
						</div>
						<a href="#" data-toggle="modal" data-target="#sp_register">REGISTER</a>
				</div>
                <?php include_once('layout/register.php'); ?>
			</div> <!--container -->
		</nav>

	</header>
	<div id="main">
<!--        --><?php
//        echo $username;
//    ?>