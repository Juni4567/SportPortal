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

					<div class="tab-content">

						<div role="tabpanel" class="tab-pane active fade in" id="cricket">
                            <div class="scorecard-header">
                                <h2>Live Now</h2>
                                <h4>Total 3 Cricket matches are live now</h4>
                            </div>
                            <div class="scorecard-container">
                            <div class="match-card general-section">
                                <span class="live">Live</span>
                                <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                <div class="teams">
                                    <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                </div>
                                <div class="match-time">
                                    <h4>Scheduled at 16:00</h4>
                                </div>
                                <a class="btn btn-primary sp-cta">Live Scorecard</a>
                            </div>
                            </div>
                            <div class="scorecard-container">
                               <div class="match-card general-section">
                                    <span class="live">Live</span>
                                    <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                    <div class="teams">
                                        <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled at 16:00</h4>
                                    </div>
                                    <a class="btn btn-primary sp-cta">Live Scorecard</a>
                                </div>
                            </div>
                            <div class="scorecard-container">
                                <div class="match-card general-section">
                                    <span class="live">Scheduled</span>
                                    <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                    <div class="teams">
                                        <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled at 16:00</h4>
                                    </div>
                                    <a class="btn btn-primary sp-cta">Live Scorecard</a>
                                </div>
                            </div>
						</div>
                        <div role="tabpanel" class="tab-pane fade in" id="football">
                            <div class="scorecard-header">
                                <h2>Live Now</h2>
                                <h4>Total 3 Football matches are live now</h4>
                            </div>
                            <div class="scorecard-container">
                                <div class="match-card general-section">
                                    <span class="live">Live</span>
                                    <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                    <div class="teams">
                                        <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled at 16:00</h4>
                                    </div>
                                    <a class="btn btn-primary sp-cta">Live Scorecard</a>
                                </div>
                            </div>
                            <div class="scorecard-container">
                                <div class="match-card general-section">
                                    <span class="live">Live</span>
                                    <h4>Sep 25,2015- Qualifying round, 1st Semi-final at Rwp cricket stadium</h4>
                                    <div class="teams">
                                        <h3>BS(IT)</h3> <h2>VS</h2> <h3>BS(Phy)</h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled at 16:00</h4>
                                    </div>
                                    <a class="btn btn-primary sp-cta">Live Scorecard</a>
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
</div><!--score board end-->


<?php
//include header template
require('layout/footer.php');
?>
<script>
	$( document ).ready(function() {
		$('.sp-nav').find('#scores').addClass('active').children('a').removeAttr('href');
	});
</script>