<?php

include('processreset.php'); // Includes Login Script

if(isset($_SESSION['successReset'])){



}

?>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="js/alertify.min.js"></script>



<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/alertify.core.css" />

<span onClick="window.location='index.php';" class="button" id="toggle-login">Home</span>



<div id="login">
  <div id="triangle"></div>
  <h1>Reset Password</h1>
<form action="" method="post">
    <input type="email" placeholder="Email" name="emailaddy" />
    <input type="submit" name='submit' value="Send reset instructions" />
	<span  style="color:red"><?php echo $error; ?></span>

  </form>
  
</div>





