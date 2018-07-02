<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * from dnqatv_final";
$paginationlink = "getresult.php?page=";	
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


$output = '';
$output .= "  
      <table class='table table-bordered'>  
           <tr>  
                <th width='50%'>Tu</th>  
                <th width='50%'>Nghia</th>  
           </tr>  
 ";
foreach($faq as $k=>$v) {
	 $output .= '  
           <tr>  
                <td>' . $faq[$k]["Tu"] . '</td>  
                <td>' . $faq[$k]["Nghia"] . '</td>  
           </tr>  
      ';
}
$output .= '</table><br /><div align="center">';
if(!empty($perpageresult)) {
$output .= '<div id="pagination">' . $perpageresult . '</div>';
}
print $output;
?>
