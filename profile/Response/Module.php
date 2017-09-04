<?php

Class Response
{


	public function request()
	{
		$uri   = $_SERVER['REQUEST_URI'];
		$route = explode("/", $uri);

		$action = $route[1] . '-' . $route[3];
		$module = $route[2];

		switch ($action) {

		 	case 'load-edit':
		 		$this->load_edit($module);
		 		return;
		 	break;

		 	case 'load-module':
		 		$this->load_module($module);
		 		return;
		 	break;

		 	case 'load-stylesheet':
		 		$this->load_stylesheet($module);
		 		return;
		 	break;

		 	case 'load-json':
		 		$this->load_json($module);
		 		return;
		 	break;

		 	case 'save-':

		 		$this->save_fields($_POST['data']);

		}

	}

	private function save_fields($posts)
	{

		if (!$posts) return;

 		header("Access-Control-Allow-Origin: *");
 		header("Access-Control-Allow-Methods: POST, PUT, OPTIONS");
 		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 		header("Content-Type: *");

 		echo "data:\n";

		$collect = array();
		foreach ($posts as $post){
  			$collect[] = (object)$post;
		}

		$changed = array_filter($collect, function($obj){
    		return (isset($obj->changed) && ($obj->changed == 'true')) ? true : false;
    	});

 		foreach ($changed as $obj){
 			$group = $obj->group;
 			$modelfile = __DIR__ . '/../Models/fields/' . $group . '.php';
 			$fields = file_exists($modelfile) ? @include $modelfile : [];
			$fields[$obj->uid] = (array)$obj;
			unset($fields[$obj->uid]['changed']);
			unset($fields[$obj->uid]['selected']);
			Template::write_model_data($modelfile, $fields);
 		}

	}

// find templates to mix into the vue.
	private function match_template($str)
	{
		$re = '/template: (?<tpl>\'#[\S]*?\')/';
		preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

		if (count($matches) == 0 ) return $str;

		$tpl_str   = $matches[0]['tpl'];
		$tpl_name  = substr($tpl_str, 2,-1);
		$tpl_route = explode('-', $tpl_name);
		$module    = $tpl_route[0];
		$tpl       = isset($tpl_route[1]) ? $tpl_route[1] : 'main';

		$template= @file_get_contents( __DIR__ . "/../assets/tpl/$module/$tpl.tpl" );

		if (strlen($template) == 0 ) return $str;

		// strip of <template></template>
		$template = preg_replace('/\<template[\s\S]*?\>/', '', $template);
		$template = preg_replace('/\<\/template\>/', '', $template);
		// escape ' into \'
		$template = trim(str_replace("'", "\'", $template));

		$vue= str_replace($tpl_str, "`".$template."`", $str);

		return $vue;

	}

	private function load_json($module)
	{
		$json = new Json();
		$json->response_data();
		return;
	}

	private function load_stylesheet($module)
	{

		$colors= new Colors();

		$csss= [];

		foreach (glob( __DIR__ . "/../assets/css/$module/*.css") as $css_name) {
			$css  = @file_get_contents($css_name);
			$csss[] = $colors->replace($css);
		}

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: text/css");
		echo join("\n", $csss);
	}


	// create/load all edit vue for this module
	private function load_edit($module)
	{

		$edit = new Template();
		$edit->vue($module, 'edit');
		return;


	}

	// load all vue from this module
	private function load_module($module)
	{
		$vues= [];

		foreach (glob( __DIR__ . "/../assets/vue/$module/*.vue") as $vue_name) {
			if ( strpos($vue_name, "main.vue") === false )
			{
				$vue  = @file_get_contents($vue_name);
				$vue  = $this->match_template($vue);
				$vues[] = $vue;
			}else{
				$main  = @file_get_contents($vue_name);
				$main  = $this->match_template($main);
			}
		}
		$vues[] = $main;

		header("Access-Control-Allow-Origin: *");
		echo join("\n", $vues);

		return;
	}



}