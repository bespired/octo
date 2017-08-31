<?php

	$tmpes= [];
	$root = '';
	foreach (glob(__DIR__."/../vue/*.vue") as $tpl_name) {
		if ( substr($tpl_name, -8) != 'root.vue' )
		{
			$tmpes[] =  @file_get_contents($tpl_name);
		}
	}

	$js= join("\n", $tmpes);

	header("Content-Type: text/js");
	echo ( $js );