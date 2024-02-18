<?php if(!isset($conn)){ include 'db_connect.php'; } ?>
<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-parcel">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		 <input type="hidden" name="add_logid" value="<?php echo isset($_SESSION['login_id']) ? $_SESSION['login_id'] : '' ?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
              <b>Sender Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="sender_name" id="" class="form-control form-control-sm" value="<?php echo isset($sender_name) ? $sender_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="sender_address" id="" class="form-control form-control-sm" value="<?php echo isset($sender_address) ? $sender_address : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
              </div>
          </div>
          <div class="col-md-6">
              <b>Recipient Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="recipient_name" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_name) ? $recipient_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="recipient_address" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_address) ? $recipient_address : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
              </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="dtype">Type</label>
              <input type="checkbox" name="type" id="dtype" <?php echo isset($type) && $type == 1 ? 'checked' : '' ?> data-bootstrap-switch data-toggle="toggle" data-on="Domestic" data-off="International" class="switch-toggle status_chk" data-size="xs" data-offstyle="info" data-width="5rem" value="1">
            <!--  <small>Domestic = Deliver to Recipient Address</small>
              <small>, International =Deliver to Recipient Address</small>-->
            </div>
          </div>
          <div class="col-md-6" id=""  <?php echo isset($type) && $type == 1 ? 'style="display: none"' : '' ?>>
            <?php if($_SESSION['login_branch_id'] <= 0): ?>
              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Delivery Associative</label>
              <select name="from_branch_id" id="from_branch_id" class="form-control select2" required="">
                <option value=""></option>
                <?php 
                  $branches = $conn->query("SELECT *,concat(cus_name,', ',cus_address,', ',cus_state) as address FROM associatives");
                    while($row = $branches->fetch_assoc()):
                ?>
                  <option value="<?php echo $row['cus_logid'] ?>" <?php echo isset($from_branch_id) && $from_branch_id == $row['cus_logid'] ? "selected":'' ?>><?php echo $row['cus_name']. ' | '.(ucwords($row['cus_address'])) ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <?php else: ?>
              <input type="hidden" name="from_branch_id" value="<?php echo $_SESSION['login_branch_id'] ?>">
            <?php endif; ?>  
            <div class="form-group" id="tbi-field">
              <label for="" class="control-label">Deliver Country</label>
              <select name="to_branch_id" id="to_branch_id" class="form-control select2">
                <option value=""></option>
                <?php 
                  $branches = $conn->query("SELECT *,concat(country_name,', ',country_code) as address FROM country");
                    while($row = $branches->fetch_assoc()):
                ?>
                  <option value="<?php echo $row['country_id'] ?>" <?php echo isset($to_branch_id) && $to_branch_id == $row['country_id'] ? "selected":'' ?>><?php echo $row['country_code']. ' | '.(ucwords($row['country_name'])) ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <b>Parcel Information</b>
        <table class="table table-bordered" id="parcel-items">
          <thead>
            <tr>
			 <th>Category</th>
			 <th>Item Name</th>
              <th>Weight</th>
              <th>Height</th>
              <th>Length</th>
              <th>Width</th>
              <th>Price</th>
              <?php if(!isset($id)): ?>
              <th></th>
            <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
			 <td>
    <select name="cate[]" id="" cols="30" rows="2" class="form-control">
        <option value="Consumer Goods" <?php echo isset($cate) && $cate == 'Consumer Goods' ? 'selected' : ''; ?>>Consumer Goods</option>
        <option value="Industrial Goods" <?php echo isset($cate) && $cate == 'Industrial Goods' ? 'selected' : ''; ?>>Industrial Goods</option>
        <option value="Specialized Cargo" <?php echo isset($cate) && $cate == 'Specialized Cargo' ? 'selected' : ''; ?>>Specialized Cargo</option>
        <option value="Bulk Commodities" <?php echo isset($cate) && $cate == 'Bulk Commodities' ? 'selected' : ''; ?>>Bulk Commodities</option>
        <option value="Agricultural Products" <?php echo isset($cate) && $cate == 'Agricultural Products' ? 'selected' : ''; ?>>Agricultural Products</option>
        <option value="Energy Commodities" <?php echo isset($cate) && $cate == 'Energy Commodities' ? 'selected' : ''; ?>>Energy Commodities</option>
        <option value="Textiles" <?php echo isset($cate) && $cate == 'Textiles' ? 'selected' : ''; ?>>Textiles</option>
        <option value="Technology and Media" <?php echo isset($cate) && $cate == 'Technology and Media' ? 'selected' : ''; ?>>Technology and Media</option>
        <option value="Healthcare and Pharmaceutical" <?php echo isset($cate) && $cate == 'Healthcare and Pharmaceutical' ? 'selected' : ''; ?>>Healthcare and Pharmaceutical</option>
        <option value="Miscellaneous" <?php echo isset($cate) && $cate == 'Miscellaneous' ? 'selected' : ''; ?>>Miscellaneous</option>
    </select>
