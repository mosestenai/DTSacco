<?php
$id= $_GET['id'];
require 'config.php';
$sql= "SELECT * FROM admin WHERE id='$id'";
$results = $db->query($sql) or die($db->error);
if($results= $db->query($sql) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){

if ($row->statuss == 'blocked'){
$query="UPDATE admin SET status='OPEN' WHERE id='$id' ";
$db->query($query);
header('location: blockdelegate.php');
}
else if($row->statuss == 'OPEN'){
$query="UPDATE admin SET status='blocked' WHERE id='$id' ";
$db->query($query);
header('location: blockdelegate.php');
}
else{
$fg = 	"UPDATE admin SET status='blocked' WHERE id='$id' ";
$db->query($fg);
header('location: blockdelegate.php');
} 
}}
?>