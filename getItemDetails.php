
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

/*
if(isset($_POST['update']))
{
	
$query = new ParseQuery("GameScore");
try {
  $query->equalTo("objectId", $theId);
  $query->set("title",  "ww");

  // The object was retrieved successfully.
} catch (ParseException $ex) {
  // The object was not retrieved successfully.
  // error is a ParseException with an error code and message.
}	
	$query->save();


 


}
*/




echo 'Hello ' . htmlspecialchars($_GET["id"]) . '!';

$theId = $_GET["id"];


$query = new ParseQuery("Inventory");
$query->equalTo("objectId", $theId);
$query->ascending("title");
$object = $query->first();






  //print_r($object);
            ?>
        <form action = "" method = "post">
            Barcode: <input name="barcode" type="text" value="<?php echo( htmlspecialchars( $object->get('barcode')) ); ?> "  disabled />
			<br>
            Title: <input name="titleBox" type="text" value="<?php echo( htmlspecialchars( $object->get('title')) ); ?>" />
			<br>
			Description: <input name="descBox" type="text" value="<?php echo( htmlspecialchars( $object->get('description')) ); ?>" />
			<br>
			Category: <input name="cateBox" type="text" value="<?php echo( htmlspecialchars( $object->get('category')) ); ?>" />
			<br>
			Image: <img src="<?php echo ($object->get('image'))?>" width="100" height="150" alt="Nba">
			<br>
			<input name="update" type = "submit" value = "Update">
        </form>

<?php


/*
if(isset($_POST['update']))
{

}
*/

if (isset($_REQUEST['update'])) {
$test = $_POST['titleBox'];
$test2 = $_POST['descBox'];
$test3 = $_POST['cateBox'];

$object->set("title",$test);
$object->set("description",$test2);
$object->set("category",$test3);

$object->save();
header("Location: home.php");
}

function insert(){
	

}




?>

