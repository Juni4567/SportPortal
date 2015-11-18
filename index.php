<?php
//include header template
include('layout/header.php');
?>

<div id="lates-updates" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner latest-updates general-section jumbotron text-center">
        <?php
        require_once 'includes/db_connect.php';
        $query = "SELECT * FROM news where featured= '0'";
        $query_run = mysqli_query($mysqli, $query);
        $i = 1;

        while($query_row = mysqli_fetch_assoc($query_run)){?>
        <div class="item <?php if($i==1) echo"active"; ?>">
			<div class="container">
				<div class="carousel-news">
					<h1><?php echo $query_row['news_heading']; ?></h1>
					<p><?php echo $query_row['excerpt']; ?></p>
				</div>
			</div>
		</div>
        <?php $i++; } ?>

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
				<a class="all-sports">OTHER NEWS<span class="icon-all-sports"></span></a>
					<?php		
		        require_once 'includes/db_connect.php';
		        $query = "SELECT * FROM news where featured= '1'";
		        $query_run = mysqli_query($mysqli, $query);
        		$i = 1;
        		while($query_row = mysqli_fetch_assoc($query_run)){?>
					<div class="media">
						<a class="media-left" href="#">
							<img src="assets/images/team-1.jpg" class="thumbnail" alt="Test">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><?php echo $query_row['news_heading']; ?></h4>
							<p><?php echo $query_row['newsdescription']; ?></p>
						</div>
					</div>
					<?php $i++; } ?>
				</div>
			</div> <!-- sidebar col end -->
		</div>
	</div>
</div><!--score board end-->


<?php 
//include header template
include('layout/footer.php');
?>
<script>
	$( document ).ready(function() {
		$('.sp-nav').find('#home').addClass('active').children('a').removeAttr('href');
	});
</script>