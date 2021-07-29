<?php
session_start();
require 'dbconfig.php';
if(isset($_SESSION['id'])){
    if(isset($_POST['user'])){
        $time = getdate();
        $date = $time['year']."/".$time['mon']."/".$time['mday'];
       $AppData = [
	'wilaya'	=>	$_POST['wilaya'],
	'type'	=>	$_POST['type'],
    'description' => $_POST['discription'],
    'userkey' => $_POST['user'],
    'pin' => $_POST['pin'],
    'pic' => $_POST['ppurl'],
    'available' => 'yes',
    'price' => $_POST['price'],
    'title' => $_POST['titel'],
    'time' => $date       
];

$ref='Posts/';
$postdata = $database->getReference($ref)->push($AppData); 
    }
}


?>