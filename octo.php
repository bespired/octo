<?php

	$servers = [
		['port' => 8001, 'folder' => 'profile'],
		['port' => 8000, 'folder' => 'menu'],
	];

	echo "\n";
	foreach ($servers as $server) {
		$port   = $server['port'];
		$folder = $server['folder'];
		
		echo "Starting $folder on $port\n";
		$cmd = "cd $folder; php -S localhost:$port > /dev/null 2>&1 &";
		echo exec( $cmd );

	}
	echo "\n";
	echo "Stop servers with command php stop.php\n";

