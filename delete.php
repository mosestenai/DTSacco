 <?php error_reporting (E_ALL ^ E_NOTICE);?>
 <?php
 require 'config.php';
  
  $id= $_GET['id'];
  $fg= $_SESSION['name'];
   $query= "DELETE FROM $fg WHERE id = '$id'";
   $db->query($query) or die($db->error);
   header('location: messages.php');
  ?>