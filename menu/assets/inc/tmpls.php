<?php

	$tmpes= [];
	$tmpes[] = "\n";
	foreach (glob(__DIR__."/../tpl/*.tpl") as $tpl_name) {
		$tmpes[] =  @file_get_contents($tpl_name);
	}
	$tmpes[] = "\n";

	$js= join("\n", $tmpes);
	$js= str_replace("\n", "\n\t", $js);

	echo ( $js );