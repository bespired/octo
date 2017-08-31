<?php

	$csses= [];
	foreach (glob(__DIR__."/../css/*.css") as $css_name) {
		$csses[] =  @file_get_contents($css_name);
	}

	$css= join("\n", $csses);

	$vars= [];
	$vars['black'] = '#030303';
	$vars['white'] = '#fafafa';


	$vars['first']  = '#566270';
	$vars['second'] = '#566270';
	$vars['third']  = '#566270';

	$vars['first-layer']  = '3';
	$vars['second-layer'] = '2';
	$vars['third-layer']  = '1';

	$vars['green']  = '#dbf7f6';
	$vars['front']  = '#141b40';
	$vars['hover']  = '#a9deef';
	$vars['pop']    = '#dbf7f6';
	$vars['darky']  = '#2e2f29';

	$vars['speed']  = '100ms';

	$keys = array_map('strlen', array_keys($vars));
	array_multisort($keys, SORT_DESC, $vars);

	foreach ($vars as $key => $value) {
		$css = str_replace('$'.$key, $value, $css);
	}

	header("Content-Type: text/css");
	echo ( $css );