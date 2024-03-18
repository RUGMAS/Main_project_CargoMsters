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
                    $query = "SELECT a.*, r.rating, r.review, c.cus_name as posted_by FROM associatives a 
                                LEFT JOIN rating r ON a.cus_logid = r.rate_associative 
                                LEFT JOIN customer c ON r.rate_userid = c.cus_logid";

                    // Add condition based on user's login type
                    if($_SESSION['login_type'] == 4 ){
                        if(empty($where))
                            $where = " where ";
                        else
                            $where .= " and ";
                        $where .= " (rate_associative= {$_SESSION['login_id']}) ";
                        $query .= $where;
                    }
                  
                    $result = mysqli_query($conn, $query);
                    $associative_reviews = array();
                    while($row = mysqli_fetch_assoc($result)) {
                        $associative_id = $row["cus_logid"];
                        if (!isset($associative_reviews[$associative_id])) {
                            $associative_reviews[$associative_id] = array(
                                "name" => $row["cus_name"],
                                "address" => $row["cus_address"],
                                "rating" => $row["rating"],
                                "reviews" => array()
                            );
                        }
                        $associative_reviews[$associative_id]["reviews"][] = array(
                            "review" => $row["review"],
                            "posted_by" => $row["posted_by"]
                        );
                    }

                    $i = 1;
                    foreach ($associative_reviews as $associative_id => $data) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td><b><?php echo $data["name"];?></b></td>
                        <td><b><?php echo $data["address"];?></b></td>
                        <td><b> <div class="star-rating" data-rating="<?php echo $data["rating"]; ?>">
                            <?php
                            // Display the star rating based on the rating
                            for ($j = 1; $j <= 5; $j++) {
                                if ($j <= $data["rating"]) {
                                    echo '<span class="star filled"></span>';
                                } else {
                                    echo '<span class="star"></span>';
                                }
                            }
                            ?>
                        </div></b></td>
                        <td>
                            <ul>
                                <?php foreach ($data["reviews"] as $review) { ?>
                                    <li><?php echo $review["review"]; ?> - <?php echo $review["posted_by"]; ?></li>
                                <?php } ?>
                            </ul>
                        </td>
                      
                       
                    </tr>
                    <?php } ?>
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