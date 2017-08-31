<?php

	if ( isset($_SERVER["HTTP_HOST"]))
	{
		$base_url  = $_SERVER['HTTP_HOST'];
	}else{
		$base_url  = $_SERVER['SERVER_NAME'];
		$base_url .= count($_SERVER['SERVER_PORT']) > 0 ? ':' . $_SERVER['SERVER_PORT'] : '';
	}

	$base_url = (strpos($_SERVER["SERVER_PROTOCOL"], 's') > 0)
				? "https://$base_url" : "http://$base_url";

	echo ( "<base href='$base_url/'>\n" );