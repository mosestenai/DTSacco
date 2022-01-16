<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';

  $json = file_get_contents('php://input');
  $data = json_decode($json);

  
  $username = $data->username;
  $password= $data->password;
  $email= $data->email;
  $location=$data->location;
  $plocation=$data->plocation;
  $phone= $data->phone;
  
  $url = "https://eazistey.co.ke/images/applogo.png";

  if (
    empty($username) or empty($password)  or empty($location) or  empty($phone)
  ) {
    //error response code if any field is empty
    echo json_encode(array(
      'error' => "FILL ALL FIELDS"
    ));
  } else {
    $ppassword= password_hash($password,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
    $sql = "INSERT INTO mechanics (username,password,email,location,plocation,phone)
      VALUES('$username','$ppassword','$email','$location','$plocation','$phone')";

    $db->query($sql);
    echo json_encode(array(
      'response' => "success"
    ));


  
}