</td>
			    <td><input type="text" name='item[]' value="<?php echo isset($item) ? $item :'' ?>" required></td>
              <td><input type="text" name='weight[]' value="<?php echo isset($weight) ? $weight :'' ?>" required></td>
              <td><input type="text" name='height[]' value="<?php echo isset($height) ? $height :'' ?>" required></td>
              <td><input type="text" name='length[]' value="<?php echo isset($length) ? $length :'' ?>" required></td>
              <td><input type="text" name='width[]' value="<?php echo isset($width) ? $width :'' ?>" required></td>
              <td><input type="text" class="text-right number" readonly name='price[]' value="<?php echo isset($price) ? $price :'' ?>" required></td>
              <?php if(!isset($id)): ?>
              <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              <?php endif; ?>
            </tr>
          </tbody>
              <?php if(!isset($id)): ?>
          <tfoot>
            <th colspan="4" class="text-right">Total</th>
            <th class="text-right" id="tAmount">0.00</th>
            
			 <th colspan="2" class="text-right">Converted Amount</th>
            <th class="text-right" id="tAmountConverted">0.00</th>
          </tfoot>
              <?php endif; ?>
        </table>
              <?php if(!isset($id)): ?>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <button  class="btn btn-sm btn-primary bg-gradient-primary" type="button" id="new_parcel"><i class="fa fa-item"></i> Add Item</button>
          </div>
        </div>
              <?php endif; ?>
      </form>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-parcel">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parcel_list">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
<div id="ptr_clone" class="d-none">
  <table>
    <tr>
	<td><select name='cate[]' required id="" cols="30" rows="2" class="form-control">
	    <option value="Consumer Goods" <?php echo isset($cate) && $cate == 'Consumer Goods' ? 'selected' : ''; ?>>Consumer Goods</option>
        <option value="Industrial Goods" <?php echo isset($cate) && $cate == 'Industrial Goods' ? 'selected' : ''; ?>>Industrial Goods</option>
        <option value="Specialized Cargo" <?php echo isset($cate) && $cate == 'Specialized Cargo' ? 'selected' : ''; ?>>Specialized Cargo</option>
        <option value="Bulk Commodities" <?php echo isset($cate) && $cate == 'Bulk Commodities' ? 'selected' : ''; ?>>Bulk Commodities</option>
        <option value="Agricultural Products" <?php echo isset($cate) && $cate == 'Agricultural Products' ? 'selected' : ''; ?>>Agricultural Products</option>
        <option value="Energy Commodities" <?php echo isset($cate) && $cate == 'Energy Commodities' ? 'selected' : ''; ?>>Energy Commodities</option>
        <option value="Textiles" <?php echo isset($cate) && $cate == 'Textiles' ? 'selected' : ''; ?>>Textiles</option>
        <option value="Technology and Media" <?php echo isset($cate) && $cate == 'Technology and Media' ? 'selected' : ''; ?>>Technology and Media</option>
        <option value="Healthcare and Pharmaceutical" <?php echo isset($cate) && $cate == 'Healthcare and Pharmaceutical' ? 'selected' : ''; ?>>Healthcare and Pharmaceutical</option>
        <option value="Miscellaneous" <?php echo isset($cate) && $cate == 'Miscellaneous' ? 'selected' : ''; ?>>Miscellaneous</option>
	
	</select></td>
	<td><input type="text" name='item[]' required></td>
        <td><input type="text" name='weight[]' required></td>
        <td><input type="text" name='height[]' required></td>
        <td><input type="text" name='length[]' required></td>
        <td><input type="text" name='width[]' required></td>
        <td><input type="text" class="text-right number" name='price[]' required readonly></td>
        <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
      </tr>
  </table>
