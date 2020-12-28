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
							<h3>Insert Form</h3>
						</div>
						<div class="card-body">
							<form method="POST" action="#">
								<div class="form-group row">
									<label for="inputfname" class="col-sm-2 col-form-label">First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputfname" placeholder="Enter First Name Here" name="fname" autofocus required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputlname" class="col-sm-2 col-form-label">Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputlname" placeholder="Enter Last Name Here" name="lname" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-primary px-4">Submit</button>
									</div>
								</div>
							</form>
							<form method="GET" action="showdata.php">
								<button class="btn btn-primary px-4">View Data</button>
							</form>
							<?php
							
								if($_SERVER["REQUEST_METHOD"] == "POST")
								{
									//echo "<font color='green'>Submitted</font>";
									
									$fname = $_POST['fname'];
									$lname = $_POST['lname'];
									include 'database/connection.php';
									$con = mysqli_connect($server,$username,$password,$db);
									if($con)
									{
										//echo "Database Connected";
										$query_insert = "INSERT INTO tbl_details(id,fname,lname) VALUES('0','$fname','$lname')";
										$result_insert = mysqli_query($con,$query_insert);
										echo "<font color='green'>Submitted Successfully</font>";
									}
									else
									{
										die("Database Connection Failed !!!");
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>