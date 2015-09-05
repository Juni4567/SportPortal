<?php session_start();
if(isset($_SESSION['logged_user'])){?>
 <?php include('parts/header.php'); ?>
 <?php include('parts/sidebar.php'); ?>
 <div class="main-container">
   <?php include('parts/navigation.php'); ?>
  <div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
    <?php include('parts/dashboard.php'); ?>
    <?php include('parts/users-add.php'); ?>

  </div>
</div>
<?php include('parts/footer.php'); ?>
<?php } else{
    echo "<h1>You are not logged in or you don't have access to this page </h1>";
}
?>