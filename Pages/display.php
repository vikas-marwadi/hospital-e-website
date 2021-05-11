<?php include('../MySQL/server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
</head>
<style type="text/css">
	td
	{
		text-align: center;
		font-family: cooper;
		font-size: 15px;
	}
	thead
	{
		background-color: black;
		font-size: 30px;
		color: white;
		font-family: cooper;
	}
</style>
<body>
	<center>
		<form action="#" method="post" enctype="multipart/form-data">
			<table width="1000 px">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email Address</th>
						<th>Age</th>
						<th>Photo</th>
					</tr>
				</thead>
				<?php 
					$un=$_SESSION['username'];
					$db=mysqli_connect("localhost","root","","registration");
					$query="SELECT * FROM users WHERE username='$un' ";
					$run=mysqli_query($db,$query);
					while($row=mysqli_fetch_array($run))
					{
						if($row==0)
						{
							echo "There no any Patient.";
						}
						else
						{ ?>

						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><img src="Images/<?php echo $row['image']; ?>" height="150px" width="200px"></td>
						</tr> 
						<?php }  
					}
				?>
			</table>
		</form>
	</center>
</body>
</html>