<?php
session_start();
if ( ! isset( $_POST['update'] ) ) {
    ?>
    <script> alert("Invalid access parameter! Click OK to go back");
        window.location.assign("index.php");
    </script>
<?php
}
if ( isset( $_POST['update'] ) ) {
//    var_dump($_POST);exit;
    $userid         = $_GET['u_id'];
    $fullname       = $_POST['fullname'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $age            = $_POST['age'];

    require_once 'includes/db_connect.php';
    $query = "update users set fullname = '$fullname', email ='$email', password= '$password', age ='$age' where user_id='$userid'";
    $query_run = mysqli_query($mysqli, $query);
    if($query_run){?>
        <script>window.location.assign("user.php");</script>
    <?}
    else {
        ?>
        <script>alert("error Updating your information please try again!");</script>
    <?php }
}