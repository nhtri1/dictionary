<?php
echo "123456";
	if(isset($_POST['tu']) && isset($_POST['nghia']))
	{
		// include Database connection file 
		include("../model/db_connection.php");

		// get values 
		$tu = $_POST['tu'];
		$nghia = $_POST['nghia'];

		$query = "INSERT INTO dnqatv_final(Tu, Nghia) VALUES('$tu', '$nghia')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}
?>