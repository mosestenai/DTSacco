<?php 
  session_start(); 

  
?>
<!DOCTYPE html>
<html>
<head>
  <title>http://DTSacco.com/all</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php
require 'config.php';


    // receive all input values from the form
    $to = ($_GET['to']);
    $from = ($_GET['from']);
    $date = ($_GET['date']);
    

     // form validation: ensure that the form is correctly filled ...

    $query = "SELECT * FROM buses WHERE tod='$to' AND fromd='$from' AND date='$date'";
    $result = $db->query($query);
  if ($result->rowCount() > 0){
  if ($result= $db->query($query)) {

 // while ($row = $result->fetch_assoc()){
 while($row = $result->fetch(PDO::FETCH_OBJ)){
    ?>
<div class="hoji">
 <p align="middle">
 <font color="black">
To: <?php echo $row->tod;?><br>
From: <?php echo $row->fromd;?><br>
Price:  ksh <?php echo $row->price;?><br>
Departure date: <?php echo $row->date;?><br>
<?php echo $row->capacity;?> seats left<br>
Car registration number :<?php echo $row->carregno;?><br><br>
 </font>
 <!--Rating:<font color="blue">&#9734;&#9734;&#9734;&#9734;</font>-->
 <div class="nav-link">
 <a href=bookbus.php?id=<?php echo $row->id;?>>Book</a></div>
 </p>
 </div>
    <?php

 }}}else{
    echo "Sorry! There were no results found.";
 }

?>
</body>
</html>