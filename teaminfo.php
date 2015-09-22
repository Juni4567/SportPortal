<?php
//include header template
require('layout/header.php');
?>
<div class="container general-section"></div>
<div id="score-board" class="general-section">
	<div class="container">
        <center><h3>Team information</h3></center>
        <?php
       	  require_once 'includes/db_connect.php';
       	  $query = "SELECT * FROM player WHERE g_id='1' AND dept_id='3' ";
          $query_run = mysqli_query($mysqli, $query);
       	  if(!$query_run->num_rows){
        ?>
          <h4 class="alert alert-danger">No matches are completed for this game right now</h4>
          <?php
            }
            if ($query_run){
              while ($query_row = mysqli_fetch_assoc($query_run)) {
              $player_id = $query_row['player_id'];
              $game_role = $query_row['game_role'];                    
            ?>
            <?php echo $player_id; ?><br>
            <?php echo $game_role; ?><br>
            <?php } }?>
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