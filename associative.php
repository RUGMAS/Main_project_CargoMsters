<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  
  if(isset($_POST['add']))
{
	
	
    $name=$_POST['t1'];
    $adhar=$_POST['t2'];
  $cus_address=$_POST['t3'];
   $cus_gender=$_POST['t4'];
    $cus_email=$_POST['t5'];
	 $cus_phoneno=$_POST['t6'];
	  $cus_state=$_POST['t7'];
	   $pass=$_POST['t8'];
$password=md5($pass);
   $insert1="insert into users(`firstname`,`lastname`,`email`,`password`,`type`,`branch_id`) values('$name','','$cus_email','$password','4','')";
 $ex1=mysqli_query($conn,$insert1);
 $idl=mysqli_insert_id($conn);

  $insert="insert into associatives(`cus_name`,`cus_adhaar`,`cus_address`,`cus_email`,`cus_phoneno`,`cus_state`,`cus_logid`) values('$name','$adhar','$cus_address','$cus_email','$cus_phoneno','$cus_state','$idl')";
    $ex=mysqli_query($conn,$insert);
    if($ex)
    {
        
    echo "<script>alert('Registration Sucessful');window.location.href='associative.php'</script>";

    }
    else{
        echo mysqli_error($conn);
    }
}
  
  
  
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
	<script src="assets/plugins/jquery/jquery.min.js"></script>

<style>
 body {
            font-family: Arial, sans-serif;
            background-color: #e6f7ff; /* Light Blue-Green */
            background-image: url("images/viewpage.jpg");
            padding-top: 50px; /* Add padding to prevent content from being hidden by the fixed header */
            /* Add animation for the butterfly effect */
            animation: butterflyEffect 15s linear infinite;
        }

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  text-align: center;
  background-color: #e6f7ff;
  padding: 20px 0px 30px 0px;
  margin-top: 150px;
  margin-left: 90px;
  margin-right: 90px;
  
} 

/* style inputs and link buttons */
input,
.btn {
  width: 50%;
  padding: 10px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

/* style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #0099cc;
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  text-align: center;
  padding: 0 50px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #0099cc;
  border-radius: 0px 0px 4px 4px;
  margin-left: 90px;
  margin-right: 90px;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 50%;
    margin-top: 0;
    
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}
 /* Keyframes for the butterfly effect animation */
        @keyframes butterflyEffect {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }
		
	
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.logo {
    font-size: 1.5rem;
}

ul {
    list-style: none;
    display: flex;
}

li {
    margin-right: 1rem;
}

a {
    text-decoration: none;
    color: #fff;
}

/* Header Icons */
.header-icons {
    display: flex;
    align-items: center;
}

.header-icons i {
    margin-right: 1rem;
}

/* Header Login Link */
.header-login a {
    color: #fff;
    text-decoration: none;
    margin-right: 1rem;
}
 header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: #0099cc; /* Dark Blue */
    color: #fff;
    padding: 1rem 0;
    z-index: 100;
}	
 input[type="radio"] {
    margin-right: 5px;
  }

  /* Style the select box */
  select {
    width: 50%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 5px 0;
    opacity: 0.85;
    font-size: 17px;
    line-height: 20px;
  }
  
</style>
</head>
<body class="hold-transition login-page" >
<header>
        <nav>
            <div class="logo">Cargo Master</div>
            <ul>
                <li><a href="customer_registation.php">User Register</a></li>
               <!-- <li><a href="#"></a></li>-->
            </ul>
            <div class="header-login">
                <a href="associative.php">Delivery Associative</a>
            </div>
           <!-- <div class="header-icons">
                <i class="fas fa-search"></i> 
                <i class="fas fa-user-circle"></i> 
                <i class="fas fa-envelope"></i> 
                <i class="fas fa-phone"></i> 
            </div>-->
        </nav>
    </header>
  <div>
