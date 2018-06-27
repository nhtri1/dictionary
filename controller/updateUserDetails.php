<?php
// include Database connection file
include("../model/db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $tu = $_POST['tu'];
    $nghia = $_POST['nghia'];


    // Updaste User details
    $query = "UPDATE dnqatv_final SET Tu = '$tu', Nghia = '$nghia'  WHERE ID = '$id'";
	echo $query ;

    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}