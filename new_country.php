<?php 

include('./db_connect.php');
  ob_start();
if(isset($_POST['add']))
{

    $name=$_POST['street'];
    $c_code=$_POST['c_code'];
  $zip_code=$_POST['zip_code'];
  
  $insert="insert into country(`country_name`,`country_code`,`currency_code`) values('$name','$c_code','$zip_code')";
    $ex=mysqli_query($conn,$insert);
    if($ex)
    {
        
    echo "<script>alert('Registration Sucessful');window.location.href='./index.php?page=new_country'</script>";

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
                <label for="" class="control-label">Country Name</label>
                <textarea name="street" id="" cols="30" rows="2" class="form-control"><?php echo isset($street) ? $street : '' ?></textarea>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Country Code</label>
                <textarea name="c_code" id="" cols="30" rows="2" class="form-control"><?php echo isset($zip_code) ? $zip_code : '' ?></textarea>
              </div>
            </div>

            <div class="row">
             
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Currency Code</label>
                <textarea name="zip_code" id="" cols="30" rows="2" class="form-control"><?php echo isset($zip_code) ? $zip_code : '' ?></textarea>
              </div>
            </div>

          

          </div>
        </div>
      
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<input type="submit" class="btn btn-flat  bg-gradient-primary mx-2"  value="Save" name="add">
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=country_list">Cancel</a>
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