<?php
?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
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
	    <a href="index.php"><h2>home</h2></a>
		<br><br>
	</li>	
	 <li>
	    <a href="login.php"><h2>Login</h2></a>
		<br><br>
	</li>
	 <li>
	    <a href="CONTACT.php"><h2>Contact</h2></a>
		<br><br>
	</li>
	 <li>
	    <a href="faqs.php"><h2>faq's</h2></a>
		<br><br>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label>
<font color="white">ggggghhghgghghghhggghghggghghgghgghghghghghghghghghghghghghghghghghhghghgh</font>
<b>DT Sacco</b></header><br><br><br><br><br><br><br><br><br>
<form method="post" class="newform">
<?php include('errors.php'); ?><br>
<!--<div class="select">
<select type="text" list="sort" name="gender" ><datalist id="sort">
<option>GENDER</option>
<option>MALE</option>
<option>FEMALE</option>
</datalist></select><font color="white">hgfhdfgdgdfg</font>
<select type="text" list="sort" name="level" ><datalist id="sort">
<option>LEVEL </option>
<option>FIRST YEAR</option>
<option>SECOND YEAR</option>
<option>THIRD YEAR</option>
<option>FORTH YEAR</option>
</datalist></select>
<select type="text" list="sort" name="course" ><datalist id="sort">
<option>COURSE </option>
<option>ECON STAT</option>
<option>COMP SCIENCE</option>
<option>BICT</option>
<option>ECON SOCI</option>
</datalist></select></div>--><br>
<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;?>">
</div><br>
<div class="input-group">
<label>Email</label>
<input type="email" name="email" value="<?php echo $email;?>">
<br><br>
<label>Phone number</label>
<input type="text" name="phone" ><br><br>
<label>id number</label>
<input type="number" name="idno" ><br><br>
</div><br>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1">
</div><br>
<div class="input-group">
<label>Confirm password</label>
<input type="password" name="password_2">
</div>
<br><br>
By continuing, you agree to DTSacco's <a href="terms.php"><font color="navy">Terms of service </font></a>and <a href="terms.php"><font color="navy">Privacy Policy.</font></a>

<p align="middle"><button type="submit" class="loginbtm" name="reg_user">PROCEED</button></p>

<p>
Have an account?<a href="login.php">Log in</a>
</p><br>


</form>

</body>
</html>