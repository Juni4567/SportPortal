<?php
//include header template
require('layout/header.php');
?>
<div id="score-board" class="general-section">
	<div class="container">
		<div>
            <?php for($i=1; $i<4; $i++){ ?>
                <div class="scorecard-container">
                    <div class="news-card general-section">
                        <a href="#" class="h2">The match has been canceled</a>
                        <p>The match scheduled at Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid, aperiam at cum delectus dicta
                            doloremque eaque, excepturi expedita minima molestiae, odio praesentium quod reprehenderit soluta suscipit velit vero voluptatum!</p>
                        <a class="btn btn-primary sp-cta">Readmore...</a>
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