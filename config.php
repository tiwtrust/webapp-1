<?php

require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '820301954003-qnfbg5178e6h6sc3fdmg1fog3euqt0j2.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/webapp/welcome.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "course_db";

$conn = mysqli_connect($hostname, $username, $password, $database);
