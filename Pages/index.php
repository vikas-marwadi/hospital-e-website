<?php include('../MySQL/server.php'); 

	//if user is not loggin, they can not get this page
	if(empty($_SESSION['username']))
	{
		header('location: login.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/main.css?v=<?php echo time(); ?>">
	<title>Home Page</title>
</head>
<body>
	<div class="header">
		<h1>Home Page</h1>
	</div>
	<div class="content">			
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php  
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php if (isset($_SESSION['username'])): ?>
			<p>Welcome <strong><?php echo  $_SESSION['username']; ?></strong></p>
			<p><a href="index.php?logout='1'" style="color: red;"><button type="submit" class="btn">Logout</button></a></p>
		<?php endif ?>
	</div>
</body>
</html>