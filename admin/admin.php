<?php
$file = $_SERVER['REQUEST_URI'];
$file_name = basename( $file );
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">

	<link rel="shortcut icon" href="assets/img/favicon/favicon.ico">

	<title>Sport Portal Administration</title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link href="assets/css/vendors.min.css" rel="stylesheet"/>
	<link href="assets/css/styles.min.css" rel="stylesheet"/>

	<link href="assets/css/custom.css" rel="stylesheet"/>

</head>

<body scroll-spy="" id="top" class=" theme-template-dark theme-amber alert-open alert-with-mat-grow-top-right">
<main>
	<?php require_once __DIR__ . '/parts/sidebar.php'; ?>

	<div class="main-container">

		<?php require_once __DIR__ . '/parts/navbar.php'; ?>

		<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
			<?php
			$file = __DIR__ . "/parts/$file_name";

			if ( file_exists( $file ) ) {
				include $file;
			}
			?>
		</div>
	</div>
</main>
<script charset="utf-8" src="assets/js/vendors.min.js"></script>


<?php
	if(function_exists('footer_scripts')) :
		footer_scripts();
	endif;
?>

</body>
</html>