<?php
//include header template
require('layout/header.php');
?>
<div id="score-board" class="general-section">
	<div class="container">
        <div class="row">
            <?php
            $gid = $_GET['gid'];
            $did = $_GET['did'];
            $query = "SELECT * FROM games WHERE g_id = '$gid'";
            $query2 = "SELECT * FROM departments WHERE dept_id = '$did'";
            $query_run  = mysqli_query($mysqli, $query);
            $query_run2 = mysqli_query($mysqli, $query2);
            $query_row = mysqli_fetch_assoc($query_run);
            $query_row2 = mysqli_fetch_assoc($query_run2);
            //$query2, $query_run2 and $query_row2 are to get dept name
            ?>
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $query_row2['dept_name']; ?> - <?php echo $query_row['g_name']; ?> PLayers</h1>
            </div>
            <?php

            $se_team = "SELECT * from player where g_id = '$gid' and dept_id = '$did'";
            $se_run = mysqli_query($mysqli,$se_team);
            $se_re = mysqli_num_rows($se_run);
            if($se_re >0)
            {
            while ($se_row = mysqli_fetch_assoc($se_run))
            {
                //get userid from players table and find in users table and get their picture link
                $user_id = $se_row['user_id'];
                $query3 = "SELECT * FROM users WHERE user_id = '$user_id'";
                $query_run3 = mysqli_query($mysqli, $query3);
                $query_row3 = mysqli_fetch_assoc($query_run3);
            ?>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img src="uploads/profile/<?php echo $query_row3['images']; ?>">
                </a>
                <div class = "caption">
                    <h3><?php echo $query_row3['fullname']; ?></h3>
                    <p><?php echo $query_row3['introduction']; ?></p>
                </div>
            </div>
            <?php }}?>
        </div> <!-- row end -->
	</div>
</div><!--score board end-->


<?php
//include header template
require('layout/footer.php');
?>
<script>
	$( document ).ready(function() {
		$('.sp-nav').find('#dept').addClass('active').children('a').removeAttr('href');
	});
</script>