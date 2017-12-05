<?php include('layout/header.php'); ?>


<?php
if (isset($_POST['addteam'])) {
    //Add teamname, dept_id, g_id, sc_id and teamlogo to teams table
    $teamname   = $_POST["teamname"];
    $game_id    = $_POST["game"];
    $dept_id    = $_GET["dept_id"];
    $sc_id      = $_GET['sc_id'];
    //check if the team already exists
    $query_check_team       = "SELECT * FROM teams WHERE team_name='$teamname'";
    $query_run_check_team   = mysqli_query($mysqli, $query_check_team);
    if(!mysqli_num_rows($query_run_check_team)){
        $query_insert = "INSERT INTO teams (team_name, dept_id, g_id, sc_id) VALUES('$teamname', '$dept_id', '$game_id' , '$sc_id')";
        var_dump($query_insert);
        $query_run_insert = mysqli_query($mysqli, $query_insert);
        if($query_run_insert){
            echo" ". $teamname ." Team Inserted Successfully";
        }
        else{
            echo"Insertion failed";
            var_dump($query_run_insert);
        }
    }
    else{
        echo"". $teamname ." already Exists";exit;
    }

}
?>
<div class="container">
    <?php
    $logged_user = $_SESSION['logged_user'];
    $target_dir = "uploads/";
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $target_file = round(microtime(true)) . '.' . end($temp);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if (isset($_POST["addteam"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
                echo "<div class='alert alert-danger' role='alert'>Sorry, only JPG, JPEG files are allowed.</div>";
                $uploadOk = 0;
                return;
            }
            $uploadOk = 1;
        } else {
            echo "<div class='alert alert-danger' role='alert'>Please upload an image.</div>";
            $uploadOk = 0;
        }
    }
    if ($uploadOk == 0) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, your file was not uploaded.</div>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/teamlogos/" . $target_file)) {
            //Upload link to current user's row
            require_once 'includes/db_connect.php';
            $query = "UPDATE teams set teamlogo='$target_file' WHERE dept_id = '$dept_id' AND g_id='$game_id' AND sc_id='$sc_id'";
            if (mysqli_query($mysqli, $query)) { ?>
    <script>
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    </script>
    <?php
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
        }
    }
    ?>
</div>