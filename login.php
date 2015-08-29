<?php
session_start();
if(!isset($_SESSION['logged_user'])){

    if (!isset($_POST['submit'])){   ?>
        <!-- The HTML login form -->
        <form action='<?php $_SERVER['PHP_SELF']?>' method='post'>
            <label for='name'>Username</label>
            <input id='name' type='text' class='form-control' name='username'>
            <label for='password'>Password</label>
            <input id='password' type='password' class='form-control form-control' name='password'>
            <input type='submit' name='submit' value='Login' class='btn btn-primary pull-right sp-login'>
        </form>
    <?php
    }
    else {
        require_once("db_connect.php");
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
        $result = $mysqli->query($sql);

        if (!$result->num_rows == 1) {
            echo "<p>Invalid username/password combination try again</p>";
            ?>
            <form action='<?php $_SERVER['PHP_SELF']?>' method='post'>
                <label for='name'>Username</label>
                <input id='name' type='text' class='form-control' name='username'>
                <label for='password'>Password</label>
                <input id='password' type='password' class='form-control form-control' name='password'>
                <input type='submit' name='submit' value='Login' class='btn btn-primary pull-right sp-login'>
            </form>
        <?php
        } else {
            $_SESSION['logged_user']= $username;
            $logged_user = $_SESSION['logged_user'];
            echo "<p>Logged in successfully as</p>" . $logged_user;
            echo "<a href='logout.php'>Logout</a> ";
            // do stuffs
        }
    }
}
else{
    $logged_user= $_SESSION['logged_user'];
    echo "<p>Logged in successfully as</p>" . $logged_user;
    echo "<a href='logout.php'>Logout</a> ";
}
?>