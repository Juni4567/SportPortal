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
                        <!--Cricket container-->
						<div role="tabpanel" class="tab-pane active fade in" id="cricket">
                            <div class="scorecard-header">
                                <h2>Live Now</h2>
                                <h4>Total 3 Cricket matches are live now</h4>
                            </div>
                            <?php for($i=1; $i<4; $i++){ ?>
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
                                <a class="btn btn-primary sp-cta">Live Scorecard  <span class="glyphicon glyphicon-new-window"></span></a>
                            </div>
                            </div>
                            <?php } ?>
                            <div class="scorecard-container">
                                <div class="match-card general-section">
                                    <span class="live">Scheduled</span>
                                    <h4>Sep 25,2015- Final Round, 1st Semi-final at Rwp cricket stadium</h4>
                                    <div class="teams">
                                        <h3>BS(Economics)</h3> <h2>VS</h2> <h3>BS(Math)</h3>
                                    </div>
                                    <div class="match-time">
                                        <h4>Scheduled at 12:00</h4>
                                    </div>
                                    <a class="btn btn-primary sp-cta">Details</a>
                                </div>
                            </div>
						</div>
                        <!--Cricket container end-->
                        <!--Football Container-->
                        <div role="tabpanel" class="tab-pane fade in" id="football">
                            <div class="scorecard-header">
                                <h2>Live Now</h2>
                                <h4>Total 3 Football matches are live now</h4>
                            </div>
                            <?php for($i=1; $i<4; $i++){ ?>
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
                                        <a class="btn btn-primary sp-cta">Live Scorecard <span class="glyphicon glyphicon-new-window"></span></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!--Football container end-->
                        <div role="tabpanel" class="tab-pane fade" id="hockey">
                            <?php for($i=1; $i<8; $i++){ ?>
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
                                        <a class="btn btn-primary sp-cta">Live Scorecard  <span class="glyphicon glyphicon-new-window"></span></a>
                                    </div>
                                </div>
                            <?php } ?>
						</div>
                        <!--Hockey container end-->
						<div role="tabpanel" class="tab-pane fade" id="tennis">
                            <?php for($i=1; $i<4; $i++){ ?>
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
                            <?php } ?>
						</div>
                        <!--Hockey container end-->
						<div role="tabpanel" class="tab-pane fade" id="vollyball">
                            <div class="scorecard-header">
                                <h2>Live Now</h2>
                                <h4 class="alert alert-danger">No matches are being played for this sport</h4>
                            </div>
						</div>
					</div>
				</div> <!-- tabbable	-->

	</div>
</div><!--score board end-->
<?php
//require 'includes/db_connect.php'
//    $query = "SELECT 'team1_id','team2_id','match_date_time','location','match status'" ;
//    // if ($query_run = mysql_query($query)) {
//      //  while ($query_row = mysql_fetch_assoc($query_run)) {
//        //        $team1_id = $query_row['team1_id'];
//          //      $team2_id = $query_row['team2_id'];
//            //    $match_date_time = $query_row['match_date_time'];
//              //  $location = ['location'];
//                //$matchstatus = ['match status'];
//                //echo $team1_id. 'VS' $team2_id. 'AT' $match_date_time 'LIVE FROM' $location;
//                  }
//    //} else {
//       //echo "mysql_error()";
//    //}
//
//?>









