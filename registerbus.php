<?php 
  session_start(); 

  
?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>http://DTSacco.com/addbus</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="newbody">
<header class="navheader">

<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white"> </font></p>
<nav class="navburger">
   <br>
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
<font color="white">ggggghhghgghghghhggghghggghghgghgghghghghghghghghghghghghghghghghghhghghgh</font>
<b>DT Sacco</b></header><br><br><r><br><bbr><br><br><br><br><br><br><br>
<form method="post" action="registerbus.php" class="newform">
<?php include('errors.php'); ?><br><br><?php
?><br>
<div class="select">
Select from city<br>
<select type="text" list="sort" name="from" ><datalist id="sort">
<option>From</option>
<option>NAKURU</option>
<option>NAIROBI</option>
<option>ELDORET</option>
<option>KITALE</option>
</datalist></select><br><br>
Select to city<br>
<select type="text" list="sort" name="to" ><datalist id="sort">
<option>To </option>
<option>NAKURU</option>
<option>NAIROBI</option>
<option>ELDORET</option>
<option>KITALE</option>
</datalist></select>
</div>
  	<div class="input-group">
        <label>Capacity</label>
  		<input type="number" name="capacity"><br><br>
          <label>Price</label>
  		<input type="text" name="price"><br><br>
          <label>Departure date</label>
  		<input type="date" name="date"><br><br>
          <label>Car registration</label>
  		<input type="text" name="carregno"><br><br>
	  </div>
	  <br>
	  <p align="middle"><button type="submit" class="loginbtm" name="register_bus" >SUBMIT >></button></p>	
  	<br>
	
	
  </form>
  
 
  </body>
  </html>
