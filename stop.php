<?php

	$cmd = "kill $(ps aux | grep '[p]hp -S' | awk '{print $2}')";
	echo exec( $cmd );

	echo "Stopped all php development servers.\n";