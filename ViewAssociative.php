<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Associative Name</th>
						<th>Reg No</th>
						<th>Address/Email/Phone</th>
						<th>Our Delivery Boys</th>
					
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM associatives");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td class=""><b><?php echo $row['cus_name'] ?></b></td>
						<td><b><?php echo $row['cus_adhaar'] ?></b></td>
						<td><b><?php echo $row['cus_address'] ?></b><br>
						<?php echo $row['cus_email'] ?><br><?php echo $row['cus_phoneno'] ?></td>


						<td>
								<?php
								// Fetch delivery boys associated with this associative
								$delivery_qry = $conn->query("SELECT * FROM users WHERE branch_id = {$row['cus_logid']}");
								while ($delivery_row = $delivery_qry->fetch_assoc()) {
									echo "<b>{$delivery_row['firstname']}</b><br>";
								}
								?>
							</td>
					
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_branch').click(function(){
			uni_modal("branch's Details","view_branch.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_branch').click(function(){
	_conf("Are you sure to delete this Country?","delete_branch",[$(this).attr('data-id')])
	})
	})
	function delete_branch($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_country',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>