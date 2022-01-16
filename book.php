<?php 
  session_start(); 

  
?>
<!DOCTYPE html>
<html>
<head>
  <title>http://DTSacco.com/book</title>
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
	    <a href="index.php"><h2>logout</h2></a>
		<br><br>
	</li>	
	 <li>
	    <a href="viewpost.php"><h2>Announcements</h2></a>
		<br><br>
	</li>
	 <li>
	    <a href="CONTACT.php"><h2>Contact us</h2></a>
		<br><br>
	</li>
	 
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label>
<font color="white">ggggghhghgghghghhggghghggghghgghgghghghghghghghghghghghghghghghghghhghghgh</font>
<img src="images/bus1.jpg" width="90" height="70"></header><br><br><r><br><bbr><br><br><br><br><br><br><br>
<form method="get" action="book.php" class="newform">
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
<br><br>
<div class="input-group2">
<label>Date</label>
<input type="date" name="date" placeholder="DATE" >

</div>
<p align="middle">
<button class="search" name="search">SEARCH BUSES</button></p>
<br>

  </form>
  <?php
  if (isset($_GET['search'])) {
      require 'config.php';
    // receive all input values from the form
    $to = ($_GET['to']);
    $from = ($_GET['from']);
    $date = ($_GET['date']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if ($to == 'To') { echo '<h3 align ="middle"><font color="red">Destination is required</font></h3>'; }
    if ($from == 'From') { echo '<h3 align ="middle"><font color="red">Departure city required</font></h3>'; }
    if (empty($date)) { echo '<h3 align ="middle"><font color="red">Departure date is required</font></h3>'; }
    else {
    header('location: display.php?to='.$to.'&from='.$from.'&date='.$date);
    }
  }

  ?>
  </body>
  </html>
