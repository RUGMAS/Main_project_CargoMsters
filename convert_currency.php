<?php
include 'db_connect.php';
if(isset($_POST['currency_code']) && isset($_POST['total_amount'])){
    $to_branch_id = $_POST['currency_code'];
  
    $country = $conn->query("SELECT * FROM country WHERE country_id = '$to_branch_id'");
    $country_data = $country->fetch_assoc();
    $currency_code = $country_data['currency_code'];

    $endpoint = 'convert';
    $access_key = 'API_KEY'; // Replace with your actual API key

    $from = 'INR';
    $to = $currency_code;
    $amount = $_POST['total_amount'];

    $ch = curl_init('https://api.exchangeratesapi.io/v1/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    //var_dump($json); // Debugging: Check the raw JSON response
    curl_close($ch);

    $conversionResult = json_decode($json, true);
    //var_dump($conversionResult); // Debugging: Check the decoded JSON array

    if(isset($conversionResult['result'])){
        $converted_amount = $conversionResult['result'];
        echo $converted_amount;
    } else {
        echo 'Conversion result not available.';
    }
} else {
    echo 'Invalid POST data.';
}
?>