</div>
<script>
$('#parcel-items').on('keyup', '[name^="weight"], [name^="height"], [name^="length"],[name^="width"]', function(){
   var tr = $(this).closest('tr');
   var weight = tr.find('[name^="weight"]').val();
   var height = tr.find('[name^="height"]').val();
   var length = tr.find('[name^="length"]').val();
   var width = tr.find('[name^="width"]').val();
 var cate = tr.find('[name^="cate"]').val();
   // AJAX call to fetch price from the server based on weight, height, length, width
  $.ajax({
    url: 'get_price.php?action=get_price',
    method: 'POST',
    data: { weight: weight, height: height, length: length, width: width,cate: cate },
    success: function(response) {
        console.log(response);

        // Parse the response as a float (assuming the response is a number)
        var price = parseFloat(response);

        // Check if the parsed price is a valid number
        if (!isNaN(price)) {
            // Set the fetched price to the corresponding input field
            tr.find('[name^="price"]').val(price.toFixed(2)); // assuming you want to display 2 decimal places
			 calc();
        } else {
            // Handle the case when the fetched price is not a valid number
            console.error('Invalid price received from the server');
        }
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
});
});




  $('#dtype').change(function(){
      if($(this).prop('checked') == true){
        $('#tbi-field').hide()
      }else{
        $('#tbi-field').show()
      }
  })
    $('[name="price[]"]').keyup(function(){
      calc()
    })
  $('#new_parcel').click(function(){
    var tr = $('#ptr_clone tr').clone()
    $('#parcel-items tbody').append(tr)
    $('[name="price[]"]').keyup(function(){
      calc()
    })
    $('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9]/, '');
        val = val.replace(/,/g, '');
        val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
        $(this).val(val)
    })

  })
	$('#manage-parcel').submit(function(e){
		e.preventDefault()
		start_load()
    if($('#parcel-items tbody tr').length <= 0){
      alert_toast("Please add atleast 1 parcel information.","error")
      end_load()
      return false;
    }
	
	
		$.ajax({
			url:'ajax.php?action=save_parcel',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
			// if(resp){
      //       resp = JSON.parse(resp)
      //       if(resp.status == 1){
      //         alert_toast('Data successfully saved',"success");
      //         end_load()
      //         var nw = window.open('print_pdets.php?ids='+resp.ids,"_blank","height=700,width=900")
      //       }
			// }
        if(resp == 1){
            alert_toast('Data successfully saved',"success");
            setTimeout(function(){
              location.href = 'index.php?page=parcel_list';
            },2000)

        }
			}
		})
	})
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
  function calc(){

        var total = 0 ;
         $('#parcel-items [name="price[]"]').each(function(){
          var p = $(this).val();
              p =  p.replace(/,/g,'')
              p = p > 0 ? p : 0;
            total = parseFloat(p) + parseFloat(total)
         })
         if($('#tAmount').length > 0)
         $('#tAmount').text(parseFloat(total).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
	 
	 // Make an AJAX request to convert the total amount
	var to_branch_id = $('#to_branch_id').val();
        $.ajax({
            url: 'convert_currency.php',
            method: 'POST',
            data: { currency_code: to_branch_id, total_amount: total },
            success: function(response) {
                // Display the converted total amount
               // $('#tAmountConverted').text(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    
	 
  }
</script>