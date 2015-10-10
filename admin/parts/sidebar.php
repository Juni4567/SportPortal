<aside class="sidebar fixed" style="width: 260px; left: 0px; ">
    <div class="brand-logo">
        <!-- <div id="logo"></div> -->
        <a href="../index.php"><img src="assets/images/logo.png" alt=""></a></div>
    <div class="user-logged-in">
        <div class="content">
            <div class="user-name">
                <?php echo $_SESSION['logged_user']; ?>
                <span class="text-muted f9"><?php echo $_SESSION['user_role']; ?></span>
            </div>
            <div class="user-email"><?php echo $_SESSION['user_email']; ?></div>
        </div>
    </div>
    <ul class="menu-links">
        <li><a href="index.php"><i class="md md-blur-on"></i><span>Dashboard</span></a></li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#list" aria-expanded="false" aria-controls="list" class="collapsible-header waves-effect"><i class="md md-group"></i>Teams</a>
            <ul id="list" class="collapse">
                <li name="cricket">
                    <a href="cricket.php">Cricket</a>
                </li>
                <li name="football">
                    <a href="football.php">Football</a>
                </li>
                <li name="hockey">
                    <a href="hockey.php">Hockey</a>
                </li>
                <li name="tennis">
                    <a href="tennis.php">Tennis</a>
                </li>
                <li name="vollyball">
                    <a href="vollyball.php">Volly Ball</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="schedule.php"><i class="md md-list"></i>Schedule</a>
        </li>
        <li>
            <a href="#" data-toggle="collapse" data-target="#list1" aria-expanded="false" aria-controls="list" class="collapsible-header waves-effect"><i class="md md-group"></i>score updates</a>
            <ul id="list1" class="collapse">
                <li name="cricket">
                    <a href="livegames.php">Cricket</a>
                </li>
                <li name="football">
                    <a href="football.php">Football</a>
                </li>
                <li name="hockey">
                    <a href="hockey.php">Hockey</a>
                </li>
                <li name="tennis">
                    <a href="tennis.php">Tennis</a>
                </li>
                <li name="vollyball">
                    <a href="vollyball.php">Volly Ball</a>
                </li>
            </ul>
        </li>
        <li><a href="messages.php">
                <i class="md md-chat"></i>Messages</a>
        </li>
        <li><a href="add-new.php">
                <i class="md md-add"></i>Register an Admin</a>
        </li>
    </ul>
</aside>