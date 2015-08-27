<?php
include_once('../session.php');
if (!isset($_POST['submit'])){
    ?>
    <!-- The HTML login form -->
    <form action='<?=$_SERVER['PHP_SELF']?>' method='post'>
        <label for='name'>Username</label>
        <input id='name' type='text' class='form-control' name='username'>

        <label for='password'>Password</label>
        <input id='password' type='password' class='form-control form-control' name='password'>

        <input type='submit' name='submit' value='Login' class='btn btn-primary pull-right sp-login'>
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
    $username = $_SESSION['username']= $_POST['username'];
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
        echo "<p>Logged in successfully as</p>" . $_SESSION['username'];
        echo "<a href='logout.php'>Logout</a> ";
        // do stuffs
    }
}
?>