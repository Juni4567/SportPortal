<?php
//include header template
include('layout/header.php');
?>

<div id="lates-updates" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner latest-updates general-section jumbotron text-center">
		<div class="item active"> 
			<div class="container">
				<h3>LATEST NEWS</h3>
				<div class="carousel-news">
					<h1>THE MATCH BETWEEN BS(IT) & BS(PHY) HAS BEEN CANCELED</h1>
					<p>Due to heavy rain Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eveniet amet, est hic! Quibusdam officia debitis incidunt velit, quisquam expedita quaerat inventore animi reiciendis modi, libero repellendus sequi! Quasi, recusandae.</p>
				</div>
			</div>
		</div>
		<div class="item"> 
			<div class="container">
				<h3>LATEST NEWS first slide</h3>
				<div class="carousel-news">
					<h1>THE MATCH BETWEEN BS(IT) & BS(PHY) HAS BEEN CANCELED</h1>
					<p>Due to heavy rain Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eveniet amet, est hic! Quibusdam officia debitis incidunt velit, quisquam expedita quaerat inventore animi reiciendis modi, libero repellendus sequi! Quasi, recusandae.</p>
				</div>
			</div>
		</div>
		<div class="item"> 
			<div class="container">
				<h3>LATEST NEWS second slide</h3>
				<div class="carousel-news">
					<h1>THE MATCH BETWEEN BS(IT) & BS(PHY) HAS BEEN CANCELED</h1>
					<p>Due to heavy rain Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eveniet amet, est hic! Quibusdam officia debitis incidunt velit, quisquam expedita quaerat inventore animi reiciendis modi, libero repellendus sequi! Quasi, recusandae.</p>
				</div>
			</div>
		</div>
		<div class="item"> 
			<div class="container">
				<h3>LATEST NEWS third slide</h3>
				<div class="carousel-news">
					<h1>THE MATCH BETWEEN BS(IT) & BS(PHY) HAS BEEN CANCELED</h1>
					<p>Due to heavy rain Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eveniet amet, est hic! Quibusdam officia debitis incidunt velit, quisquam expedita quaerat inventore animi reiciendis modi, libero repellendus sequi! Quasi, recusandae.</p>
				</div>
			</div>
		</div>
		<div class="carousel-navigator">
			<a class="prev" href="#lates-updates" data-slide="prev"></a>
			<a class="next" href="#lates-updates" data-slide="next"></a>
		</div>
	</div>
</div> <!--  latest updates carousel end -->


