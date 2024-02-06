<?php 
include('./db_connect.php');
  ob_start();
if(isset($_POST['add']))
{

    $Weight=$_POST['street'];
	$Weight1=$_POST['street1'];
    $Height=$_POST['city'];
	 $Height1=$_POST['city1'];
	
	 $Length1=$_POST['state1'];
	 $Length=$_POST['state'];
  $Width=$_POST['zip_code'];
   $Width1=$_POST['zip_code1'];
   $amt=$_POST['country'];
  $insert="insert into prices(`weight_from`,`height_from`,`length_from`,`width_from`,`weight_to`,`height_to`,`length_to`,`width_to`,`amount`) values('$Weight','$Height','$Length','$Width','$Weight1','$Height1','$Length1','$Width1','$amt')";
    $ex=mysqli_query($conn,$insert);
    if($ex)
    {
        
    echo "<script>alert('Registration Sucessful');window.location.href='./index.php?page=price_list'</script>";

    }
    else{
        echo mysqli_error($conn);
    }
}
  


 
ob_end_flush();

 ?>
<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
	<form method="post">
		<div class="card-body">
		
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Weight From</label>
                <input type="number" name="street" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($street) ? $street : '' ?>">
              </div>
			  
			    <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Weight To</label>
                <input type="number" name="street1" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($street1) ? $street1 : '' ?>">
              </div>
			  
			  
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Height From</label>
                <input type="number" name="city" id="" cols="30" rows="2" class="form-control"  value="<?php echo isset($city) ? $city : '' ?>">
              </div>
			  
			    <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Height To</label>
                <input type="number" name="city1" id="" cols="30" rows="2" class="form-control"  value="<?php echo isset($city1) ? $city1 : '' ?>">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Length From</label>
                <input type="number" name="state" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($state) ? $state : '' ?>">
              </div>
			  
			   <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Length To</label>
                <input type="number" name="state1" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($state1) ? $state1 : '' ?>">
              </div>
			  
			  
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Width From</label>
                <input type="number" name="zip_code" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($zip_code) ? $zip_code : '' ?>">
              </div>
			  
			    
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Width To</label>
                <input type="number" name="zip_code1" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($zip_code1) ? $zip_code1 : '' ?>">
              </div>
			  
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Amount</label>
                <input type="number"  name="country" id="" cols="30" rows="2" class="form-control" value="<?php echo isset($country) ? $country : '' ?>">
              </div>
              <div class="col-sm-6 form-group ">
               
                <input type="hidden" name="contact" id="" cols="30" rows="2" class="form-control">
              </div>
            </div>

          </div>
        </div>
     
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<input type="submit" class="btn btn-flat  bg-gradient-primary mx-2"  value="Save" name="add">
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=price_list">Cancel</a>
  		</div>
  	</div>
	</form>
	</div>
</div>
<script>
	
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>