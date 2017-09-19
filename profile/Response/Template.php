<?php

Class Template
{

	private $stubs   = [];
	private $options = [];

	public function vue($module, $type)
	{

		$config = include __DIR__ . "/../assets/cnf/$module/$type.php";

		$rows    = [];
		$options = [];

		$this->stubs   = [];
		$this->options = [];

		foreach ($config as $conf) {
			$rowtype  = $conf['type'];
			$relation = $conf['relation'];

			$row = $this->loadstub($rowtype);
			$row = str_replace('[label]', $conf['label'], $row);
			$row = str_replace('[model]', $conf['model'], $row);

			if ( $relation != '' )
			{
				$row = str_replace('[options]', 'options.' . $relation, $row);
				$options[$relation] = $this->loadrelation($module, $relation);
			}
			$rows[] = $row;

		}

		$data = $this->toData($config);
		$opts = sprintf('options: %s', json_encode($options));

		$scr_file = __DIR__ . "/../assets/scr/field-".$type."-template.scr";
		$screen = @file_get_contents($scr_file);

		$screen = str_replace('[module]'  , $module, $screen);
		$screen = str_replace('[type]'    , $type, $screen);
		$screen = str_replace('[rows]'    , join("\n",$rows), $screen);
		$screen = str_replace('[data]'    , $data, $screen);
		$screen = str_replace('[options]' , $opts, $screen);

		echo $screen;

	}


	private function toData($config)
	{
		$data= [];
		foreach ($config as $conf) {
			$model  = $conf['model'];
			$dot    = strpos($model, '.');
			if ($dot > 0)
			{
				$main = substr($model, 0, $dot);
				$sub  = substr($model, 1 +$dot);

				if (!isset($data[$main])) $data[$main] = [];

				$data[$main][$sub] = @$conf['default'];

			}else{

				$data[$model] = @$conf['default'];

			}
		}

		$json = json_encode($data, JSON_PRETTY_PRINT);
		return substr($json, 1, strlen($json)-2);

	}

	public static function var_pretty_export($var, $indent="") {
	    switch (gettype($var)) {
	        case "string":
	            return '"' . addcslashes($var, "\\\$\"\r\n\t\v\f") . '"';
	        case "array":
	            $indexed = array_keys($var) === range(0, count($var) - 1);
	            $r = [];
	            foreach ($var as $key => $value) {
	                $r[] = "$indent    "
	                     . ($indexed ? "" : self::var_pretty_export($key) . " => ")
	                     . self::var_pretty_export($value, "$indent    ");
	            }
	            return "[\n" . implode(",\n", $r) . "\n" . $indent . "]";
	        case "boolean":
	            return $var ? "'true'" : "'false'";
	        default:
	            return var_export($var, TRUE);
	    }
	}

	public static function write_model_data($filename, $data)
	{
		$array = self::var_pretty_export($data);
		$file= [];
		$file[] = "<?php\n";
		$file[] = "    return";
		$file[] = "    " . self::var_pretty_export($data, "    ") . ';';

		file_put_contents($filename, join("\n",$file));
	}


	private function loadstub($rowtype)
	{

		if (strpos($rowtype, ':') > -1)
			$rowtype = explode(':', $rowtype)[0];

		if (isset($this->stubs[$rowtype]))
			return $this->stubs[$rowtype];

		$this->stubs[$rowtype] = @file_get_contents(__DIR__ . "/../assets/stb/$rowtype.stb");
		if ( $this->stubs[$rowtype] == '' ) $this->stubs[$rowtype] = "<!-- $rowtype -->";

		return $this->stubs[$rowtype];

	}

	private function loadrelation($module, $relation)
	{
		if ( $relation == '' )
			return '';

		if (isset($this->options[$relation]))
			return $this->options[$relation];


		$options = @file_get_contents(__DIR__ . "/../assets/cnf/$module/$relation.json");
		if ( $options == '' ) $options = sprintf ('[{ "name":"" , "label":"%s/%s" }]', $module, $relation);

 		$this->options[$relation] =	json_decode($options);

		return $this->options[$relation];
	}

}
