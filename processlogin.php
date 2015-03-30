
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

	session_start(); // Starting Session
ParseClient::initialize( $app_id, $rest_key, $master_key );




	$error=''; // Variable To Store Error Message
	$user;
	if (isset($_POST['submit'])) 
	{
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			$error = "Username or Password is invalid";
		}
		else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			try {
			  $user = ParseUser::logIn($username, $password);
			  // Do stuff after successful login.
			} catch (ParseException $error) {
			  $error = "No user";
			}
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter


			if (isset($user)) 
			{
				$_SESSION['theuser'] = $user;
				$_SESSION['login_user']=$user->get('username'); // Initializing Session
				header("location: index.php"); // Redirecting To Other Page
			} 
			else 
			{
				
				$error = "Username or Password is invalid";
			}

		}
	}
?>