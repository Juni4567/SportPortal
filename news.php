<?php
//include header template
require('layout/header.php');
?>
<div class="container general-section">
<h1>Fixtures</h1>
<p>Fixtures are given in the following tabel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus ipsa ullam porro dolorum modi, beatae tempora, architecto pariatur quibusdam odit? Debitis nulla doloribus quod ullam. Reiciendis aut voluptas animi, obcaecati!</p>
</div>
<div id="score-board" class="general-section">
	<div class="container">
		<h2>Fixtures</h2>
		<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="#cricket" aria-controls="cricket" role="tab" data-toggle="tab">Cricket</a></li>
    <li role="presentation"><a href="#football" aria-controls="football" role="tab" data-toggle="tab">Football</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="cricket">Home Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit quis velit unde maiores animi similique ex assumenda quasi necessitatibus, odio, laborum dolorum nam at et sunt voluptatem laudantium eaque, hic.</div>
    <div role="tabpanel" class="tab-pane" id="football">Football Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, eligendi. Dolor tempore accusamus eveniet consequatur recusandae quaerat deleniti, maxime excepturi quis ipsum magnam vero voluptatum! Repellat libero officiis, magnam iste.</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
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
		$('.sp-nav').find('#news').addClass('active').children('a').removeAttr('href');
	});
</script>