<div id="score-board" class="general-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="sport-nav tabbable">
					<ul class="nav nav-tabs" role="tablist">

						<li role="presentation" class="active"><a href="#football" aria-controls="football" role="tab" data-toggle="tab">Football</a></li>
						<li role="presentation"><a href="#cricket" aria-controls="cricket" role="tab" data-toggle="tab">Cricket</a></li>
						<li role="presentation"><a href="#hockey" aria-controls="hockey" role="tab" data-toggle="tab">Hockey</a></li>
						<li role="presentation"><a href="#tennis" aria-controls="tennis" role="tab" data-toggle="tab">Tennis</a></li>
						<li role="presentation"><a href="#vollyball" aria-controls="vollyball" role="tab" data-toggle="tab">Volly Ball</a></li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active fade in" id="football">
							<div id="sport-board-content">
								<div id="team-1">
									<img src="assets/images/team-1.jpg" alt="Team 1">
								</div>
								<div class="vs"><a>VS</a></div>
								<div id="team-2">
									<img src="assets/images/team-2.jpg" alt="Team 2">
								</div>
								<div class="score">
									<div class="row">
										<div class="col-xs-6"><h2>BS(IT) TEAM <span class="leading"></span></h2>
											<h3 class="team-score">0-3</h3>
										</div>

										<div class="col-xs-6"><h2>BS(PHY) TEAM</h2>
											<h3 class="team-score">0-2</h3>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="cricket">
							<div id="sport-board-content">
								<div id="team-1">
									<img src="assets/images/team-1.jpg" alt="Team 1">
								</div>
								<div class="vs"><a>VS</a></div>
								<div id="team-2">
									<img src="assets/images/team-2.jpg" alt="Team 2">
								</div>
								<div class="score">
									<div class="row">
										<div class="col-xs-6"><h2>BS(IT) TEAM <span class="leading"></span></h2>
											<h3 class="team-score">0-3</h3>
										</div>

										<div class="col-xs-6"><h2>BS(PHY) TEAM</h2>
											<h3 class="team-score">0-2</h3>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="hockey">
							<div id="sport-board-content">
								<div id="team-1">
									<img src="assets/images/team-1.jpg" alt="Team 1">
								</div>
								<div class="vs"><a>VS</a></div>
								<div id="team-2">
									<img src="assets/images/team-2.jpg" alt="Team 2">
								</div>
								<div class="score">
									<div class="row">
										<div class="col-xs-6"><h2>BS(IT) TEAM <span class="leading"></span></h2>
											<h3 class="team-score">0-3</h3>
										</div>

										<div class="col-xs-6"><h2>BS(PHY) TEAM</h2>
											<h3 class="team-score">0-2</h3>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tennis">
							<div id="sport-board-content">
								<div id="team-1">
									<img src="assets/images/team-1.jpg" alt="Team 1">
								</div>
								<div class="vs"><a>VS</a></div>
								<div id="team-2">
									<img src="assets/images/team-2.jpg" alt="Team 2">
								</div>
								<div class="score">
									<div class="row">
										<div class="col-xs-6"><h2>BS(IT) TEAM <span class="leading"></span></h2>
											<h3 class="team-score">0-3</h3>
										</div>

										<div class="col-xs-6"><h2>BS(PHY) TEAM</h2>
											<h3 class="team-score">0-2</h3>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="vollyball">
							<div id="sport-board-content">
								<div id="team-1">
									<img src="assets/images/team-1.jpg" alt="Team 1">
								</div>
								<div class="vs"><a>VS</a></div>
								<div id="team-2">
									<img src="assets/images/team-2.jpg" alt="Team 2">
								</div>
								<div class="score">
									<div class="row">
										<div class="col-xs-6"><h2>BS(IT) TEAM <span class="leading"></span></h2>
											<h3 class="team-score">0-3</h3>
										</div>

										<div class="col-xs-6"><h2>BS(PHY) TEAM</h2>
											<h3 class="team-score">0-2</h3>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- tabbable	-->
			</div>
			<div class="col-sm-4">
				<div class="all-sport-container">
				<a class="all-sports">ALL SPORTS <span class="icon-all-sports">span-icon-allsports</span></a>
				<div class="media">
					<a class="media-left" href="#">
						<img src="assets/images/team-1.jpg" class="thumbnail" alt="Test">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Football Match<span>/ 02 May 2015</span></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint deserunt in cupiditate, quia placeat velit officia molestias ex, autem aspernatur est vitae sequi impedit facilis temporibus eligendi expedita at obcaecati.</p>
					</div>
				</div>
				<div class="media">
					<a class="media-left" href="#">
						<img src="assets/images/team-2.jpg" class="thumbnail" alt="Test">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Football Match<span>/ 02 May 2015</span></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint deserunt in cupiditate, quia placeat velit officia molestias ex, autem aspernatur est vitae sequi impedit facilis temporibus eligendi expedita at obcaecati.</p>
					</div>
				</div>
				<div class="media">
					<a class="media-left" href="#">
						<img src="assets/images/team-1.jpg" class="thumbnail" alt="Test">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Football Match<span>/ 02 May 2015</span></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint deserunt in cupiditate, quia placeat velit officia molestias ex, autem aspernatur est vitae sequi impedit facilis temporibus eligendi expedita at obcaecati.</p>
					</div>
				</div>
				<div class="media">
					<a class="media-left" href="#">
						<img src="assets/images/team-2.jpg" class="thumbnail" alt="Test">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Football Match<span>/ 02 May 2015</span></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint deserunt in cupiditate, quia placeat velit officia molestias ex, autem aspernatur est vitae sequi impedit facilis temporibus eligendi expedita at obcaecati.</p>
					</div>
				</div>
				</div>
			</div> <!-- sidebar col end -->
		</div>
	</div>
</div><!--score board end-->



<div class="general-section" id="partners-section">
	<div class="container">
		<img src="assets/images/partners.jpg" class="img-responsive" alt="Partners logos">
	</div>
</div>
<?php 
//include header template
include('layout/footer.php');
?>
<script>
	$( document ).ready(function() {
		$('.sp-nav').find('#home').addClass('active').children('a').removeAttr('href');
	});
</script>