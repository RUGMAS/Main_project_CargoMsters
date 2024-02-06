<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM prices where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
	
	$street=$qry['weight_from'];
	$city=$qry['height_from'];
	$state=$qry['length_from'];
	$zip_code=$qry['width_from'];
	$street1=$qry['weight_to'];
	$city1=$qry['height_to'];
	$state1=$qry['length_to'];
	$zip_code1=$qry['width_to'];
	$country=$qry['amount'];
	
}
include 'new_price.php';
?>