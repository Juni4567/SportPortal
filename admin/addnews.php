<?php session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['user_role'] === 'Admin') {
    ?>
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="main-container">
        <?php include('parts/navigation.php'); ?>
        <div class="main-content">
            <section class="forms-advanced">
		        <div class="well white addnews-table text-center">
		        	<form method="post" action="addnews.php">
		                <div class="row form-group">
		                    <div class="col-xs-12">
		                        <input type="text" autocomplete="off" name="newsheading" id="newsheading" required="required" class="text-center" placeholder="NEWS HEADING" class="form-control">
		                    </div>
		                    <div class="col-xs-12">
		                        <input type="num-text" autocomplete="off" name="newsdes" id="newsdes" placeholder="NEWS DESCRIPTION" required="required" class="form-control">
		                    </div>
		                    <div class="input-center"class="col-xs-2">
		                        Date:<input type="date" name="date" id="date" required="required">
		                    </div>
		                </div><br></br>
				        <div>
		                    <button type="submit" name="addnews" class="btn btn-info">Add news</button>
		                </div>
		                <?php
		                require_once 'includes/db_connect.php';
		                if (isset($_POST['addnews'])) {
		                    $newsheading = $_POST["newsheading"];
		                    $newsdescription = $_POST["newsdes"];
		                    $date = $_POST["date"];
		                    //Check if news already exist
		                    $checkif_news_exist = "SELECT * FROM news WHERE news_heading = '$newsheading'";
		                    $query_run_check    = mysqli_query($mysqli, $checkif_news_exist);
		                    $query_row_check    = mysqli_num_rows($query_run_check);
		                    if($query_row_check >0){

		                    }else{
		                        $query = "INSERT INTO news (news_heading, newsdescription, date,) VALUES('$newsheading', '$newsdescription', '$date')";
		                        $query_run = mysqli_query($mysqli, $query);
		                    }

		                }
		                ?>
		        	</form>
		        </div>
		    </section>
		        </div>
		    </div>
    <?php include('parts/footer.php'); ?>
<?php
} else {
    header('location: login.php');
}
?>