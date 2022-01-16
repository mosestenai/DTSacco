<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  ?>
<html>
<head><title>
admin</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="60">
</head>
<body>
<br><br>
<header class="navheader">
<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white">jghjfhjfj</font></p>
<nav class="navburger">
   <br><br>
   <ul>
   <li>
	    <a href="events.php"><h2>POST AN EVENT</h2></a>
		<br><br><br><br>
	</li>
	 <li>
	    <a href="adminmessage.php"><h2>MESSAGES</h2></a>
		<br><br><br><br>
	</li>
	 <li>

	    <a href="index.php"><h2>LOGOUT</h2></a>
		<br><br>
	</li>
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label>
</header><br><br><br><br><br><br>
<div class="fieldset-contact" align="middle">
<br><br><br>
<h1 align="middle">DASHBOARD</h1><br><br><br>
<!--
<a href="addadmin.php"><button class="btn">Add an Admin</button></a>
<br><br><br>-->
<a href="registerbus.php"><button class="btn">Register a bus</button></a>
<br /><br><br>
<a href="hotell.php"><button class="btn">Transactions</button></a>
<br><br><br>
<!--
<a href="addbar.php"><button class="btn">Add a bar/club</button></a>
<br><br><br>>
<a href="blockdelegate.php"><button class="btn">Block delegate</button></a>
<br><br><br>--->
<a href="deleteacc.php"><button class="btn">Delete Account</button></a>
<br><br><br>
<a href="users.php"><button class="btn">View users</button></a>
<br><br><br>
<a href="block.php"><button class="btn">Block a user</button></a>
<br><br><br>
<!--
<a href="adddelegate.php"><button class="btn">Add a delegate</button></a>
<br><br><br>
<a href="sendmail.php"><button class="btn">Send Mail</button></a>
-->
</div>


</body>
</html>