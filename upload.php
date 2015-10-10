<?php include('layout/header.php'); ?>
<div class="container">
    <?php
    $logged_user = $_SESSION['logged_user'];
    $target_dir = "uploads/";
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $target_file = round(microtime(true)) . '.' . end($temp);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
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
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/profile/" . $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            //Upload link to current user's row
            require_once 'includes/db_connect.php';
            $query = "UPDATE users set images='$target_file' WHERE username = '$logged_user'";
            if (mysqli_query($mysqli, $query)) {
                ?>
    <script>
        window.location.replace("user.php");
    </script>
    <?php
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
        }
    }
    ?>
</div>