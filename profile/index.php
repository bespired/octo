<?php 

	include __DIR__ . "/Response/Module.php"; 
	include __DIR__ . "/Response/Template.php"; 
	include __DIR__ . "/Response/Colors.php"; 
	include __DIR__ . "/Response/Json.php"; 


	$response = new Response();
	$response->request();