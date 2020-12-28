<?php

	include 'database/connection.php';
	$con = mysqli_connect($server,$username,$password,$db);
	$delete_id = $_GET['id'];
	if($con)
	{
		$query_delete = "DELETE FROM tbl_details WHERE id=".$delete_id;
		$result = mysqli_query($con,$query_delete);
		header("Location: showdata.php");
	}
	else
	{
		die("Database Connection Failed !!!");
	}

?>