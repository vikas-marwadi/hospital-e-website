<?php include('../MySQL/server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/main.css?v=<?php echo time(); ?>">
	<title>Login</title>
</head>
<body>
	<div class="header">
		<img src="../Images/login.png" class="image">
		<h2>login</h2>
	</div>
	<form action="login.php" method="POST" autocomplete="off">

		<!-- For display validation errors -->
		<?php include('E:\Important\Xampp\htdocs\SGP 4th SEM/MySQL/errors.php'); ?>
		<div class="input-group">
			<label>Username:</label>
			<input type="text" name="username" placeholder="username">
		</div>
		<div class="input-group">
			<label>Password:</label>
			<input type="password" name="password" placeholder="password">
		</div>
		<div class="input-group">
			<button type="Submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a Register ? <a href="register.php" class="blink">Register Here!</a>
		</p><br>
		<p align="center" style="font-size: 30px;">OR</p><br>
		<p align="center" style="font-size:20px;color: blue;"><a href="#">Scan the Hospital E-Card</a></p>
	</form>
</body>
</html>