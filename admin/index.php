<?php session_start();
if(isset($_SESSION['logged_user'])){?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
            <?php include('parts/dashboard.php'); ?>
            <?php include('parts/users-add.php'); ?>

        </div>
    </div>
    <?php include('parts/footer.php'); ?>
<?php } else{
    header('location: login.php');
}
?>