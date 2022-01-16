<?php error_reporting (E_ALL ^ E_NOTICE);?><?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
$host="ec2-54-147-93-73.compute-1.amazonaws.com";
$user="yziycgdcklcmyt";
$password="d0811968be37a1ad9b56e897d05b354b6f42b8aff55250078bf320868d1a78ce";
$dbname="d2tgo9a5dup0j5";
$port="5432";
 
try{
$db = new PDO("pgsql:host=$host;dbname=$dbname;port=$port",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error)
{
$error->getMessage();
}

?>