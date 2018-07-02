<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();
	// include Database connection file 

	// Design initial table header 
	$data = '<table class="table">
						<tr>
							<th>No.</th>
							<th>Từ</th>
							<th>Nghĩa</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';
$sql = "SELECT ID, Tu, Nghia from dnqatv_final";
$paginationlink = "../controller/readRecords.php?page=";	
$pagination_setting = "all-link";
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);
if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}

if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
}



    // if query results contains rows then featch those rows 
    	$number = 1;
    	foreach($faq as $k=>$v)
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$faq[$k]["Tu"].'</td>
				<td>'.$faq[$k]["Nghia"].'</td>
				<td>
					<button onclick="GetUserDetails('.$faq[$k]["ID"].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$faq[$k]["ID"].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    
	    $data .= '</table>';

$data .= '</table><br /><div align="center">';
if(!empty($perpageresult)) {
$data .= '<div id="pagination">' . $perpageresult . '</div>';
}
print $data;

?>