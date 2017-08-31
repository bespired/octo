<?php 

Class Json
{

	public function response_data()
	{

		// var_dump(__DIR__ . "/../Models/fields/*.php");
		// die;

		$fields= [];
		foreach (glob(__DIR__ . "/../Models/fields/*.php") as $filename) {
			$read   =  @include_once $filename;
			$fields =  array_merge($fields, $read);
		}

		foreach ($fields as $key => $value) {
			$fields[$key]['fullname'] = $fields[$key]['group'] . '.' . $fields[$key]['name'];
		}

		$profiles= [
			'by_uid'  => [],
			'by_type' => []
		];

		foreach (glob(__DIR__."/../Models/profiles/*.php") as $filename) {
			$read   =  @include_once $filename;
			foreach ($read as $name => $rules) {
				
				$profiles[$name] = [];
				
				foreach ($rules as $key => $rule) {
					$field= $fields[$rule['field']];

					$profiles['by_type'][$name][$rule['name']] = $field;
					$profiles['by_type'][$name][$rule['name']]['puid'] = $rule['uid'];
					$profiles['by_type'][$name][$rule['name']]['fuid'] = $field['uid'];
					unset($profiles['by_type'][$name][$rule['name']]['uid']);

					$profiles['by_uid'][$rule['uid']] = $field;
					$profiles['by_uid'][$rule['uid']]['puid'] = $rule['uid'];
					$profiles['by_uid'][$rule['uid']]['fuid'] = $field['uid'];
					unset($profiles['by_uid'][$rule['uid']]['uid']);
				}
			}

		}

		$data = [
			'tag'     => null,  // to do 
			'event'   => null,  // to do : unsubscribe, subscribe
			'consent' => null,  // to do : consent given, consent revoked
			'field'   => $fields,
			'profile' => $profiles,
		];

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		echo json_encode($data);

	}
}
