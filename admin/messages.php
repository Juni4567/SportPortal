<?php session_start();
if(isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin'){?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
        <section class="dashboard">
            <div class="page-header">
                <h1><i class="md md-input"></i> Notifications</h1>
                <p class="lead">Please accept or reject from the following coordinators</p>
            </div>
            <table class="table table-full m-b-60" id="table-area-1" fsm-big-data="data of data take 30">
                <thead>
                <tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
                    <th>ID</th>
                    <th>User name</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody id="coordinators">

                        <?php
                        //Coo is coordinator
                        require_once 'includes/db_connect.php';
                        $query_coo = "SELECT * FROM users WHERE user_role= 'Coordinator' AND status_id='0'";
                        $query_run_coo = mysqli_query($mysqli, $query_coo);

                        while ($query_coo_row = mysqli_fetch_assoc($query_run_coo)) { ?>
                    <tr>
                        <td><?php echo $query_coo_row['user_id']; ?></td>
                        <td><?php echo $query_coo_row['username']; ?></td>
                        <td><?php echo $query_coo_row['fullname']; ?></td>
                        <td><?php echo $query_coo_row['email']; ?></td>
                        <td class="text-right">
                            <div class="dropdown pull-right">
                                <input type="hidden" class="deptId" value="<?php echo $query_coo_row['dept_id']; ?>" />
                                <button value="<?php echo $query_coo_row['user_id']; ?>" class="accept-btn pointer btn btn-round-sm btn-link withoutripple">
                                    <i class="md md-done f20"></i>
                                </button>
                                <button aria-expanded="false" class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-toggle="dropdown">
                                    <i class="md md-delete f20"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <div class="p-10">
                                        <div class="w300">
                                            Please confirm if you want to delete this Admin
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="deptId" value="<?php echo $query_coo_row['dept_id']; ?>" />
                                            <button value="<?php echo $query_coo_row['user_id']; ?>" class="reject-btn btn btn-primary delbutton">Confirm
                                            </button>
                                            <a href="#" class="btn btn-link">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        </div>
    </div>
    <?php include('parts/footer.php'); ?>
<?php } else{
    header('location: login.php');
}
?>