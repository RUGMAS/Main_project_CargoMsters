<?php session_start();
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM parcels where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
if($to_branch_id > 0 || $from_branch_id > 0){
	$to_branch_id = $to_branch_id  > 0 ? $to_branch_id  : '-1';
	$from_branch_id = $from_branch_id  > 0 ? $from_branch_id  : '-1';
$branch = array();
 $branches = $conn->query("SELECT *,concat(cus_name,', ',cus_address,', ',cus_phoneno,', ',cus_state) as address FROM associatives where cus_logid in ($from_branch_id)");
    while($row = $branches->fetch_assoc()):
    	$branch = $row['address'];
	endwhile;
$country = array();	
$country1 = $conn->query("SELECT *,concat(country_name,', ',country_code,', ',currency_code) as address FROM country where country_id in ($to_branch_id)");
    while($row1 = $country1->fetch_assoc()):
    	$country = $row1['address'];
	endwhile;	
	
}
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b><?php echo $reference_number ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Sender Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($sender_name) ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($sender_address) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($sender_contact) ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($recipient_name) ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($recipient_address) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($recipient_contact) ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Parcel Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Weight <span style="font-size:11px">(Units: Grams (g), Kilograms (kg), Pounds (lbs), etc.)</span>:</dt>
									<dd><?php echo $weight ?></dd>
									<dt>Height <span style="font-size:11px">(Units: Millimeters (mm), Centimeters (cm), Meters (m), Inches (in), Feet (ft), etc.)</span>:</dt>
									<dd><?php echo $height ?></dd>
									<dt>Price:</dt>
									<dd><?php echo number_format($price,2) ?></dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Width <span style="font-size:11px">(Similar to Height & Length:** Use appropriate tools to measure the side-to-side distance)</span>:</dt>
									<dd><?php echo $width ?></dd>
									<dt>length <span style="font-size:11px">(Units: Millimeters (mm), Centimeters (cm), Meters (m), Inches (in), Feet (ft), etc.)</span>:</dt>
									<dd><?php echo $length ?></dd>
									<dt>Type:</dt>
									<dd><?php echo $type == 1 ? "<span class='badge badge-primary'>Domestic</span>":"<span class='badge badge-info'>International</span>" ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						<dt>Delivery Associative Accepted the Parcel:</dt>
						<dd><?php if(!empty($branch)): ?> <?php echo $branch ?> <?php endif;?></dd>
						<?php if($type == 2): ?>
							<dt>Delivery Country</dt>
							<dd><?php echo ucwords($country) ?></dd>
						<?php endif; ?>
						<dt>Status:</dt>
						<dd>
							<?php 
							switch ($status) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Collected</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;
								case '3':
									echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
									break;
								case '4':
									echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
									break;
								case '5':
									echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
									break;
								case '6':
									echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
									break;
								case '7':
									echo "<span class='badge badge-pill badge-success'>Delivered</span>";
									break;
								case '8':
									echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
									break;
								case '9':
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								
								case '10':
									echo "<span class='badge badge-pill badge-danger'> Approved</span>";
									break;
								default:
									echo "<span class='badge badge-pill badge-info'> Waiting For Delivery Associative Approval</span>";
									
									break;
							}

							?>
							<?php if($_SESSION['login_type'] == 4 ||  $_SESSION['login_type'] == 2){ ?>
							<span class="btn badge badge-primary bg-gradient-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</span>
							<?php } ?>
							
							<?php if($_SESSION['login_type'] == 1 ){ ?>
							<span class="btn badge badge-primary bg-gradient-primary" id='Assign_associative'><i class="fa fa-edit"></i> Assign</span>
							<?php } ?>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
	$('#update_status').click(function(){
		uni_modal("Update Status of: <?php echo $reference_number ?>","manage_parcel_status.php?id=<?php echo $id ?>&cs=<?php echo $status ?>","")
	})
	
	$('#Assign_associative').click(function(){
		uni_modal("Assign_associative of: <?php echo $reference_number ?>","assign_Associative.php?id=<?php echo $id ?>&cs=<?php echo $status ?>","")
	})
	
</script>