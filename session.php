<?php
define( 'PARSE_SDK_DIR', './Parse/' );

// include Parse SDK autoloader
require 'autoload.php';

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

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];



$currentUser = ParseUser::getCurrentUser();
var_dump(isset($currentUser));  

$login_session =$user_check;
$thelogin = $_SESSION['theuser'];
//var_dump($thelogin);
//var_dump(isset($thelogin));  
if(!isset($thelogin)){

header('Location: index.php'); // Redirecting To Home Page
}
?>