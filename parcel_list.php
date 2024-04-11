<?php include'db_connect.php' ;
require './razorpay-php-2.8.7/Razorpay.php';

use Razorpay\Api\Api;

$api = new Api('rzp_test_rV45cYN1u5Evk7', 'E6cBLbYiL9WaG4jKy8jyWcqI');

$orderId = ""; // Initialize $orderId outside the condition to avoid undefined variable issues

?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
			<?php if($_SESSION['login_type'] == 3) { ?>
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./index.php?page=new_parcel"><i class="fa fa-plus"></i> Add New</a>
			<?php } ?>
			</div>
		</div>
		<div class="card-body">
		<div class="row">
						<div class="col-md-12">
        					<button type="button" class="btn btn-success float-right"  id="print"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>	
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
						<th>Reference Number</th>
						<?php if($_SESSION['login_type'] != 3) { ?><th>Sender Name</th> <?php } ?>
						<th>Recipient Name</th>
						<th>Category/ Item</th>
						<th>Status
						<!-- <br>
							<img src="images/barcode.gif" > -->

						</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					if(isset($_GET['s'])){
						$where = " where status = {$_GET['s']} ";
					}
					if($_SESSION['login_type'] == 4 ){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = {$_SESSION['login_id']}) ";
					}
					else if($_SESSION['login_type'] == 2){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = {$_SESSION['login_branch_id']}) ";
					}
					else if($_SESSION['login_type'] == 3){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (add_logid = {$_SESSION['login_id']}) ";
					}
					else if($_SESSION['login_type'] == 1){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = 0) ";
					}
					$qry = $conn->query("SELECT * from parcels $where order by  unix_timestamp(date_created) desc ");
					while($row= $qry->fetch_assoc()):
					 if ($_SESSION['login_type'] == 2 && $row['update_logid'] == $_SESSION['login_id'] && $row['status']!=1 ) {
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ($row['reference_number']) ?><br>Deliver Boy:-<?php echo ($row['update_boy_name']) ?></b></td>
							<?php if($_SESSION['login_type'] != 3) { ?><td><b><?php echo ucwords($row['sender_name']) ?></b></td><?php } ?>
						<td><b><?php echo ucwords($row['recipient_name']) ?></b></td>
						<td><b><?php echo ($row['cate']) ?><br>Item:-<?php echo ($row['item']) ?></td>
						<td class="text-center">
							<?php 
							switch ($row['status']) {
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
							<?php 
							if ($row['status']==10 && $_SESSION['login_type'] == 3) {?>
							 <span class="btn badge badge-primary bg-gradient-primary" id='rzp-button1'>
            <i class="fa fa-edit"></i> Pay Now
        </span>
							<input type="hidden" value="<?php echo $row['price'] ?>" id="amount">
							<input type="hidden" value="<?php echo $row['sender_name'] ?>" id="name">
							<input type="hidden" value="<?php echo $row['id'] ?>" id="parcelid">
							<input type="hidden" value="<?php echo $row['sender_contact'] ?>" id="mob">
							<?php } ?>
							
						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <a href="index.php?page=edit_parcel&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>
	<?php } elseif($_SESSION['login_type'] == 2 && $row['status']==1) {  ?>

<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ($row['reference_number']) ?><br>Deliver Boy:-<?php echo ($row['update_boy_name']) ?></b></td>
							<?php if($_SESSION['login_type'] != 3) { ?><td><b><?php echo ucwords($row['sender_name']) ?></b></td><?php } ?>
						<td><b><?php echo ucwords($row['recipient_name']) ?></b></td>
						<td><b><?php echo ($row['cate']) ?><br>Item:-<?php echo ($row['item']) ?></td>
						<td class="text-center">
							<?php 
							switch ($row['status']) {
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
							<?php 
							if ($row['status']==10 && $_SESSION['login_type'] == 3) {?>
							 <span class="btn badge badge-primary bg-gradient-primary" id='rzp-button1'>
            <i class="fa fa-edit"></i> Pay Now
        </span>
							<input type="hidden" value="<?php echo $row['price'] ?>" id="amount">
							<input type="hidden" value="<?php echo $row['sender_name'] ?>" id="name">
							<input type="hidden" value="<?php echo $row['id'] ?>" id="parcelid">
							<input type="hidden" value="<?php echo $row['sender_contact'] ?>" id="mob">
							<?php } ?>
							

						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <a href="index.php?page=edit_parcel&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>

					
		<?php } elseif($_SESSION['login_type'] == 2 && $row['status']==10) {  ?>
					 <tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ($row['reference_number']) ?><br>Deliver Boy:-<?php echo ($row['update_boy_name']) ?></b></td>
							<?php if($_SESSION['login_type'] != 3) { ?><td><b><?php echo ucwords($row['sender_name']) ?></b></td><?php } ?>
						<td><b><?php echo ucwords($row['recipient_name']) ?></b></td>
							<td><b><?php echo ($row['cate']) ?><br>Item:-<?php echo ($row['item']) ?></td>
						<td class="text-center">
							<?php 
							switch ($row['status']) {
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
							<?php 
							if ($row['status']==10 && $_SESSION['login_type'] == 3) {?>
							 <span class="btn badge badge-primary bg-gradient-primary" id='rzp-button1'>
            <i class="fa fa-edit"></i> Pay Now
        </span>
							<input type="hidden" value="<?php echo $row['price'] ?>" id="amount">
							<input type="hidden" value="<?php echo $row['sender_name'] ?>" id="name">
							<input type="hidden" value="<?php echo $row['id'] ?>" id="parcelid">
							<input type="hidden" value="<?php echo $row['sender_contact'] ?>" id="mob">
							<?php } ?>
							
						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <a href="index.php?page=edit_parcel&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
					 
		<?php } elseif($_SESSION['login_type'] != 2){?>
		 <tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ($row['reference_number']) ?><br>Deliver Boy:-<?php echo ($row['update_boy_name']) ?></b></td>
							<?php if($_SESSION['login_type'] != 3) { ?><td><b><?php echo ucwords($row['sender_name']) ?></b></td><?php } ?>
						<td><b><?php echo ucwords($row['recipient_name']) ?></b></td>
							<td><b><?php echo ($row['cate']) ?><br>Item:-<?php echo ($row['item']) ?></td>
						<td class="text-center">
							<?php 
							switch ($row['status']) {
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
							<?php 
							if ($row['status']==10 && $_SESSION['login_type'] == 3) {?>
							 <span class="btn badge badge-primary bg-gradient-primary" id='rzp-button1'>
            <i class="fa fa-edit"></i> Pay Now
        </span>
							<input type="hidden" value="<?php echo $row['price'] ?>" id="amount">
							<input type="hidden" value="<?php echo $row['sender_name'] ?>" id="name">
							<input type="hidden" value="<?php echo $row['id'] ?>" id="parcelid">
							<input type="hidden" value="<?php echo $row['sender_contact'] ?>" id="mob">
							<?php } ?>
						
						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-eye"></i>
		                        </button>
								<?php if ( $_SESSION['login_type'] != 1) {?>
		                        <a href="index.php?page=edit_parcel&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
								<?php } ?>
	                      </div>
						</td>
					</tr>		
					 
					 
					 
		<?php } endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
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
	<h3 class="text-center"><b>Report</b></h3>
</noscript>
<div class="details d-none">
		
		<p><b>Status:</b> <span class="status-field">All</span></p>
	</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
var amt=document.getElementById('amount').value * 100;
var name=document.getElementById('name').value;
var mob=document.getElementById('mob').value ;
var parcelid=document.getElementById('parcelid').value ;
  var options = {
    "key": "rzp_test_rV45cYN1u5Evk7", // Enter the Key ID generated from the Dashboard
    "amount": amt,
    "currency": "INR",
    "description": "Acme Corp",
    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
    "prefill":
    {
		"name": name,
      "email": "gaurav.kumar@example.com",
      "contact": mob,
    },
  config: {
    display: {
      blocks: {
        banks: {
          name: 'Most Used Methods',
          instruments: [
            {
              method: 'wallet',
              wallets: ['freecharge']
            },
            {
                method: 'upi'
            },
            ],
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: true,
      },
    },
  },
    "handler": function (response) {
      alert(response.razorpay_payment_id);
	  alert('Payment successful!');
      window.location.href = './index.php?page=payment_status&parcelid=' + parcelid;
    },
    "modal": {
      "ondismiss": function () {
        if (confirm("Are you sure, you want to close the form?")) {
          txt = "You pressed OK!";
          console.log("Checkout form closed by the user");
        } else {
          txt = "You pressed Cancel!";
          console.log("Complete the Payment")
        }
      }
    }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    rzp1.open();
    e.preventDefault();
  }
</script>

<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_parcel').click(function(){
			uni_modal("Parcel's Details","view_parcel.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_parcel').click(function(){
	_conf("Are you sure to delete this parcel?","delete_parcel",[$(this).attr('data-id')])
	})
	})
	function delete_parcel($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_parcel',
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
	$('#print').click(function(){
		start_load()
		var ns = $('noscript').clone()
		var details = $('.details').clone()
		var content = $('#list').clone()
		var date_from = $('#date_from').val()
		var date_to = $('#date_to').val()
		var status = $('#status').val()
		var stat_arr = '<?php echo json_encode($status_arr) ?>';
			stat_arr = JSON.parse(stat_arr);
		details.find('.drange').text(date_from+" to "+date_to )
		if(status>-1)
		details.find('.status-field').text(stat_arr[status])
		ns.append(details)
		   content.find('th:last-child, td:last-child').remove();
  // Add heading before content
    ns.append('<h3 class="text-center"><b>CARGO MASTER</b></h3>');
  // Add barcode image
  ns.append('<img src="images/barcode.gif" style="width: 100px; height: auto; display: block; margin: 20px auto;">');
    ns.append(content);
		ns.append(content)
		
		var nw = window.open('','','height=700,width=900')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)

	})



</script>
