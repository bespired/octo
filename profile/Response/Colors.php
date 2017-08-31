<?php

Class Colors
{

	public $vars= [];
	
	function __construct()
	{

		$vars= [];
		$vars['black'] = '#030303';
		$vars['white'] = '#fafafa';


		$vars['bg-first']  = '#566270';
		$vars['bg-second'] = '#566270';
		$vars['bg-third']  = '#566270';

		$vars['fg-first']  = '#ffffff';
		$vars['fg-second'] = '#ffffff';
		$vars['fg-third']  = '#ffffff';

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

		$this->vars = $vars;
	}

	public function color($name)
	{
		return $this->vars[$name];
	}


	public function replace($css)
	{
		foreach ($this->vars as $key => $value) {
			$css = str_replace('$'.$key, $value, $css);
		}
		return $css;
	}

}