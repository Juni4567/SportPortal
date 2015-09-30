<?php
session_start();
if(isset($_SESSION['user'])!="")
{
    header("Location: index.php");
}

if(isset($_POST['adminsignup'])){
    // query database
    require_once("includes/db_connect.php");
    // prepare data for insertion
    $username	= $_POST["username"];
    $fullname	= $_POST["fullname"];
    $email		= $_POST["email"];
    $password	= $_POST["password1"];
    $password2	= $_POST["password2"];
    // check if username and email exist else insert
    $result = $mysqli->query("SELECT username from users WHERE username = '{$username}' LIMIT 1");
    $email_exist = $mysqli->query("SELECT email from users WHERE email = '{$email}' LIMIT 1");
    if ($result->num_rows == 1 || $email_exist->num_rows ==1) {
        echo "<div class='alert alert-danger' role='alert'>Username <?php echo $username; ?> or email<?php echo $email; ?> already exist</div>";
    }
    else {
        // insert data into mysql database
        $sql = "INSERT INTO users (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `g_id`)
      VALUES                      ('$', '$username', '$fullname', '$email', '$password', null , null , 2 , 'Admin' , 1)";
        //$sql = "INSERT  INTO `users` (`user_id`, `username`, 'fullname', `email`, `password`, `age`, `gender`)
        //VALUES (26, '{$username}', '{$fullname}', '{$email}', '{$password}', '{$age}', '{$gender}')";
        if ($mysqli->query($sql)) {
            //echo "New Record has id ".$mysqli->insert_id;
            echo "<div class='alert alert-success' role='alert'>Registered successfully! Please login to continue.</div>";
        } else {
            echo "MySQL error no {$mysqli->errno} : {$mysqli->error}";
            exit();
        }
    }
}
?>
  <?php include('parts/header.php'); ?>
  <?php include('parts/sidebar.php'); ?>
  
  <div class="main-container">
      <?php include('parts/navigation.php'); ?>
      
      <div class="main-content">
          <!-- add new admin -->
          <?php include('parts/users-add.php'); ?>
          <!-- Existing admins -->
          <?php include('parts/users.php'); ?>
      </div> <!-- main-content end -->

</div> <!-- main-container end -->


<?php include('parts/footer.php'); ?>
