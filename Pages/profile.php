<?php include('../MySQL/server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
	<link rel="stylesheet" type="text/css" href="../CSS/profilecss.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="dropdown">
		<p align="left"><button><a href="#"><img src="../Images/menubtn.png" id="btn1"></a></button></p>
		<div class="dropdown-content">
			<a href="personal_detail.php">Personal Information</a>
			<a href="hospital_information.php">Hospital Information</a>
			<a href="report_information.php">Report Information</a>
			<a href="allpatient.php">All Patients</a>
			<a href="login.php" target="_self">Logout</a>
		</div>
	</div>
	<h1>CHARUSAT HOSPITAL</h1>
	<table align="center">
		<?php
			$un=$_SESSION['username'];
			$db=mysqli_connect("localhost","root","","registration");
			$query="SELECT * FROM users WHERE username='$un' ";
			$run=mysqli_query($db,$query); 
			while($row=mysqli_fetch_array($run)) 
			{
		?>
		<tr>
			<td>NAME: </td>
			<td><?php echo $row['fullname']; ?></td>
			<td rowspan="4" id="imagee"><img src="../Images/Database_Images/<?php echo $row['image']; ?>" border="3px solid black" height="340px" width="280px"></td>
		</tr>
		<tr>
			<td>PHONE NO: </td>
			<td><?php echo "+91 ".$row['phone'] ?></td>
		</tr>
		<tr>
			<td>EMAIL ADDRESS: </td>
			<td><?php echo $row['email'] ?></td>
		</tr>
		<tr>
			<td>DATE: </td>
			<td><?php echo date("d-m-Y"); ?></td>
		</tr>
		<?php 
			}
		 ?>
	</table>
</body>
</html>