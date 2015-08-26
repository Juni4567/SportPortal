<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
	<div class="container-fluid admin-class nopadding">
		<div class="row nopadding">
			<div class="col-sm-3 nopadding">
				<div class="sp-left-sidebar">
					<div class="row nopadding">
						<div class="col-sm-4 nopadding">
							<div class="admin-menu">
								<ul>
									<li>
										<a href="#"><i class="fa fa-home fa-4x"></i></a>
									</li>
									<li>
										<a href="#teams"><i class="fa fa-users fa-4x"></i></a>
									</li>
									<li>
										<a href="#schedule"><i class="fa fa-users fa-calendar-check-o fa-4x"></i>
										</a>
									</li>
									<li>
										<a href="#scoreUpdates"><i class="fa  fa-bar-chart  fa-4x"></i></a>
									</li>
									<li>
										<a href="#messages"><i class="fa fa-users fa-weixin fa-4x"></i></a>
									</li>
								</ul>
							</div> <!-- admin-menu end -->
						</div>
						<div class="col-sm-8 nopadding">
							<div class="submenu">
								<h2>Teams</h2>
								<div class="submenu-item">
									<a href="#">Cricket</a>
									<ul class="dropdown">
										<li><a href="#">Physics</a></li>
										<li><a href="#">Chemistry</a></li>
										<li><a href="#">Biology</a></li>
										<li><a href="#">Math</a></li>
									</ul>
								</div>
								<div class="submenu-item">
									<a href="#">Football</a>
									<ul class="dropdown">
										<li><a href="#">Physics</a></li>
										<li><a href="#">Chemistry</a></li>
										<li><a href="#">Biology</a></li>
										<li><a href="#">Math</a></li>
									</ul>
								</div>
								<div class="submenu-item">
									<a href="#">Tennis</a>
									<ul class="dropdown">
										<li><a href="#">Physics</a></li>
										<li><a href="#">Chemistry</a></li>
										<li><a href="#">Biology</a></li>
										<li><a href="#">Math</a></li>
									</ul>
								</div>
								<div class="submenu-item">
									<a href="#">Vollyball</a>
									<ul class="dropdown">
										<li><a href="#">Physics</a></li>
										<li><a href="#">Chemistry</a></li>
										<li><a href="#">Biology</a></li>
										<li><a href="#">Math</a></li>
									</ul>
								</div>
							</div> <!-- submenu end -->
						</div>
					</div>
					
					
				</div> <!--Left sidebar end-->
			</div>
			<div class="col-sm-9 nopadding">
				<nav class="navbar sp-admin-nav" role="navigation">
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Link</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#user">Junaid Anwar</a></li>
									<hr>
									<li><a href="#">Setting</a></li>
									<li><a href="../logout.php">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
				<div class="admin-body">
					<div class="well well-lg no-radius">
						<div class="row">
							<div class="col-sm-4 nopadding">
								<h1>Hello World</h1>
							</div>
							<div class="col-sm-4 nopadding">
								<h1>Hello World</h1>
							</div>
							<div class="col-sm-4 nopadding">
								<h1>Hello World</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div> <!-- Main container end -->
	

	<script src="../assets/scripts.js"></script>
</body>
</html>