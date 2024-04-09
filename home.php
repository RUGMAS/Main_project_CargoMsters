<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
<style>
body {
            font-family: Arial, sans-serif;
            background-color: #e6f7ff; /* Light Blue-Green */
            background-image: url("images/viewpage.jpg");
            padding-top: 250px; /* Add padding to prevent content from being hidden by the fixed header */
            /* Add animation for the butterfly effect */
            animation: butterflyEffect 15s linear infinite;
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
	
</style>
<body class="hold-transition login-page" >
        <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM associatives")->num_rows; ?></h3>

                <p>Total Associatives</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM customer")->num_rows; ?></h3>

                <p>Total Customers</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>

                <p>Total Parcels</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <hr>
          <?php 
              $status_arr = array("Item Accepted by Courier","Collected","Shipped","In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull Delivery Attempt");
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>
</body>

<?php elseif($_SESSION['login_type'] == 3): ?>
<?php
include('./db_connect.php');
  ob_start();
 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$user_id = $_SESSION['login_id'];
   $associate_id = $_POST["associate_id"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    // Insert the data into the database
    $query = "INSERT INTO rating (rate_associative,rating,review,rate_userid) VALUES ('$associate_id', '$rating', '$review',$user_id)";
    $ex=mysqli_query($conn,$query);
    if($ex)
    {
        
    echo "<script>alert('Thank You ...');window.location.href='./index.php?page=home'</script>";

    }
    else{
        echo mysqli_error($conn);
    }
}
  


 
ob_end_flush();
 
?>


  <style>
    .welcome-card {
        font-family: Arial, sans-serif;
        background-color: #e6f7ff;
        background-image: url('images/viewpage.jpg');
        padding-top: 1500px;
        animation: butterflyEffect 15s linear infinite;
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
  /* Your existing styles here */
    .star-rating {
        display: inline-block;
        font-size: 24px;
        color: #ffd700; /* Set star color */
    }

    .star-rating .star {
        display: inline-block;
        width: 20px; /* Set star width */
        height: 20px; /* Set star height */
        margin-right: 5px;
        font-size: 20px; /* Set star font size */
        color: black; /* Set star color */
    }

    .star-rating .star.filled {
        color: #ffd700; /* Set filled star color */
    }
    
    .star-rating .star:before {
        content: '\2605'; /* Star symbol */
        margin-right: 5px;
    }

    .average-rating {
        font-size: 18px;
        color: #333;
        margin-top: 5px;
    }
</style>
<div id="reviewModal" class="modal col-md-6">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="reviewForm"  method="post">
            <input type="hidden" id="associate_id" name="associate_id" value="">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" class="form-control">
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
			<br>
            <label for="review">Review:</label>
            <textarea class="form-control" name="review" id="review" cols="30" rows="3"></textarea>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>



<div class="col-12 welcome-card">
    <div class="card" style="margin-top:-1500px">
        <div class="card-body">
            Welcome <?php echo $_SESSION['login_name'] ?>!
        </div>

        <br>
        <h5><u>Ratings</u></h5>
        <div class="row">
            <?php
            $user_id = $_SESSION['login_id'];
            $query = "SELECT a.*, AVG(r.rating) AS avg_rating FROM associatives a
                      INNER JOIN parcels p ON a.cus_logid = p.from_branch_id
                      LEFT JOIN rating r ON a.cus_logid = r.rate_associative
                      WHERE p.add_logid = $user_id
                      GROUP BY a.cus_logid";
            $result = mysqli_query($conn, $query);
			//var_dump($query);die();
			
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="small-box bg-light shadow-sm border">
                            <div class="inner">
                                <B>Associates</B>
                                <h4 class="title"><?php echo $row["cus_name"]; ?></h4>
                                <p class="description"><?php echo $row["cus_address"]; ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <div class="d-grid gap-2">
                                <div class="star-rating" data-rating="3.5">
                                    <?php
                                    // Display the star rating based on the average rating
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $row["avg_rating"]) {
                                            echo '<span class="star filled"></span>';
                                        } else {
                                            echo '<span class="star "></span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="average-rating"><?php echo number_format($row["avg_rating"], 1); ?>
								 &nbsp;&nbsp;&nbsp;&nbsp; <?php
                    // Check if the user has already rated the associate
                    $querys = "SELECT * FROM rating WHERE rate_userid = $user_id AND rate_associative = {$row['cus_logid']}";
                    $results = mysqli_query($conn, $querys);
                    if (mysqli_num_rows($results) == 0) {
                        // User has not rated the associate, show the "Click to Rate" button
                        echo '<span class="open-modal" data-associate-id="' . $row["cus_logid"] . '">Click to Rate</span>';
                    }
                    ?>
								</div>
								 
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
		
		 <h5><u>General Informations</u></h5>
		 <p>Express Services
Want to send important documents or small-to-medium sized parcels urgently? Our Express Service prioritises time-sensitivity and is ideal for meeting urgent delivery requirements. You can choose between our Premium and Standard express services based on your urgency and budget.

Express Standard
Our Express Standard service optimises the pick-up and drop-off timings to provide you with express delivery at reasonable cost. We transport your parcels safely via multi modal logistics.

Express Premium
Our Express Premium service is an ideal solution if you need parcels delivered within a very short timeframe. Since it is a premium service, we offer day-definite and time-definite services for urgent shipments. To meet our customers’ tighter delivery schedules, we leverage our collaboration with all major airlines to move your shipments at our fastest turnaround time.
		 
<br><br>
Ground Services
Our Ground Services are a suitable logistics solution for medium to large-sized shipments. We have a fleet of over 1500+ trucks providing multi-stop trucking. You can choose between our Standard and Premium options as per your time and cost requirements.

Ground Standard
Ground Standard is the most cost-effective solution for B2B customers who have a high volume of large-sized and less-than-truckload shipments. We leverage multi stop trucking to provide you with a cost efficient logistics solution.

Ground Premium
For B2B customers who have a high volume of medium or large-sized shipments, we use point-to-point trucking for the best ground transit times. Ground Premium offers our fastest ground turnaround time in the network, providing our customers with speed and cost effectiveness for their logistical needs.		 
		 </p>
    </div>
</div>
 <script>
     // Get the modal
    var modal = document.getElementById("reviewModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the symbol, open the modal
    var symbols = document.getElementsByClassName("open-modal");
    for (var i = 0; i < symbols.length; i++) {
        symbols[i].addEventListener('click', function() {
            var associateId = this.getAttribute("data-associate-id");
            document.getElementById("associate_id").value = associateId;
            modal.style.display = "block";
        });
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
 </script>

<?php else: ?>
<style>
.welcome-card {
    font-family: Arial, sans-serif;
    background-color: #e6f7ff;
    background-image: url('images/viewpage.jpg');
    padding-top: 1500px;
	
    animation: butterflyEffect 15s linear infinite;
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
</style>
	 <div class="col-12 welcome-card">
          <div class="card" style="margin-top:-1500px">
          	<div class="card-body" >
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
