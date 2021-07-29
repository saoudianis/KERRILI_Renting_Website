<?php 
session_start();
require 'dbconfig.php';
//if the pic upload
if(isset($_POST['ppurl'])){
    if(isset($_SESSION['id'])){
    
        $url= $_POST['ppurl'];
        // move the data into a table
        $AppData = [
	'pp'	=>	$url
];
        //update data
        $ref='Users/'.$_SESSION['id'];
$updatedata = $database->getReference($ref)->update($AppData);
        //refresh the page 
        header("location: profile.php");
    
    }
} 



?>