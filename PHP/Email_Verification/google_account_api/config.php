<?php
session_start();

//Include Google Client Library for php autoload file
require_once 'vendor/autoload.php';

//Make object of Google api client for call google api
$google_client = new Google_Client();

//set the OAuth 2.0 client id 
$google_client->setClientId('489024323653-e4p3cj88fn26820rb34v8vjigqbdhhi0.apps.googleusercontent.com');

//set the OAuth 2.0 secret key 
$google_client->setClientSecret('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');

//set the OAuth 2.0 redirect url 
$google_client->setRedirectUri('http://localhost/PROJECTS%20(PHP)/Email_Verification/google_account_api/index.php');

//to get email and profile
$google_client->addScope('email');

$google_client->addScope('profile');

?>