<?php

include('processlogin.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){

$log = True;
$user = $_SESSION['theuser'];
}
else{
	header("location: index.php");
$log = False;
	
	
}



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

// Init parse: app_id, rest_key, master_key
//ParseClient::initialize('SCg17O8f0uFlm1DK3BTraClFMsTNiGUa8n2SCTAL', 'erWKvEaj0E8zG7Z6XVrnYjJXRFY0kV7uFZglEqcK', 'Ff1K5xELw3a8Wmh2iZOkcHKnaodGRdaRZHmn4Vd4');
$app_id = "saIQWlbzHC5G90hwMY0FdjnuN2dQInrRGMwuCMjy";
$rest_key = "PeyjycWPb7GyEZTSNpN2vOgevIQXR8wiOAjXmYCO";
$master_key = "Ja4mVcTfYllb5ovc9PkizltJtEwXvS2yvAdNZqcw";


ParseClient::initialize( $app_id, $rest_key, $master_key );
	
$currentUser = ParseUser::getCurrentUser();

$query = new ParseQuery("Inventory");
$query->ascending("title");
$results = $query->find();

$currentUserID = $currentUser->getObjectId();

$array = array(
  1=>"My first option",
  2=> "My second option"
);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive product landing page.">

    <title>Landing Page &ndash; Layout Examples &ndash; Pure</title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">



<!--[if lte IE 8]>
  
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
  
<![endif]-->
<!--[if gt IE 8]><!-->
  
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
  
<!--<![endif]-->



<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">



  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/marketing.css">
    <!--<![endif]-->
  


    <style>
li.one a {
  text-decoration: none;
  color: #000;
  display: block;
  width: 1800px;
 font-weight: bold;
 line-height: 0.8em;
 
  -webkit-transition: font-size 0.3s ease, background-color 0.3s ease;
  -moz-transition: font-size 0.3s ease, background-color 0.3s ease;
  -o-transition: font-size 0.3s ease, background-color 0.3s ease;
  -ms-transition: font-size 0.3s ease, background-color 0.3s ease;
  transition: font-size 0.3s ease, background-color 0.3s ease;
}
 
li.one a:hover {
  font-size: 25px;
  background: #1f8dd6;
  color:white;

}

.numbers{
	  color:white;
	  margin-left: 25px;
}
    </style>

</head>
<body>









<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">My Inventory</a>

				<ul class="pure-menu-list">

            <li class="pure-menu-item"><a href="index.php" class="pure-menu-link">Home</a></li>
            <li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
        </ul>
			<select>
				<?php foreach($results as $key) { ?>
				<option value="<?php echo $key->get('title') ?>"><?php echo $key->get('category') ?></option>
				<?php }?>
			</select>
					<?phpecho count($results);?>
    </div>
</div>

<div class="splash-container">

		<BR>
				
		<?php
	$count = 0;
        ini_set('display_errors','On');
        error_reporting(E_ALL);

        // Include the pagination class
        include 'pagination.class.php';
        
		
		for ($i = 0; $i < count($results); $i++) {
			  $objTitle[] = $results[$i]->get('title');
		}
		echo "FG";
		echo count($results);
		
        // If we have an array with items
        if (count($results)) {
			
          // Create the pagination object
          $pagination = new pagination($results, (isset($_GET['page']) ? $_GET['page'] : 1), 14);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator(' | ');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
            echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
            // Loop through all the items in the array
			?><BR><BR><BR><?php
			
            foreach ($productPages as $productArray) {
              // Show the information about the item
			  ?>   
<!--hr-->			  
			<form>
			<div >
			  
			<ul style="color:white" >
			<?php 
			if($currentUserID == $productArray->get('author')->getObjectId())
			{
				$count = $count + 1;
				if($count>0){
			?>
			<br>
				<li class = "one"><a class="abc" href = "itemDetails.php?id=<?php echo $productArray->getObjectId(); ?>"><?php echo $productArray->get('title'); ?></a></li></hr>
			<?php
				}
						
			}

			?>
		    </ul>
	
			</div>
			
		  </form>
		  
		  
		  <?php
              //echo '<p><b>'.$productArray->get('title').'</p>';
            }
			?> <!--hr--><?php
            // print out the page numbers beneath the results
			echo "\x20\x20\x20"; 
            echo $pageNumbers;
			
          }
		  
        }


      ?>


</div>


</body>
</html>



			<?php
			/*
			$currentUser = ParseUser::getCurrentUser();
$user = $_SESSION['theuser'];
//echo $user->getObjectId();
$query2 = new ParseQuery("Inventory");

$query2->ascending("title");

$results2 = $query->find();

// the item user
//var_dump($results2[0]->get('author')->getObjectId());
// user id
//var_dump($currentUser->getObjectId());

*/

?>