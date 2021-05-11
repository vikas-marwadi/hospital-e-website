<?php include('../MySQL/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<TITLE> Report Info </TITLE>
	<style type="text/css">
		.button
		{
  			box-shadow: 0px 10px 14px -7px #276873;
  			background:linear-gradient(to bottom, #16222A 0%, #3A6073 51%);
  			background-color:#599bb3;
  			border-radius:15px;
  			display:inline-block;
  			cursor:pointer;
  			color:#ffffff;
  			font-family:Arial;
  			font-size:12px;
  			font-weight:bold;
  			padding:10px 30px;
  			text-decoration:none;
  			text-shadow:0px 1px 0px #3d768a;
  			outline: none;
		}
		.button:hover
		{
  			background:linear-gradient(to bottom, #525a69 5%, #599bb3 100%);
  			background-color:#408c99;
   			outline: none;
		}
		::placeholder
		{
			color: white;
			opacity: 1;
		}
		h1
		{
			text-align: center;
			text-decoration: underline;
			font-family: Arial;
		}
	</style>
</head>
<body>
	<h1>Add Reports</h1>
	<form autocomplete="off" action="input_report.php" method="post" enctype="multipart/form-data">
   		<table align="center" width="30%;">
   			<thead>
   				<th>Report Name</th>
   				<th>Report</th>
   			</thead>
   			<tr>
   				<td><input type="text" name="reportname" class="button" style="color: white;" placeholder="Report Name"></td>
   				<td><input type="file" name="reports" class="button"></td>
   			</tr>
   			<table align="center" width="10%">
   				<tr>
   					<td align="left"><button type="submit" class="button" name="add">Add</button></td>
   				</tr>
   			</table>
   		</table>
   </form>
</body>
</html>