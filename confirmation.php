<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';

if(!isset($_GET["token"])){
echo "Technical error";
exit();
}
if ($_GET["token"]!='Mk087308'){
echo "invalid authorisation";
}else{
if (!$request=file_get_contents('php://input')){
echo "invalid input";
exit();}
$json = file_get_contents('php://input');
echo $json;
$data = json_decode($json);

$transid = $data->TransID;
$transactiontype =$data->TransactionType;

$transtime = $data->TransTime;
$transamount = $data->TransAmount;
$businessshortcode = $data->BusinessShortCode;
$billrefno = $data->BillRefNumber;
$invoiceno =$data->InvoiceNumber;
$msisdn = $data->MSISDN;
$orgaccountbalance = $data->OrgAccountBalance;
$firstname = $data->FirstName;
$middlename = $data->MiddleName;
$lastname = $data->LastName;

$sql="INSERT INTO mpesa_payments
( TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,InvoiceNumber,MSISDN,
FirstName,MiddleName,LastName,OrgAccountBalance)  VALUES  ( '$transactiontype', '$transid', '$transtime', '$transamount', '$businessshortcode', 
'$billrefno', '$invoiceno', '$msisdn','$firstname', '$middlename', '$lastname', '$orgaccountbalance' )";

$db->query($sql) or die($db->error);
echo 
  '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
exit();
}
?>