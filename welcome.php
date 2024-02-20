<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php 
session_start();
include('./db_connect.php');
  ob_start();
   if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
  
//require_once 'google-api-php-client-main/vendor/autoload.php';
 
  $clientID = "248618394498-u09ljvvvssqtkhldkjnsbn98m8aia2n4.apps.googleusercontent.com"; // Replace with your Google Client ID
$secret = "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"; // Replace with your Google Client Secret
 //Google API Client
$gclient = new Google_Client();


$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri('http://localhost/logman/home.php');

$gclient->addScope('email');
$gclient->addScope('profile');



// Check if the user clicks the Google sign-in button
if (isset($_GET['code'])) {
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if (!isset($token['error'])) {
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // Store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service
        $gservice = new Google_Service_Oauth2($gclient);

        // Get User Data
        $udata = $gservice->userinfo->get();
        foreach ($udata as $k => $v) {
            $SESSION['login' . $k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];
        $email = $_SESSION['login_email'];

        if (isset($_SESSION['ucode']) && !empty($_SESSION['ucode'])) {
            // Query the database to check if the email exists
            $query = "SELECT * FROM tbl_user WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                $role = $user_data['role'];

                switch ($role) {
                    case 0:
                        // Admin role
                        $_SESSION['login_role'] = 0;
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: admin/adminProfile.php");
                        exit;
                    case 1:
                        $_SESSION['login_role'] = 1;
                        $_SESSION['user_id'] = $user_data['user_id'];
                        // User role
                        header("Location: home.php");
                        exit;
                    case 2:
                        $_SESSION['login_role'] = 2;
                        $_SESSION['user_id'] = $user_data['user_id'];
                        // Seller role
                        header("Location: seller/sellerProfile.php");
                        exit;
                    case 3:
                        $_SESSION['login_role'] = 3;
                        $_SESSION['user_id'] = $user_data['user_id'];
                        // Delivery boy role
                        header("Location: deliveryboy/deliveryboyProfile.php");
                        exit;
                    default:
                        // Invalid role
                        echo '<script>alert("Invalid role!")</script>';
                        exit;
                }
            } else {
                // Email not found in the database
                echo '<script>alert("Email not found!")</script>';
            }
        } else {
            echo '<script>alert("Invalid session code!")</script>';
        }
    } else {
        echo '<script>alert("Token retrieval error!")</script>';
    }
}
  
  
   }
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
	
</style>
</head>
<body class="hold-transition login-page" >
<header>
        <nav>
            <div class="logo"><a href="landing.php">Cargo Master</a></div>
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
<div class="container" >
  <form action="" id="login-form">
    <div class="row">
      <h2 style="text-align:center">Login with Social Media or Manually</h2>
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col">
        <a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>
        <a href="#" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google
        </a>
      </div>

     <div class="col">
    <div class="hide-md-lg">
        <p>Or sign in manually:</p>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" name="email" id="email" required placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="Login">

    <p class="registration-link"><a href="customer_registation.php">Not A Member?</a></p>
</div>
      
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="#" style="color:white" class="btn"></a>
    </div>
    <div class="col">
      <a href="forgot.php" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>

<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php'; ?>
