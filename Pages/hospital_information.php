<?php include('../MySQL/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Information</title>
	<style type="text/css">
		th
		{
			background-color: black;
			color: white;
			font-size: 30px;
		}
		td
		{
			text-align: center;
			font-size: 20px;
			line-height: 40px;
		}
		.tr:hover
		{
			background-color: grey;
		}
	</style>
</head>
<body>
	<p><abbr title="Back"><a href="profile.php"><img src="../Images/back.jpg" width="100px" height="60px" id="img1" ></a></abbr>
    <abbr title="Logout"><a href="login.php"><img src="../Images/logout.png" width="100px" height="60px" id="img2" align="right"></a></abbr></p>
	<table align="center" width="100%">
		<thead>
			<th>No.</th>
			<th>Hospital Name</th>
			<th>City</th>
			<th>Date</th>
		</thead>
		<?php 
			$un=$_SESSION['username'];
			$db=mysqli_connect("localhost","root","","registration");
			$query="SELECT * FROM hospital_information where username='$un'";
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
						<td><?php echo $row['hospital_name']; ?></td>
						<td><?php echo $row['hospital_city']; ?></td>
						<td><?php echo $row['date']; ?></td>
					</tr>
					<tr>
						<td colspan="4"><hr></td>
					</tr>
			<?php }  
			}
		?>
</body>
</html>