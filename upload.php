<?php
include('layout/header.php');
?>
<div class="container">
<?php
session_start();
$logged_user = $_SESSION['logged_user'];
$target_dir = "uploads/";

//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$target_file = round(microtime(true)) . '.' . end($temp);

//echo $target_file;exit;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    var_dump($_FILES["fileToUpload"]["tmp_name"]);
//    print_r($_FILES["fileToUpload"]["tmp_name"]); exit;
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "<div class='alert alert-danger' role='alert'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
            $uploadOk = 0;
            return;
        }
        $uploadOk = 1;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Please upload an image.</div>";
        $uploadOk = 0;
    }
}
//// Check if file already exists
//if (file_exists($target_file)) {
//    echo "<div class='alert alert-danger' role='alert'>Sorry, file already exists.</div>";
//    $uploadOk = 0;
//}
//// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<div class='alert alert-danger' role='alert'>Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/profile/" . $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //Upload link to current user's row
        require_once 'includes/db_connect.php';
        $query = "UPDATE users set images='$target_file' WHERE username = '$logged_user'";
        if(mysqli_query($mysqli, $query)){
            header("location: user.php");
        };
    } else {
        echo "<div class='alert alert-danger' role='alert'>Sorry, there was an error uploading your file.</div>";
    }

}
?>
</div>