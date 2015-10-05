<?php
//include header template
require('layout/header.php');
?>
<div id="score-board" class="general-section">
    <div class="container">
  <div class="sport-nav tabbable">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#cricket" aria-controls="cricket" role="tab" data-toggle="tab">Cricket</a></li>
            <li role="presentation"><a href="#football" aria-controls="football" role="tab" data-toggle="tab">Football</a></li>
            <li role="presentation"><a href="#hockey" aria-controls="hockey" role="tab" data-toggle="tab">Hockey</a></li>
            <li role="presentation"><a href="#tennis" aria-controls="tennis" role="tab" data-toggle="tab">Tennis</a></li>
            <li role="presentation"><a href="#vollyball" aria-controls="vollyball" role="tab" data-toggle="tab">Volly Ball</a></li>
          </ul>
  </div>
    </div>
	<div class="container">
      <div class="team general-section">
        <div role="tabpanel" class="tab-pane fade in" id="cricket">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Teams Gallery</h1>
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
        </div> <!-- cricket end -->
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