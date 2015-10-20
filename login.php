<?php
session_start();
if ( ! isset( $_POST['submit'] ) ) {
	header( 'location: index.php' );
}
if ( isset( $_POST['submit'] ) ) {

	require_once( "includes/db_connect.php" );
	$username = $_POST['username'];
	$password = $_POST['password'];
    //find if the email has @ sign in it
    $findme   = '@';

    if(strpos($username, $findme)){
    $sql    = "SELECT * from users WHERE email = '$username' AND password = '$password' LIMIT 1";
    $result = $mysqli->query( $sql );
    $row    = $result->fetch_assoc();
    }
    else{
	$sql    = "SELECT * from users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $mysqli->query( $sql );
	$row    = $result->fetch_assoc();
    }
	if ( $result->num_rows == 0 ) {
		echo "<div class='alert alert-danger'>Invalid username/password combination try again</div>";
        include_once('index.php');
	} else {
		$_SESSION['logged_user'] = $row['username'];
		$_SESSION['user_role']   = $row['user_role'];
		$_SESSION['user_email']  = $row['email'];

		if ( $_SESSION['user_role'] == 'Admin' ) {
			header( 'location: admin.php' );

		} else {
			echo "<p>Logged in successfully as</p>" . $_SESSION['logged_user'];
			echo "<a href='logout.php'>Logout</a> ";
			// do stuffs
			header( 'location:user.php' );
		}
	}
}