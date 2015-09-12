<aside class="sidebar fixed" style="width: 260px; left: 0px; ">
        <div class="brand-logo">
          <!-- <div id="logo"></div> --> 
          <a href="../index.php"><img src="assets/images/logo.png" alt=""></a></div>
        <div class="user-logged-in">
          <div class="content">
            <div class="user-name"><?php echo $_SESSION['logged_user'];?> <span class="text-muted f9"><?php echo $_SESSION['user_role']; ?></span></div>
            <div class="user-email"><?php echo $_SESSION['user_email']; ?></div>
            <div class="user-actions"> <a class="m-r-5" href="#">settings</a> <a href="#">logout</a> </div>
          </div>
        </div>
        <ul class="menu-links">
          <li icon="md md-blur-on"> <a href="index.php"><i class="md md-blur-on"></i>&nbsp;<span>Dashboard</span></a></li>
          <li> <a href="#" data-toggle="collapse" data-target="#APPS" aria-expanded="false" aria-controls="APPS" class="collapsible-header waves-effect"><i class="md md-group"></i>Teams</a>
            <ul id="APPS" class="collapse">
              <li name="cricket">
                <a href="cricket.php">Cricket</a>
              </li>
              <li name="football">
                <a href="#">Football</a>
              </li>
              <li name="tennis">
                <a href="#">Tennis</a>
              </li>
              <li name="football">
                <a href="#">Vollyball</a>
              </li>
              <li name="football">
                <a href="#">Chess</a>
              </li>
            </ul>
          </li>
          <li> 
            <a href="#"><i class="md md-list"></i>Schedule</a>
          </li>
          <li>
            <a href="#"><i class="md md-refresh"></i>Score Update</a>
          </li>
          <li> <a href="#">
          <i class="md md-chat"></i>Messages</a>
          </li>
          <li> <a href="add-new.php">
          <i class="md md-add"></i>Register an Admin</a>
          </li>
        </ul>
</aside>