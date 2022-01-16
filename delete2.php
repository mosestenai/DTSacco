<?php
$id= $_GET['id'];
require 'config.php';
$sql3 = "SELECT * FROM users WHERE id='$id'";
$results=$db->query($sql3) or die($db->error);
if($results->rowCount() > 0){
if($results=$db->query($sql3) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){
$sql= "DELETE FROM users WHERE id='$id'";
$db->query($sql) or die($db->error);
header('location: deleteacc.php');
}}}

?>