<?php
$id= $_GET['id'];
require 'config.php';
$sql= "SELECT * FROM users WHERE id='$id'";
$results = $db->query($sql) or die($db->error);
if($results= $db->query($sql) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){

if ($row->status == 'blocked'){
$query="UPDATE users SET status='OPEN' WHERE id='$id' ";
$db->query($query);
header('location: block.php');
}
else if($row->status == 'OPEN'){
$query="UPDATE users SET status='blocked' WHERE id='$id' ";
$db->query($query);
header('location: block.php');
}
else{
$fg = 	"UPDATE users SET status='blocked' WHERE id='$id' ";
$db->query($fg);
header('location: block.php');
} 
}}
?>