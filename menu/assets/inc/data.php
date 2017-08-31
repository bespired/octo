<?php

	$tmpes= [];
	foreach (glob(__DIR__."/../jss/*.js") as $tpl_name) {
		$tmpes[] =  @file_get_contents($tpl_name);
	}

	foreach (glob(__DIR__."/../dta/*.js") as $tpl_name) {
		$tmpes[] =  @file_get_contents($tpl_name);
	}

	$js= join("\n", $tmpes);

	header("Content-Type: text/js");
	echo ( $js );