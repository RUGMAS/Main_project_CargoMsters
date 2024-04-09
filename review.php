<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Associative Name</th>
						<th>Address</th>
						<th>Rating</th>
						<th>Review</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$query = "SELECT associatives.*, AVG(r.rating) AS avg_rating,r.review FROM associatives LEFT JOIN rating r ON associatives.cus_logid = r.rate_associative";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row["cus_name"];?></b></td>
						<td><b><?php echo $row["cus_address"];?></b></td>
						<td><b> <div class="star-rating" data-rating="3.5">
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
                                </div></b></td>
								<td><b><?php echo $row["review"];?></b></td>		
					
					</tr>	
					<?php  }  ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
    .star-rating {
    display: inline-block;
    font-size: 24px;
    color: #ffd700; /* Set star color */
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
  </style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    let starRating = document.querySelector(".star-rating");
    let averageRating = document.querySelector(".average-rating");
    
    // Get the average rating from the data-rating attribute
    let rating = parseFloat(starRating.getAttribute("data-rating"));
    
    // Round the rating to the nearest 0.5
    rating = Math.round(rating * 2) / 2;
    
    // Set the star rating
    starRating.style.setProperty("--rating", rating);
    
    // Set the average rating text
    averageRating.textContent = "Average rating: " + rating;
});
  </script>