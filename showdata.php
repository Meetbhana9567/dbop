<!Doctype html>
<html>
	<head>
		<title>Database Operation</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
			body{
				background: linear-gradient(to right, #0062E6, #33AEFF);
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card text-center my-5">
						<div class="card-header">
							<h3>Database(db_records) => tbl_details</h3>
						</div>
						<div class="card-body">
							<?php
		
								include 'database/connection.php';
								$con = mysqli_connect($server,$username,$password,$db);
								if($con)
								{
									//echo "Database Connected";
									$query_showdata = "SELECT * FROM tbl_details";
									$result_showdata = mysqli_query($con,$query_showdata);
									echo "
										<table align='center' border='1px solid black' style='border-collapse:collapse;width:80%;'>
											<tr>
												<th>id</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th colspan='2'>Modify</th>
											</tr>
									";
									foreach ($result_showdata as $row)
									{
										echo "<tr>";
											echo "<td>".$row['id']."</td>";
											echo "<td>".$row['fname']."</td>";
											echo "<td>".$row['lname']."</td>";
											echo "<td><a href='delete.php?id=".$row['id']."'>DELETE</a></td>";
											echo "<td><a href='update.php?id=".$row['id']."'>UPDATE</a></td>";
										echo "</tr>";
									}
									echo "</table>";
								}
								else
								{
									die("Database Connection Failed !!!");
								}
							
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>