<?php
//include header template
require('layout/header.php');
?>
<div id="score-board" class="general-section">
	<div class="container">
		<div>
            <?php
            require_once 'includes/db_connect.php';
            $query = "SELECT * FROM news";
            $query_run = mysqli_query($mysqli, $query);
                while ($query_row = mysqli_fetch_assoc($query_run))
                { ?>
                <div class="scorecard-container">
                    <div class="news-card general-section">
                        <a href="news_page.php?n_id=<?php echo $query_row['news_id'];?>" class="h2"><?php echo $query_row['news_heading']; ?></a>
                        <p><?php echo $query_row['excerpt']; ?></p>
                        <a class="btn btn-primary sp-cta" href="news_page.php?n_id=<?php echo $query_row['news_id'];?>">Readmore...</a>
                    </div>
                </div>
            <?php } ?>

</div>
	</div>
</div><!--score board end-->


<?php
//include header template
require('layout/footer.php');
?>
<script>
	$( document ).ready(function() {
		$('.sp-nav').find('#news').addClass('active').children('a').removeAttr('href');
	});
</script>