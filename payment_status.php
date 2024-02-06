<?php 
include 'db_connect.php';

if ($_GET['parcelid']) {
	$id=$_GET['parcelid'];
 $update = $conn->query("UPDATE parcels set status=1 where id = $id"); 
 
  
exit;

}

?>
