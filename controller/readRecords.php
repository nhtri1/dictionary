<?php
	// include Database connection file 
	include("../model/db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Từ</th>
							<th>Nghĩa</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';
$record_per_page = 2;
$page            = '';
$output          = '';
if (isset($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
$query  = "SELECT * FROM dnqatv_final ORDER BY id DESC LIMIT $start_from, $record_per_page";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['Tu'].'</td>
				<td>'.$row['Nghia'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['ID'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['ID'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
	    $data .= '</table>';

$data .= '</table><br /><div align="center">';
$page_query    = "SELECT * FROM dnqatv_final ORDER BY ID DESC";
$page_result   = mysqli_query($con, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages   = ceil($total_records / $record_per_page);
for ($i = 1; $i <= $total_pages; $i++) {
    $data .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='" . $i . "'>" . $i . "</span>";
}
$data .= '</div><br /><br />';

    echo $data;
?>