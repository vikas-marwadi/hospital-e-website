<?php include('../MySQL/server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>All Patient</title>
</head>
<style type="text/css">
	td
	{
		text-align: center;
		font-family: vardana;
		font-size: 15px;
	}
	thead
	{
		background-color: black;
		font-size: 30px;
		color: white;
		font-family: vardana;
	}
	.form
	{
		border: 3px solid black;
	}

	.tr:hover
	{
		background-color: #F0F8CF;
		color: black;
	}
	.image
	{
		border: 2px solid black;
	}
	thead:hover
	{
		background-color: black;
		color: white;
	}
</style>
<body>
	<p><abbr title="Back"><a href="profile.php"><img src="../Images/back.jpg" width="100px" height="60px" id="img1" ></a></abbr>
    <abbr title="Logout"><a href="login.php"><img src="../Images/logout.png" width="100px" height="60px" id="img2" align="right"></a></abbr></p>
	<center>
		<form action="#" method="post" enctype="multipart/form-data" class="form">
			<table width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Full Name</th>
						<th>Phone No.</th>
						<th>Photo</th>
					</tr>
				</thead>
				<?php 
					$un=$_SESSION['username'];
					$db=mysqli_connect("localhost","root","","registration");
					$query="SELECT * FROM users";
					$run=mysqli_query($db,$query);
					$a = 0;
					while($row=mysqli_fetch_array($run))
					{
						if($row==0)
						{
							echo "There no any Patient.";
						}
						else
						{ ?>	
						<tr class="tr">
							<td><?php echo ++$a ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><img src="../Images/Database_Images/<?php echo $row['image']; ?>" height="150px" width="200px" class="image"></td>
						</tr>
						<tr>
							<td colspan="5"><hr></td>
						</tr>
						<?php }  
					}
				?>
			</table>
		</form>
	</center>
</body>
</html>