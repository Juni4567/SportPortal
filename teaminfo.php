<?php
//include header template
require('layout/header.php');
?>
<div class="container general-section"></div>
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
            ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img src="assets/images/logo/1.jpg">
                </a>
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