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
