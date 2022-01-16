<?php 
  session_start(); 

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book bus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="newbody">
    <?php $username= $_SESSION['username'];?>
    <form method="post" class="newform" action="mpesa.php">
    <div class="input-group">
  		<label>Full name</label>
  		<input type="text" name="username" value="<?php echo $username;?>">
  	</div>
      <?php 
      require 'config.php';
      $username=$_SESSION['username'];
      $id= $_GET['id'];
      $query = "SELECT * FROM users WHERE username='$username'";
      $result = $db->query($query);
    if ($result->rowCount() > 0){
    if ($result= $db->query($query)) {
  
   // while ($row = $result->fetch_assoc()){
   while($row = $result->fetch(PDO::FETCH_OBJ)){


      
      ?>
  	<div class="input-group">
  		<label>Mobile number</label>
  		<input type="text" name="phone"  value="<?php echo $row->phone;?>"><br><br>
          <label>id number</label>
  		<input type="text" name="idno"  value="<?php echo $row->idno;?>">
          <input type="hidden" name="id"  value="<?php echo $id;?>">
	  </div>
	  <br>
      <?php
   }}}
      ?>
	  <p align="middle"><button type="submit" class="loginbtm" name="book" >BOOK >></button></p>	
  	<br>
    </form>
</body>
</html>