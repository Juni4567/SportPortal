<html>
<head>
	<title>User registration form- PHP MySQL Ligin System | W3Epic.com</title>
</head>
<body>
<h1>User registration form- PHP MySQL Ligin System | W3Epic.com</h1>
<?php
require_once("db_connect.php");
if (!isset($_POST['submit'])) {
    ?>	<!-- The HTML registration form -->
    <form >
        Username: <input type="text" name="username" /><br />
        Password: <input type="password" name="password" /><br />
        First name: <input type="text" name="first_name" /><br />
        Last name: <input type="text" name="last_name" /><br />
        Email: <input type="type" name="email" /><br />

        <input type="submit" name="submit" value="Register" />
    </form>

</body>
</html>