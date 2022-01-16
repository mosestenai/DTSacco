<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php

session_start();
require 'config.php';

//checking if the user has entered both the username and password
 if (isset($_POST['login_user'])) {
  $username = ($_POST['username']);
  $password = ($_POST['password']);
	//displaying an error message when a fied is empty
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
//checking in the database if the username and paaword exists
  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
	$query2 = "SELECT * FROM admin WHERE username='$username'";
  	$results = $db->query($query);
	$results2 = $db->query($query2);
	//logging in the user if the credentials are found in the database
  	if ($results->rowCount() == 1) {
	$user=$results->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
	if($user->status == 'blocked'){echo '<h1>YOUR ACCOUNT WAS BLOCKED</h1>';}else{
  	  $_SESSION['username'] = $username;  	 
  	  header('location: book.php');
	}
	}
  	}
	if ($results2->rowCount() == 1) {
	$user=$results2->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
		if($user->status == 'blocked'){echo '<h1>YOUR ACCOUNT WAS BLOCKED</h1>';}else{
	  $_SESSION['username']=$username;
  	  header('location: admin.php');
  	}
	}
	}
	
  //displaying an error message if there password of username wrongly entered 
	else {
  		array_push($errors, "Wrong username/password");
  	}
  }
 }
 

 //signup
 if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $phone = ($_POST['phone']);
    $idno = ($_POST['idno']);
    $password_1 = ($_POST['password_1']);
    $password_2 =($_POST['password_2']);

     // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if(empty($phone)){ array_push($errors, "Phone number is required");}
    if(empty($idno)){ array_push($errors,"id number is required");}
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "Passwords do not match");
    }
    
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = $db->query($user_check_query);
    $user=$result->fetch(PDO::FETCH_OBJ);
    
   
    if ($user) { // if user exists
      if ($user->username == $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user->email == $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
       $usertable = str_replace(' ','',$username);
        $query = "INSERT INTO users (username, email, password,status,phone,idno) 
                  VALUES('$username', '$email', '$password','OPEN','$phone','$idno')";
        $db->query($query);
        $_SESSION['username'] = $username;
        header('location: book.php');
    }
  }
  

  //register bus
  if (isset($_POST['register_bus'])) {
    // receive all input values from the form
    $to = ($_POST['to']);
    $from = ($_POST['from']);
    $date = ($_POST['date']);
    $price = $_POST['price'];
    $capacity =($_POST['capacity']);
    $carregno =($_POST['carregno']);

     // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if ($to == 'To') { array_push($errors, "Destination is required"); }
    if ($from == 'From') { array_push($errors, "Departure city required"); }
    if (empty($capacity)) { array_push($errors, "Bus capacity is required"); }
    if (empty($date)) { array_push($errors, "Departure date is required"); }
    if (empty($price)) { array_push($errors, "Price is required"); }
    if (empty($carregno)) { array_push($errors, "Bus registration is required"); }
    
    
  
    // first check the database to make sure 
    // a bus does not already exist with the same registration number 
    $user_check_query = "SELECT * FROM buses WHERE carregno='$carregno' LIMIT 1";
    $result = $db->query($user_check_query);
    $user=$result->fetch(PDO::FETCH_OBJ);
    
   
    if ($user) { // if bus exists
      if ($user->carregno == $carregno) {
        array_push($errors, "Bus is already registered");
      }
  

    }
  
    // Finally, register bus if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO buses (tod, fromd, capacity,date,price,carregno) 
                  VALUES('$to', '$from', '$capacity','$date','$price','$carregno')";
        $db->query($query);
        array_push($errors, "Bus registration successfull");
       
    }
  }

?>