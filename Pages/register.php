<?php include('../MySQL/server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/main.css?v=<?php echo time(); ?>">
	<title>Register</title>
</head>
<body>
	<div class="header">
		<img src="../Images/register.png" class="image">
		<h2>Registration</h2>
	</div>
	<form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
		
		<!-- For display validation errors -->
		<?php include('../MySQL/errors.php'); ?>
		<div class="input-group">
			<label>Full Name:</label>
			<input type="text" name="name" value="<?php echo $fullname; ?>">
		</div>
		<div class="input-group">
			<label>Username:</label>
			<input type="text" name="username" value="<?php echo $username; ?>"> <!-- whenever the password and confirm password does not matched that time if we write like this then we don't need to write again username and password we just need to enter password and confirm password -->
		</div>
		<div class="input-group">
			<label>Email:</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Phone No:</label>
			<input type="tel" name="phone" pattern="[0-9]{10}" maxlength="10" minlength="10" required value="<?php echo $phone; ?>">
		</div>
		<div class="input-group">
			<label>Password:</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm-Password:</label>
			<input type="password" name="password_2">
		</div>
		<div>
			<label>Select image:</label>
			<input type="file" name="image" value="<?php echo $image; ?>">
		</div>
		<div class="note">
			<p>Note: Only jpg,png or jpeg format supported.</p>
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			Already have a Register ? <a href="login.php">Login</a>
		</p>
	</form>
</body>
</html>