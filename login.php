<?php
session_start();
if(isset($_POST['submit'])){

        require_once("db_connect.php");
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
        $result = $mysqli->query($sql);

        if (!$result->num_rows == 1) {
            echo "<p>Invalid username/password combination try again</p>";
        } else {
            $_SESSION['logged_user']= $username;
            $logged_user = $_SESSION['logged_user'];
            echo "<p>Logged in successfully as</p>" . $logged_user;
            echo "<a href='logout.php'>Logout</a> ";
            // do stuffs
            header('location:index.php');
        }
    }
else{
    $logged_user= $_SESSION['logged_user'];
    echo "<p>Logged in successfully as</p>" . $logged_user;
    echo "<a href='logout.php'>Logout</a> ";
}
?>