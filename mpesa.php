<?php error_reporting (E_ALL ^ E_NOTICE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>receipt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

session_start();
require 'config.php';

//checking if the user has entered both the username and password
 if (isset($_POST['book'])) {

    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $idno = $_POST['idno'];
    $username = $_POST['username'];

    $query = "SELECT * FROM buses WHERE id='$id';";
    $result = $db->query($query);
  if ($result->rowCount() > 0){
  if ($result= $db->query($query)) {
 while($row = $result->fetch(PDO::FETCH_OBJ)){
?>
<h1 align="middle">Mybus Receipt</h1>
<br><br>
<p align="middle">
    <b>Name:</b> <?php echo $username; ?><br>
    <b>Phone number:</b> <?php echo $phone; ?><br>
    <b>Id number:</b> <?php echo $idno; ?><br>
    <b>Bus Registration:</b> <?php echo $row->carregno; ?><br>
    <b>From: </b><?php echo $row->fromd; ?><br>
    <b>To: </b><?php echo $row->tod; ?><br>
    <b>Departure date:</b> <?php echo $row->date; ?><br>
    <b>Price:</b> ksh <?php echo $row->price; ?><br>
    <br>
    Processing payment....An mpesa stk push has been sent to the phone number above<br>
</p>
<?php
$phoneNumber = $phone;
//reduce bus remaining seats by one
$capacity = $row->capacity-1;
  $gg= substr($phoneNumber, 0, 4);
  //if($gg != '2547'){echo '<h2 align="middle">You must begin with 254</h2>';}
  if (strlen($phoneNumber) < 12) {echo '<h2 align="middle">Invalid phone number</h2>';}
  else {
  $amountt = $row->price;
  $amount = (int)$amountt;

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
//$credentials = base64_encode('UrsGc9lFwXGkkhALW6v2mOdJ3pJpAWBD:yLvuma0CU4YOPD0w');
$credentials = base64_encode('tiYhiP7nH1A1vhZn3IjmevWunfGWZpGg:KFIPQo6INJ31afWi');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curl_response = curl_exec($curl);

$responce = json_decode($curl_response)->access_token;
 //dd($responce["access_token"]);
 //dd($responce->access_token);
 $accessToken = $responce; // access token here


//mpesa user credentials
$mpesaOnlineShortcode = "174379";
$BusinessShortCode = $mpesaOnlineShortcode;
$partyA = $phoneNumber;
$partyB = $BusinessShortCode;
$phoneNumber = $partyA;
$mpesaOnlinePasskey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
date_default_timezone_set('Africa/Nairobi');
$timestamp =  date('YmdHis');
$dataToEncode = $BusinessShortCode.$mpesaOnlinePasskey.$timestamp;
//dd($dataToEncode);
$password = base64_encode($dataToEncode);
//dd($password);

//payment request to safaricom

$url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$accessToken)); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $password,
  'Timestamp' => $timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $amount,
  'PartyA' => $partyA,
  'PartyB' => $partyB,
  'PhoneNumber' => $phoneNumber,
  'CallBackURL' => 'https://eazistey.co.ke/troj/confirmation.php?token=Mk087308',
  'AccountReference' => 'MYBUS',
  'TransactionDesc' => 'Paying fare for mybus'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
// print_r($curl_response);
$data = json_decode($curl_response);
$response = $data->ResponseCode;
//return($curl_response);
$df= $curl_response;
if($response == 0){
    $queryt= "UPDATE buses set capacity='$capacity'";
    $db->query($queryt);
  echo '
  <p align="middle"><img src="images/tick.png" width="330" height="400"><br>
    Check your phone to complete the payment</p>';
}else{
  echo '
  <p align="middle"><img src="images/cancel.png" width="330" height="400"><br>
    There was an error processing you request try again later</p>';
}



}
?>
<?php

 }}}
 }
 ?>

</body>
</html>