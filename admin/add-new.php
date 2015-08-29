<?php
session_start();
if(isset($_SESSION['user'])!="")
{
    header("Location: index.php");
}
include_once 'includes/dbconnect.php';

if(isset($_POST['btn-signup']))
{
    $uname = mysql_real_escape_string($_POST['username']);
    $fullname = mysql_real_escape_string($_POST['fullname']);
    $email = mysql_real_escape_string($_POST['email']);
    $upass = md5(mysql_real_escape_string($_POST['password1']));

    if(mysql_query("INSERT INTO users(username,fullname,email,password) VALUES('$uname','$fullname','$email','$upass')"))
    {
        ?>
        <script>alert('successfully registered ');</script>
    <?php
    }
    else
    {
        ?>
        <script>alert('error while registering you...');</script>
    <?php
    }
}
?>

  <?php include('parts/header.php'); ?>
  <?php include('parts/sidebar.php'); ?>
  
  <div class="main-container">
      <?php include('parts/navigation.php'); ?>
      
      <div class="main-content">
          <!-- add new admin -->
          <?php include('parts/users-add.php'); ?>
          <!-- Existing admins -->
          <?php include('parts/users.php'); ?>
      </div> <!-- main-content end -->

</div> <!-- main-container end -->


<?php include('parts/footer.php'); ?>
