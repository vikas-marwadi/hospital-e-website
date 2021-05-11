<?php include('../MySQL/server.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table
		{
			width: 100%;
		}
		thead
		{
			background-color: black;
			color: white;
			font-family: vardana;
			line-height: 40px;
		}
		.container
		{
			border: 2px solid black;
		}
		td
		{
			text-align: center;
		}
		tr
		{
			font-size: 20px;
			line-height: 30px;
		}
		.tr:nth-child(odd)
		{
			background-color: rgba(0,0,0,0.3);
		}
	</style>
</head>
<body>
	<div class="container">
		<table>
			<thead>
				<th>No.</th>
				<th>Report Name</th>
				<th>Report</th>
				<th>Date</th>
			</thead>
			<?php 
					$un=$_SESSION['username'];
					$db=mysqli_connect("localhost","root","","registration");
					$query="SELECT * FROM report_information where username='$un'";
					$run=mysqli_query($db,$query);
					$a = 0;
					while($row=mysqli_fetch_array($run))
					{
						if($row==0)
						{
							echo "There no any Report.";
						}
						else
						{ ?>	
						<tr class="tr">
							<td><?php echo ++$a ?></td>
							<td><?php echo $row['report_name']; ?></td>
							<td><?php echo $row['reports']; ?></a></td>
							<td><?php echo $row['date']; ?></td>
						</tr>
			<?php  		}
			        }
			        ?>
			        <?php header("refresh: 2") ?>
		</table>
	</div>
</body>
</html>