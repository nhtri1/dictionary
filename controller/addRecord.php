<?php
echo "123456";
	if(isset($_POST['first_name']) && isset($_POST['last_name']))
	{
		// include Database connection file 
		include("../model/db_connection.php");

		// get values 
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];

		$query = "INSERT INTO users(first_name, last_name) VALUES('$first_name', '$last_name')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>