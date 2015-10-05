<?php
//include header template
require('layout/header.php');
?>
<div class="container general-section"></div>
<div id="score-board" class="general-section">
	<div class="container">
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">BS(IT) - Cricket PLayers</h1>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/2.png">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/2.png">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/2.png">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/2.png">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="teaminfo.php">
                    <img src="assets/images/logo/1.jpg">
                </a>
            </div>
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