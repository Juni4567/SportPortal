<?php session_start();
if(isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin'){?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
            <h1>Update Scores here</h1>
        </div>
    </div>
    <?php include('parts/footer.php'); ?>
<?php } else{
    header('location: login.php');
}
?>