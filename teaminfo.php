<?php
//include header template
require('layout/header.php');
?>
<div class="container general-section"></div>
<div id="score-board" class="general-section">
	<div class="container">
		<div class="row">
      <div class="col-md-12">
        <center><h3>Team information</h3></center>
        Raja g<br>
        Pjipa
      </div>
    </div>
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