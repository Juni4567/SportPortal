<?php
//include header template
require('layout/header.php');
?>
<div id="score-board" class="general-section">
    <div class="container">
        <div>
            <?php
            require_once 'includes/db_connect.php';
            $news_id= $_GET['n_id'];
            $query = "SELECT * FROM news where news_id = '$news_id'";
            $query_run = mysqli_query($mysqli, $query);
            $query_row = mysqli_fetch_assoc($query_run)
            ?>
                <div class="scorecard-container">
                    <div class="news-card">
                        <h2><?php echo $query_row['news_heading']; ?></h2>
                        <p><?php echo $query_row['newsdescription']; ?></p>
                    </div>
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