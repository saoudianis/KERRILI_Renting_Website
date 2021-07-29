<?php
require 'dbconfig.php';

$AppData = [
    'email'=>'anis@gmail.com',
    'password'=>'anis1234',
    'phone'=>'0559248068',
    'pp'=>'https://icon-library.com/images/default-profile-icon/default-profile-icon-16.jpg',
	'username'	=>	'anismax',
	
];

$ref='Users/';
$postdata = $database->getReference($ref)->push($AppData);

?>