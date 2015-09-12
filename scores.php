<?php
//include header template
require( 'layout/header.php' );
?>

<div id="score-board" class="general-section">
	<div class="container">
		<div class="sport-nav tabbable">
			<ul class="nav nav-tabs" role="tablist">

				<li role="presentation" class="active"><a href="#cricket" aria-controls="cricket" role="tab"
				                                          data-toggle="tab">Cricket</a></li>
				<li role="presentation"><a href="#football" aria-controls="football" role="tab" data-toggle="tab">Football</a>
				</li>
				<li role="presentation"><a href="#hockey" aria-controls="hockey" role="tab" data-toggle="tab">Hockey</a>
				</li>
				<li role="presentation"><a href="#tennis" aria-controls="tennis" role="tab" data-toggle="tab">Tennis</a>
				</li>
				<li role="presentation"><a href="#vollyball" aria-controls="vollyball" role="tab" data-toggle="tab">Volly
						Ball</a></li>
			</ul>

			<div id="ajax-score-card">
				<?php require_once 'score-ajax.php'; ?>
			</div>
		</div>
		<!-- tabbable	-->

	</div>
</div><!--score board end-->
<?php
//include header template
require( 'layout/footer.php' );
?>
<script>
	$(document).ready(function () {
		$('.sp-nav').find('#scores').addClass('active').children('a').removeAttr('href');

		var score_card = $('#ajax-score-card');

		var refreshScores  = function() {
			$.get('score-ajax.php', function(response) {
				var response = $(response);

				response.find('.tab-pane').each(function(){
					score_card.find('#' + $(this).attr('id')).html($(this).html());
				});
			});
		};


		$('#ajax-score-card').on('click', '.sp-cta', function(e) {
			e.preventDefault();
			alert('hello world');
			return false;
		});

		//window.refreshScores = refreshScores;
		setInterval(refreshScores, 5000);
	});
</script>