<?php
//connect to the mysql
$data = $_POST;
 $tu = $data["phrase"];
$db = @mysql_connect('127.0.0.1', 'root', '') or die("Could not connect database");


@mysql_select_db('movedb', $db) or die("Could not select database");
 
//database query	
@mysql_query('SET CHARACTER SET utf8');

	$sql = @mysql_query("select Tu,Nghia from dnqatv_final where Tu like '%$tu%'");
	$rows = array();
while($r = mysql_fetch_assoc($sql)) {
  $rows[] = $r;
}
 
//echo result as json
echo json_encode($rows);

 



?>