<?php
include 'db_connect.php';

if ($_GET['action'] == 'get_price') {
    // Fetch price from the master table based on provided parameters
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $length = $_POST['length'];
    $width = $_POST['width'];

    // Implement your logic to fetch the price from the master table
    $price = fetchClosestPriceFromMasterTable($weight, $height, $length, $width);

    // Return the calculated price
    echo $price;
}

function fetchClosestPriceFromMasterTable($weight, $height, $length, $width) {
    global $conn; // Assuming $conn is your database connection object

    // Sanitize input to prevent SQL injection
    $weight = mysqli_real_escape_string($conn, $weight);
    $height = mysqli_real_escape_string($conn, $height);
    $length = mysqli_real_escape_string($conn, $length);
    $width = mysqli_real_escape_string($conn, $width);

    // Query to fetch the closest match from the master table
    $query = "SELECT amount
              FROM prices
              WHERE weight_from <= ? AND weight_to >= ?
                AND height_from <= ? AND height_to >= ?
                AND length_from <= ? AND length_to >= ?
                AND width_from <= ? AND width_to >= ?
              ORDER BY amount ASC
              LIMIT 1";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("dddddddd", $weight, $weight, $height, $height, $length, $length, $width, $width);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $stmt->bind_result($amount);

        // Fetch the result
        $stmt->fetch();

        // Close the statement
        $stmt->close();

        if ($amount !== null) {
            // Return the amount from the master table
            return $amount;
        } else {
            // Handle case when no matching record is found
            return 'No matching record found';
        }
    } else {
        // Handle query preparation error
        return 'Error preparing statement: ' . $conn->error;
    }
}
?>
