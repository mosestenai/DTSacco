<?php 
 session_start(); 
include('send_linkk.php') ?>
<html>	
	<title>http://DTSacco.com/resetpass</title>
<link rel="stylesheet" type="text/css" href="style.css">
  <body class="newbody">
  <br>
  <header class="navheader">

<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white"> </font></p>
<nav class="navburger">
   <br>
   <ul>
     <li>
	    <a href="all.php">Services</a>
	</li>	
	 <li>
	    <a href="About us.php">About us</a>
	</li>
	 <li>
	    <a href="CONTACT.php">Contact</a>
	</li>
	 <li>
	    <a href="terms.php">Terms and Conditions</a>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label>
<font color="white">ggggghhghgghghghhggghghggghghgghgghghghghghghghghghghghghghghghghghhghghgh</font>
<b>DTSacco</b></header><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
	require 'config.php';
	  if (isset($_GET["reset"])){//checks the url for a reset GET parameter
	   if ($_GET["reset"] == "success"){
	    echo '<h3 align="middle"><font color="red">Success!!Check out your email</font></h3>';
	   }
	  }
	  ?>
    <form method="post" class="newform">
	<?php //include('errors2.php'); ?>
	<h2> Forgot 
password?</h2><br>
	  <p><font color = "black">Enter your email address you used to create your<br>
account and we will email you a link to reset your password</font></p><br><br>

      <div class="input-group">
	  <input type="text" name="email" placeholder="USER EMAIL"></div>
	  <br>
	  <p align="middle"><button type="submit" class="loginbtm" name="submit_email" >SEND LINK ></button></p>
	  <br><br>
	  <p align="middle">Don't have an account?Tap link below to create one<br>
	  <a href="sign up.php">create a new account</a></p>
	  <br><br>
	
    </form>
	
  </body> 
</html>
