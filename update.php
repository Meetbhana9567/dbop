<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
body{
	background: linear-gradient(to right, #0062E6, #33AEFF);
}
</style>
<?php

	include 'database/connection.php';
	$con = mysqli_connect($server,$username,$password,$db);
	$update_id = $_GET['id'];
	if($con)
	{
		$query_get = "SELECT * FROM tbl_details WHERE id=".$update_id;
		$result_get = mysqli_query($con,$query_get);
		
		foreach ($result_get as $row)
		{
			echo "<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
						<div class='card text-center my-5'>
							<div class='card-header'>
								<h3>Update Data</h3>
							</div>
							<div class='card-body'>
								<form method='POST' action='#'>
									<div class='form-group row'>
										<label for='inputid' class='col-sm-3 col-form-label'>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
										<div class='col-sm-9'>
											<input type='text' class='form-control' id='inputid' placeholder='Enter ID' name='id_new' value='".$row['id']."' disabled>
										</div>
									</div>
									<div class='form-group row'>
										<label for='inputfname' class='col-sm-3 col-form-label'>Edit First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
										<div class='col-sm-9'>
											<input type='text' class='form-control' id='inputfname' placeholder='Enter First Name Here' name='fname_new' value='".$row['fname']."' autofocus required>
										</div>
									</div>
									<div class='form-group row'>
										<label for='inputlname' class='col-sm-3 col-form-label'>Edit Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
										<div class='col-sm-9'>
											<input type='text' class='form-control' id='inputlname' placeholder='Enter Last Name Here' name='lname_new' value='".$row['lname']."' required>
										</div>
									</div>
									<div class='form-group row'>
										<div class='col-sm-12'>
											<button type='submit' class='btn btn-primary px-4'>Update</button>
										</div>
									</div>
								</form>"; ?>
								<?php if(isset($_GET['submit']))
									echo "<font color='green'>Updated Successfully</font>";
								?>
								<?php echo "
							</div>
						</div>
					</div>
				</div>
			</div>";			
		
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$fname_new=$_POST['fname_new'];
			$lname_new=$_POST['lname_new'];
			$query_update = "UPDATE tbl_details SET fname='$fname_new',lname='$lname_new' WHERE id=".$update_id;
			$result_update = mysqli_query($con,$query_update);	
			header("Location: showdata.php");
		}
	}
	else
	{
		die("Database Connection Failed !!!");
	}

?>