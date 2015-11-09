<?php session_start();
if (isset($_SESSION['logged_user'])) {
    ?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
<?php include('parts/navigation.php'); ?>
        <div class="main-content">

  <section class="forms-advanced">
       <div class="row dashboard-content">

<?php require_once 'includes/db_connect.php';
$g_id   = $_GET['g_id'];
$query  = "SELECT * FROM teams WHERE g_id = '$g_id'";
$query_run = mysqli_query($mysqli, $query);
$query_works = mysqli_num_rows($query_run);
if(!$query_works){?>
    <div class="well white">
    <h2>No teams Found</h2>
    </div>
<?php }
else{
while ($query_row = mysqli_fetch_assoc($query_run)) {
    $did = $query_row['dept_id'];
    $query1 = "SELECT * FROM departments where dept_id = '$did'";
    $query1_run = mysqli_query($mysqli, $query1);
    $query1_row = mysqli_fetch_assoc($query1_run);
    $sc_name = $query_row['sc_id'];
    $query2 = "SELECT users.fullname FROM sub_coordinator inner join users on users.user_id = sub_coordinator.user_id where sub_coordinator.sc_id = '$sc_name'";
    $query2_run = mysqli_query($mysqli, $query2);
    $query2_row = mysqli_fetch_assoc($query2_run);
    ?>
    <div class="col-sm-4">
        <div class="well white" style="background: url('../assets/images/logo/1.jpg') no-repeat top right; background-size: contain; padding-right: 115px;">
				<h2 class="text-uppercase"><?php echo $query_row['team_name']; ?></h2>
            Supervised by Mr. <?php echo $query2_row['fullname']; ?>
            Department: <?php echo $query1_row['dept_name']; ?>
        </div>
    </div>

<?php }} ?>
</div>
</section>


  </div>
</div>
    <?php include('parts/footer.php'); ?>
<?php
} else {
    header('location: login.php');
}
?>