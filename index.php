<?php
//include header template
include('layout/header.php');
?>

<div id="lates-updates" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner latest-updates general-section jumbotron text-center">
        <?php
        require_once 'includes/db_connect.php';
        $query = "SELECT * FROM news where featured= '1'";
        $query_run = mysqli_query($mysqli, $query);
        $i = 1;

        while($query_row = mysqli_fetch_assoc($query_run)){?>
        <div class="item <?php if($i==1) echo"active"; ?>">
			<div class="container">
				<div class="carousel-news">
					<a href="news_page.php?n_id=<?php echo $query_row['news_id']; ?>"><h1><?php echo $query_row['news_heading']; ?></h1></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In blanditiis consequatur nihil dignissimos ut impedit quod facilis eveniet tenetur minima, fugiat aliquid consequuntur quis commodi, labore est odit dolor. Esse.</p>
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

				<?php
		        require_once 'includes/db_connect.php';
		        $query = "SELECT * FROM news where featured= '0' ORDER BY news_id DESC";
		        $query_run = mysqli_query($mysqli, $query);
        		$i = 1;
        		while($query_row = mysqli_fetch_assoc($query_run)){?>
                    <div class="col-sm-4">
                        <div class="all-sport-container">
                            <div class="media">
                                <a class="media-left" href="news_page.php?n_id=<?php echo $query_row['news_id']; ?>">
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $query_row['news_heading']; ?></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate cumque culpa, incidunt ex? Eveniet, beatae alias fugiat nesciunt assumenda, facilis sunt ex, ipsum cupiditate vero sed, in esse ut eius.</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div> <!-- sidebar col end -->
                <?php $i++; } ?>

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