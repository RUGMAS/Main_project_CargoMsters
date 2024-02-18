<?php
session_start();

require_once 'google-api-php-client-main/vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig('path_to_your_credentials_file.json');
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $oauth = new Google_Service_Oauth2($client);
    $user_info = $oauth->userinfo->get();

    // Handle user info as needed, e.g., save to database
    $_SESSION['user_email'] = $user_info->email;

    header('Location: index.php?page=home');
    exit();
} else {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
}
