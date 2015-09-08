<?php
//include header template
require('layout/header.php');
?>
<div id="score-board" class="general-section">
	<div class="container">
       <div class="team general-section">
         <h4>Cheetas 11 from department of Information Technology</h4>
            <div class="teams">
              <h3>Cheetas captan Junaid</h3>
               <img src="assets\images\logos\r.jpg" class="img-thumbnail" width="120" height="120">
            </div>
            <a class="btn btn-primary sp-cta" href="teaminfo.php">See junaid companions/team</a>
        </div>
        <div class="team general-section">
         <h4>Skyhour 11 from department of Physics</h4>
            <div class="teams">
              <h3>Skyhour captan Imran</h3>
            </div>
            <a class="btn btn-primary sp-cta" href="teaminfo.php">See imran companions/team</a>
        </div>
	</div><!--container end-->
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