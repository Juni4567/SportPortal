<?php
//include header template
require('layout/header.php');
?>
<div class="container general-section"><h1>Departments Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam iure mollitia, sequi, deleniti quia dicta aliquid ea, dolores excepturi laboriosam est, nemo delectus quo dignissimos nihil corporis minus vel incidunt!</h1></div>
<div id="score-board" class="general-section">
	<div class="container">
		There are a few departments in the uni Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur facere explicabo officia cupiditate voluptatum, aperiam laborum totam similique velit, porro harum ut sunt veritatis reiciendis. Esse aliquam numquam fugit iure.
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