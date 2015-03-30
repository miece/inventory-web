<?php

include('processlogin.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: index.php");


}
?>


<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<span onClick="window.location='index.php';" class="button" id="toggle-login">Home</span>
<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span  style="color:red"><?php echo $error; ?></span>
</form>
</div>
    <div class="login-help">
      <p>Forgot your password? <a href="password.php">Click here to reset it</a>.</p>
    </div>
</body>
</html>