<div class="container">
    <form method="post">
        <div class="row">
            <h2 style="text-align:center">Delivery Associate Registration</h2>

            <div class="col">
                <div class="form-group">
                    <label for="t1">Company Name:</label>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" id="t1" name="t1" placeholder="Enter Company name" pattern="[a-zA-Z ]*" required />
                </div>

                <div class="form-group">
                    <label for="t2">Company Register No:</label>
                    <input type="text" id="t2" name="t2" placeholder="Enter Company Register No" />
                </div>

                <div class="form-group">
                    <label for="t3">Address:</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;    <input type="text" id="t3" name="t3" placeholder="Enter Address" />
                </div>
				  <div class="form-group">
                    <label for="t6">Phone Number:</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" id="t6" name="t6" pattern="[0-9]*" placeholder="Enter Phone Number" />
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="t5">Email:</label>
                 &nbsp;&nbsp;&nbsp;&nbsp;   <input type="email" id="t5" name="t5" placeholder="Email" required />
                </div>

              

                <div class="form-group">
                    <label for="state">State:</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<select name="t7" id="state">
                        <option value="" disabled selected>Select State</option>
    <option value="CA-USA">California, USA</option>
    <option value="NY-USA">New York, USA</option>
    <option value="TX-USA">Texas, USA</option>
    <option value="BC-CAN">British Columbia, Canada</option>
    <option value="ON-CAN">Ontario, Canada</option>
    <option value="QC-CAN">Quebec, Canada</option>
    <option value="NSW-AUS">New South Wales, Australia</option>
    <option value="VIC-AUS">Victoria, Australia</option>
    <option value="QLD-AUS">Queensland, Australia</option>
    <option value="ENG-UK">England, UK</option>
    <option value="SCT-UK">Scotland, UK</option>
    <option value="WLS-UK">Wales, UK</option>
    <option value="BAV-GER">Bavaria, Germany</option>
    <option value="NRW-GER">North Rhine-Westphalia, Germany</option>
    <option value="BW-GER">Baden-Württemberg, Germany</option>
    <option value="ILE-FRA">Île-de-France, France</option>
    <option value="OCC-FRA">Occitanie, France</option>
    <option value="NA-FRA">Nouvelle-Aquitaine, France</option>
    <option value="MAH-IND">Maharashtra, India</option>
    <option value="DEL-IND">Delhi, India</option>
    <option value="KAR-IND">Karnataka, India</option>
    <option value="GUA-MEX">Guanajuato, Mexico</option>
    <option value="JAL-MEX">Jalisco, Mexico</option>
    <option value="CHH-MEX">Chihuahua, Mexico</option>
    <option value="TOK-JPN">Tokyo, Japan</option>
    <option value="KAN-JPN">Kanagawa, Japan</option>
    <option value="OSA-JPN">Osaka, Japan</option>
    <option value="GAU-ZAF">Gauteng, South Africa</option>
    <option value="KZN-ZAF">KwaZulu-Natal, South Africa</option>
    <option value="WC-ZAF">Western Cape, South Africa</option>
    <option value="SP-BRA">São Paulo, Brazil</option>
    <option value="RJ-BRA">Rio de Janeiro, Brazil</option>
    <option value="MG-BRA">Minas Gerais, Brazil</option>
    <option value="MOW-RUS">Moscow, Russia</option>
    <option value="SPE-RUS">Saint Petersburg, Russia</option>
    <option value="KRA-RUS">Krasnodar Krai, Russia</option>
    <!-- Add more options as needed -->
</select>

                    </select>
                </div>

                <div class="form-group">
                    <label for="t8">Password:</label>
                    <input type="password" id="t8" name="t8" placeholder="Password" required />
                </div>

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Save" name="add" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="landing.php" style="color:white" class="btn">Already Have an Account ? Login Now</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn"></a>
    </div>
  </div>
</div>

</body>
</html>

<script>
 
</script>
<?php include 'footer.php' ?>