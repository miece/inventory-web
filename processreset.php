<?php

define( 'PARSE_SDK_DIR', '../Parse/' );

// include Parse SDK autoloader
require '../autoload.php';

// Add the "use" declarations where you'll be using the classes
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

$app_id = "saIQWlbzHC5G90hwMY0FdjnuN2dQInrRGMwuCMjy";
$rest_key = "PeyjycWPb7GyEZTSNpN2vOgevIQXR8wiOAjXmYCO";
$master_key = "Ja4mVcTfYllb5ovc9PkizltJtEwXvS2yvAdNZqcw";


ParseClient::initialize( $app_id, $rest_key, $master_key );



session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	$user;
	$success='';
	if (isset($_POST['submit'])) 
	{
		if (empty($_POST['emailaddy'])) 
		{
			$error = "Email is invalid";
		}
		else
		{
			// Define $username and $password
			$email=$_POST['emailaddy'];
			
			try {
			  ParseUser::requestPasswordReset($email);
			  header("location: index.php"); // Redirecting To Other Page
				// Password reset request was sent successfully
				$success = True;
			} catch (ParseException $ex) {
			  // Password reset failed, check the exception message
			  $error = "Email not found";
			}





		}
	}
?>