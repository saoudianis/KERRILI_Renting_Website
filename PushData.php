<?php
session_start();
require 'dbconfig.php';
//-------if user use normal registration
if(isset($_POST['number'])){
    
   
     $fetchdata = $database->getReference('Users')->getValue();
    
    
    
    foreach($fetchdata as $key => $value)
    {
        //if the email exist
    if($_POST['email'] == ($value['email'])){$result = '<div class="alert alert-danger">Email are alraedy Sign-Up ..</div>';}
        //if the phone number exist
    if($_POST['number'] == ($value['phone'])){$result ='<div class="alert alert-danger">Phone number are alraedy Sign-Up ..</div>';}
        
    }
    $_SESSION['result']=$result;
    //if there is an error
    if(isset($result)){echo $result;}
    //if user doesn't exist at the database
    //then add him info in the database
    if(empty($_SESSION['result'])){$AppData = [
    'email'=>$_POST['email'],
    'password'=>$_POST['password'],
    'phone'=>$_POST['number'],
    'pp'=>'all done',
	'username'	=>	$_POST['username'],
	
];

$ref='Users/';
$postdata = $database->getReference($ref)->push($AppData);
                                  
  $_SESSION['result']= '<div class="alert alert-success">You Are successfully rgister log-In now ..</div>';                               }

}
//------end if user use normal registration

//-------if user use facebook to signup
if(isset($_POST['profilepic'])){
    //get data
     $fetchdata = $database->getReference('Users')->getValue();
   //check the data
    foreach($fetchdata as $key => $value)
    {
        //if the user already sign-up
      if($_POST['email'] == ($value['email'])){$result = '<div class="alert alert-danger">Email are alraedy Sign-Up ..</div>';}  
        
    }
    $_SESSION['result']='';
    if(isset($result))$_SESSION['result']=$result;
    //if there is an error
    if(isset($result)){echo $result;}
    //if user doesn't exist at the database
    //then add him info in the database
     if(empty($_SESSION['result'])){
         //add the user into the database
  $AppData = [
    'email'=>$_POST['email'],
    'password'=>'000000',
    'phone'=>'0000000000',
    'pp'=>$_POST['profilepic'],
	'username'	=>	$_POST['username'],
	
];
  $ref='Users/';
$postdata = $database->getReference($ref)->push($AppData);
         
  //get the new user key
         //and make the session id
         //get database data..
         $fetchdata = $database->getReference('Users')->getValue();
         //search for the key
          foreach($fetchdata as $key => $value)
          {
            if($_POST['email'] == ($value['email'])){
                //user key from database
                $_SESSION['id']=$key;} 
          }
         
  $_SESSION['result']= '<div class="alert alert-success">You Are successfully rgister log-In now ..</div>';   
    
}}
//-------End if user use facebook to signup
//------if user sign-In with facebook
   // if post email and the setuation signin
if(isset($_POST['email']) AND isset($_POST['signin'])){
    //if there is old results
    if(isset($_SESSION['result'])){
    session_destroy();}
    
    //Get data
    $email  =   $_POST['email'];
     $fetchdata = $database->getReference('Users')->getValue();
    //check email in database
     foreach($fetchdata as $key => $value)
    {
         //if the user was registerd before
    if($email == ($value['email'])){
        
        $_SESSION['id']=$key;
        $_SESSION['fb']="true";
    }
    
     }
    //if this account doesn't registerd
    if(!isset($_SESSION['id'])){
        $_SESSION['result']='<div class="alert alert-danger">A Not Match..</div>';
    }
}



//------End user sign-In with facebook
?>