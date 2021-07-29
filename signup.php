<?php
require 'dbconfig.php';



if(isset($_POST['verify'])){

$username = $_POST['username'];
$email      =   $_POST['email'];
$password   =   $_POST['password'];
$phone   =   $_POST['phone'];

$Userdata = [
   'email'=>$email,
    'password'=>$password,
    'phone'=>$phone,
    'pp'=>'',
	'username'	=>	$username,
];

    if(isset($Userdata)){
$ref='Users/';
$postdata = $database->getReference($ref)->push($Userdata);
   header("location:verification.php");
}
}
?>