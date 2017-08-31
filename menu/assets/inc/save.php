<?php

	$request_body = file_get_contents('php://input');
	$data = json_decode($request_body);
	
	var_dump($data);

	die('yep');
	
	$filepath = realpath(__DIR__ . '/../dta/');
	
	file_put_contents($filepath, $data);