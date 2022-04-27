<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'D:/New folder/htdocs/php_api/config/Database.php';
  include_once 'D:/New folder/htdocs/php_api/models/User.php';

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
 
   // Instantiate blog post object
   $user = new User($db);
 
   // Get raw posted data
   $data = json_decode(file_get_contents("php://input"));

    
   $user->ID = $data->ID;

   $user->fname = $data->fname;
   $user->lname = $data->lname;
   $user->username = $data->username;
   $user->passsword = $data->passsword;
   $user->sstatus = $data->sstatus;
   $user->DOB = $data->DOB;
   $user->gender = $data->gender;
   $user->age = $data->age;
   $user->phone = $data->phone;
   $user->addresss = $data->addresss;
   $user->email = $data->email;
   $user->photo = $data->photo;
   $user->QR = $data->QR;
 


   if($user->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

