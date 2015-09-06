<?php
session_start();
if(!isset($_POST['submit'])){
    header('location: index.php');
}
if(isset($_POST['submit'])){

        require_once("includes/db_connect.php");
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
        $result = $mysqli->query($sql);

        if (!$result->num_rows == 1) {
            echo "<p>Invalid username/password combination try again</p>";
        } else {
            $_SESSION['logged_user']= $username;
            echo "<p>Logged in successfully as</p>" . $_SESSION['logged_user'];
            echo "<a href='logout.php'>Logout</a> ";
            // do stuffs
            header('location:index.php');
        }
    }