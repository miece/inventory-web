<?php




define( 'PARSE_SDK_DIR', './Parse/' );

require 'autoload.php'; // Includes Login Script

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

$theId = $_GET["id"];

// the query
$query = new ParseQuery("Inventory");
$query->equalTo("objectId", $theId);
$query->ascending("title");
$object = $query->first();

?>


<!DOCTYPE html>
<html>
<head>

<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>


<title>Item Details</title>
<link rel="stylesheet" href="css/login.css">

<style>
#login{
  width:600px;
}

textarea {
   resize: none;
  width:92%;
  background:#fff;
  margin-bottom:0%;
  border:1px solid #ccc;
  padding:4%;
  font-family:'Open Sans',sans-serif;
  font-size:95%;
  color:#555;
}

input[type="button"]#delete { 

background:#1f8dd6;

}
input[type="submit"]#delete:hover{
  background:#FF0000;
}
</style>


</head>
<body>
<span onClick="window.location='index.php';" class="button" id="toggle-login">Home</span>
<div id="login">
  <div id="triangle"></div>
  <h1>Item Details</h1>
<form action="" method="post">
<label>Title :</label>
<input name="titleBox" type="text" value="<?php echo( htmlspecialchars( $object->get('title')) ); ?>" />
<label>Description :</label>
<textarea name="descBox" cols = "67" rows="2"><?php echo( htmlspecialchars( $object->get('description')) ); ?></textarea>
<label>Category :</label>
<input name="cateBox" type="text" value="<?php echo( htmlspecialchars( $object->get('category')) ); ?>" />
<label>Author / Artist :</label>
<input name="authorBox" type="text" value="<?php echo( htmlspecialchars( $object->get('category')) ); ?>" />
<center>
<img src="<?php echo ($object->get('image'))?>" width="150" height="200" alt="Nba"></center>

<input name="update" type = "submit" value = "Update">
<hr><br>
<input name="delete" id="delete" type = "submit" value = "Delete" onClick="return confirmDelete()">

</form>
</div>
    <div class="login-help">
      <p><a href="index2.php">Go back to inventory</a>.</p>
    </div>
</body>
</html>


<?php
if (isset($_REQUEST['update'])) {
$test = $_POST['titleBox'];
$test2 = $_POST['descBox'];
$test3 = $_POST['cateBox'];

$object->set("title",$test);
$object->set("description",$test2);
$object->set("category",$test3);

$object->save();

header("Location: index2.php");
}
?>


<?php

if (isset($_REQUEST['delete'])) {

$object->destroy();
echo "<script type='text/javascript'>alert('Deleted');</script>";
header("Location: index2.php");

}


?>

<script>    
/*
function confirmDelete(url) {
    if (confirm("Are you sure you want to delete this?")) {
		<?php 

		?>
		
		
    } else {
        alert("Cancelled");
    }       
}
*/
</script>