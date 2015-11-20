<?php session_start();
if(isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin'){?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
          <section class="dashboard">
          <div class="well white addnews-table text-center">
            <h2>Schedule generated successfully</h2>
              <a class="btn btn-success" href="schedule.php#table-area-1">Click here to perform any action on matches</a>
          </div>

        </section>
        </div>
    </div>
    <?php include('parts/footer.php'); ?>
<?php } else{
    header('location: login.php');
}
?>