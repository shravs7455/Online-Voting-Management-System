<?php include('server.php'); 
     if(empty($_SESSION['username'])) {
     	header("location:login.php");
     }


?>
<!DOCTYPE html>
<html>
<head>
	<title>User registration using php</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>DASHBOARD</h2>
</div>
<div class = "content">
	<?php if (isset($_SESSION['success'])): ?>
	<div class="success">
		<h3>
			<?php 
			echo $_SESSION['success'];
			unset($_SESSION['success']);

			 ?>
		</h3>
	</div>

	<?php endif ?>
	<?php if (isset($_SESSION['username'])): ?>
		<h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
		<button><a href="login.php?logout='1'" style="color:red;">Logout</a></button>
	<?php endif ; ?>
</div>

</body>
</html>