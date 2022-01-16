<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
$json = file_get_contents('php://input');
$data = json_decode($json);

$search = $data->about;

    //fetching all records in the database hostel table
    if(empty($search)){
    $query = "SELECT * FROM mechanics ";
    $result = $db->query($query);
    if ($result->rowCount() > 0) {
        if ($result = $db->query($query)) {
            $posts_arr = array();
            $posts_arr = array();
            while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                $post_item = array(
                    'mechanic' => $user->username,
                    'location' => $user->location.':->'.$user->plocation,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'url'=> "https://mybusses.herokuapp.com/images/mechanic2.jpg",
                );
             //echo json_encode($post_item,);
                array_push($posts_arr, $post_item);
                
            }
           echo json_encode($posts_arr);

        }
    } else{
        //resource not found
        http_response_code($response_code=404);
    }
}else{
    $query = "SELECT * FROM mechanics WHERE location='$search' ";
    $result = $db->query($query);
    if ($result->rowCount() > 0) {
        if ($result = $db->query($query)) {
            $posts_arr = array();
            $posts_arr = array();
            while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                $post_item = array(
                    'mechanic' => $user->mechanic,
                    'location' => $user->location.':'.$user->plocation,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'url'=> "https://mybusses.herokuapp.com/images/mechanic2.jpg",
                );
             //echo json_encode($post_item,);
                array_push($posts_arr, $post_item);
                
            }
           echo json_encode($posts_arr);

        }
    } else{
        //resource not found
        echo json_encode(
            array('error' => 'No match for the current location')
          );
    }
}

