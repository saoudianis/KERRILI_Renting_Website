<?php
require 'dbconfig.php';

$AppData = [
	'wilaya'	=>	'Oran',
	'type'	=>	'Garag',
    'description' => 'garage cite de amaria',
    'userkey' => '-MS8PSf3kXBLDmB2wQ2C',
    'pin' => '35.710430, -0.627966',
    'pic' => 'https://myzoombackgrounds.com/wp-content/uploads/edd/2020/04/damir-kopezhanov-w-bRrLmXODg-unsplash.jpg',
    'available' => 'yes',
    'price' => '40000',
    'title' => 'garage fe beraghi'
];

$ref='Posts/';
$postdata = $database->getReference($ref)->push($AppData);

?>