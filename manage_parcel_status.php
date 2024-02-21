<?php 
session_start();
include('./db_connect.php');

if(isset($_POST['dddadd'])) {
    
	if($_SESSION['login_type'] != 4)
	{
		$logid = $_POST['log'];
    $logname = $_POST['logname'];
	$route = $_POST['route'];
$status = $_POST['status'];
}else{
	$status =10;
}
	//var_dump( $status );die();
    
    $id = $_POST['id'];
if($_SESSION['login_type'] != 4)
	{
    $upt = "UPDATE parcels set status= $status, update_logid=$logid, update_boy_name='$logname' where id = $id";
    $exu = mysqli_query($conn, $upt);
    
    $insert = "INSERT INTO parcel_tracks(`status`, `current_route`, `parcel_id`) VALUES ('$status', '$route', '$id')";
    $ex = mysqli_query($conn, $insert);
    }else{
		 $upt = "UPDATE parcels set status= $status where id = $id";
    $exu = mysqli_query($conn, $upt);
    
    $insert = "INSERT INTO parcel_tracks(`status`, `parcel_id`) VALUES ('$status', '$id')";
    $ex = mysqli_query($conn, $insert);
	}
    if($ex) {
        echo "<script>alert('Status Updated');window.location.href='associative.php'</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<form method="post" action="manage_parcel_status.php">
    <div class="container-fluid">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="">Update Status</label>
            <?php			
            if($_SESSION['login_type'] == 2) { 
                $status_arr = array("Waiting","Collected","Shipped","In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessful Delivery Attempt");
            } else {
                $status_arr = array("Waiting","Approve");
            }
            ?>
            <select name="status" id="" class="custom-select custom-select-sm">
                <?php foreach($status_arr as $k => $v): ?>
                    <option value="<?php echo $k ?>" <?php echo $_GET['cs'] == $k ? "selected" :'' ?>><?php echo $v; ?></option>
                <?php endforeach; ?>
            </select>
            
            <?php if($_SESSION['login_type'] == 2) { ?>
            <input type="hidden" value="<?php echo $_SESSION['login_id']?>" name="log">
            <input type="hidden" value="<?php echo $_SESSION['login_name']?>" name="logname">
            <label>Route Optimization</label>
            <textarea class="form-control" name="route"></textarea>
            <?php } ?>
        </div>
    </div>
    <div class="modal-footer display p-0 m-0">
        <button type="submit" name="dddadd" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" onclick="uni_modal('Parcel\'s Details','view_parcel.php?id=<?php echo $_GET['id'] ?>','large')">Close</button>
    </div>
</form>
<style>
    #uni_modal .modal-footer {
        display: none;
    }
    #uni_modal .modal-footer.display {
        display: flex;
    }
</style>
