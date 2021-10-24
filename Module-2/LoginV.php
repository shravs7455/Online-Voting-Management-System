<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form class="box" action="LoginV.php" method="post">
		<?php include('errors.php'); ?>
		<h1>Login</h1>
		<input type="text" name="user" placeholder="Username" required>
		<input type="password" name="pass" placeholder="Password" required>
		<input type="submit" name="login" value="Login">

		<p style="color:white">
		Not a member ? <a href="RegV.php" type="submit">Sign up</a>
	</p>
	</form>


</body>
</html>