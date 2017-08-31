<?php

	return 
	[
		'fcem01' => [
			'uid'               =>  'fcem01',
			'group'             =>  'company',
			'name'              =>  'email',
			'description'       =>  'Holds the email of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'contact',
			'field_sub_type'    => 'email',

			'encryption_type'   => 'aes',
			'process'           => 'tolower',
			'validation'        => 'email',

		],

		'fcfn00' => [
			'uid'               =>  'fcfn00',
			'group'             =>  'company',
			'name'              =>  'firstname',
			'description'       =>  'Holds the firstname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => '',
			'deleted'           =>  'true',
		],


		'fcfn01' => [
			'uid'               =>  'fcfn01',
			'group'             =>  'company',
			'name'              =>  'firstname',
			'description'       =>  'Holds the firstname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fcln01' => [
			'uid'               =>  'fcln01',
			'group'             =>  'company',
			'name'              =>  'lastname',
			'description'       =>  'Holds the lastname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fcff01' => [
			'uid'               =>  'fcff01',
			'group'             =>  'company',
			'name'              =>  'fullname',
			'description'       =>  'Holds the fullname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fcts01' => [
			'uid'               =>  'fcts01',
			'group'             =>  'company',
			'name'              =>  'initials',
			'description'       =>  'Holds the initials of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fcns01' => [
			'uid'               =>  'fcns01',
			'group'             =>  'company',
			'name'              =>  'insertion',
			'description'       =>  'Holds the insertion of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fcsa01' => [
			'uid'               =>  'fcsa01',
			'group'             =>  'company',
			'name'              =>  'salutation',
			'description'       =>  'Holds the salutation of a person',
			'field_function'    =>  'approach', // how to approach, address the person
			'storage_type'      =>  'text',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'gender',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fcge01' => [
			'uid'               =>  'fcge01',
			'group'             =>  'company',
			'name'              =>  'gender',
			'description'       =>  'Holds the gender of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'code',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'gender',

			'encryption_type'   => 'aes',
			'process'           => 'tolower',
			'validation'        => 'm-f-o-n',
		],

		'fcnt01' => [
			'uid'               =>  'fcnt01',
			'group'             =>  'company',
			'name'              =>  'nationality',
			'description'       =>  'Holds the nationality of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'code',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'country',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'none',
		],

		'fclg01' => [
			'uid'               =>  'fclg01',
			'group'             =>  'company',
			'name'              =>  'language',
			'description'       =>  'Holds the prefered language of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'code',

			'information_type'  => 'company',
			'field_type'        => 'company',
			'field_sub_type'    => 'language',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'none',
		],

	];
