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
		                    </div><br></br>
		                    <div class="col-xs-12">
		                        <input type="num-text" autocomplete="off" name="newsdes" id="newsdes" placeholder="NEWS DESCRIPTION" required="required" class="form-control text-center">
		                    </div><br></br>
                            News type: <select name="newstype">
                            <option>Select one</option>
                            <option value="0">featured</option>
                            <option value="1">normal</option>
                        </select>
		                </div>
				        <div>
		                    <button type="submit" name="addnews" class="btn btn-info">Add news</button>
		                </div>
		                <?php
		                require_once 'includes/db_connect.php';
		                if (isset($_POST['addnews'])) {
		                    $newsheading = $_POST["newsheading"];
		                    $newsdescription = $_POST["newsdes"];
                            $type = $_POST["newstype"];
		               //     $date = $_POST["date"];
		                    $query_insert = "INSERT INTO news (news_heading, newsdescription, date, featured) VALUES('$newsheading', '$newsdescription', now() , '$type')";
		                    $query_run_insert = mysqli_query($mysqli, $query_insert);
		                }
		                ?>
		        	</form>
		        </div>

<div class="page-header">
        <h1><i class="md md-list"></i>News</h1>
        <p class="lead">List of news</p>
    </div>
                <table class="table table-full m-b-60" id="table-area-1" style="margin-bottom:0;">
                        <thead style="background-color: rgba(41, 31, 33, 0.28); font-weight: 900; font-size: 16px;">
                        <tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
                            <th>News Heading</th>
                            <th>Description</th>
                            <th class="hidden-xs">Updated</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="news">
                        <?php
                            $query_news = "SELECT * FROM news";
                            $query_run_news  = mysqli_query($mysqli, $query_news);
                            while($query_row_news  = mysqli_fetch_assoc($query_run_news)){
                        ?>
                            <tr>
                                <td><?php echo $query_row_news['news_heading']; ?></td>
                                <td><?php echo $query_row_news['newsdescription']; ?></td>
                                <td><?php echo $query_row_news['date']; ?></td>
                                <td class="text-right">
                                    <div class="dropdown pull-right">
                                        <button aria-expanded="false" class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-template="assets/tpl/partials/dropdown-navbar.html" data-toggle="dropdown">
                                            <i class="md md-delete f20"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <div class="p-10">
                                                <div class="w300">
                                                    Please confirm if you want to delete this news
                                                </div>

                                                <div class="form-group">
                                                <button type="submit" id="<?php echo $query_row_news['news_id']; ?>" class="btn btn-primary delbutton">Confirm
                                                </button>
                                                <a href="#" class="btn btn-link">Cancel</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
<?php } ?>
                        </tbody>
                </table>
		    </section>
		        </div>
		    </div>
    <?php include('parts/footer.php'); ?>
<?php
} else {
    header('location: login.php');
}
?>