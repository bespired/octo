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


	$tmpes= [];
	$tmpes[] = 'var config = { url:{} }';
	$tmpes[] = '    config.url.save = "'.$base_url.'/assets/inc/save.php";';

	// $tmpes[] = '    config.fields = { ';
	// $tmpes[] = '        gate : "http://localhost:8001" ';
	// $tmpes[] = '    }; ';

	
	$js= join("\n", $tmpes);

	header("Content-Type: text/js");
	echo ( $js );