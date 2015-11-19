<?php
//include header template
require('layout/header.php');
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
        </div>
    </div>
    <div class="container">
        <div class="team general-section tab-content">

            <div role="tabpanel" class="active tab-pane fade in" id="cricket">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Teams Gallery</h1>
                    </div>
                    <?php
                    $se_team = "SELECT * from teams where g_id = '1'";
                    $se_run = mysqli_query($mysqli,$se_team);
                    $se_re = mysqli_num_rows($se_run);
                    if($se_re >0)
                    {
                        while ($se_row = mysqli_fetch_assoc($se_run))
                        {
                            ?>
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="teaminfo.php?did=<?php echo $se_row['dept_id'];?>&gid=<?php echo $se_row['g_id'];?>">
                                    <img src="uploads/teamlogos/<?php echo $se_row['teamlogo']; ?>">
                                </a>
                               <?php
//                               $dept_id    = $se_row['dept_id'];
//                               $query_dept = "SELECT * from departments where dept_id = '$dept_id'";
//                                $query_run_dept = mysqli_query($mysqli,$query_dept);
//                                $query_row_dept = mysqli_fetch_assoc($query_run_dept);
                               ?>
                                <div class="caption">
                                    <?php echo $se_row['team_name']; ?>
                                </div>
                            </div>
                    <?php }}?>

                </div>
                <!-- row end -->
            </div>
            <!-- cricket end -->



            <div role="tabpanel" class="tab-pane fade in" id="football">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Teams Gallery</h1>
                    </div>
                    <?php
                    $se_team = "SELECT * from teams where g_id = '2'";
                    $se_run = mysqli_query($mysqli,$se_team);
                    $se_re = mysqli_num_rows($se_run);
                    if($se_re >0)
                    {
                    while ($se_row = mysqli_fetch_assoc($se_run))
                    {
                    ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="teaminfo.php?did=<?php echo $se_row['dept_id'];?>&gid=<?php echo $se_row['g_id'];?>">
                            <img src="assets/images/logo/1.jpg">
                        </a>
                    </div>
                    <?php }}?>

                </div>
                <!-- row end -->
            </div>
            <!-- football end -->
        </div>
    </div>
    <!--container end-->
</div><!--score board end-->

<?php
//include header template
require('layout/footer.php');
?>
<script>
    $(document).ready(function () {
        $('.sp-nav').find('#dept').addClass('active').children('a').removeAttr('href');
    });
</script>