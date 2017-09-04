<?php

	return 
	[
		'fpem01' => [
			'uid'               =>  'fpem01',
			'group'             =>  'personal',
			'name'              =>  'email',
			'description'       =>  'Holds the email of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'contact',
			'field_sub_type'    => 'email',

			'encryption_type'   => 'aes',
			'process'           => 'tolower',
			'validation'        => 'email',

		],

		'fpfn00' => [
			'uid'               =>  'fpfn00',
			'group'             =>  'personal',
			'name'              =>  'firstname',
			'description'       =>  'Holds the firstname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => '',
			'deleted'           =>  'true',
		],


		'fpfn01' => [
			'uid'               =>  'fpfn01',
			'group'             =>  'personal',
			'name'              =>  'firstname',
			'description'       =>  'Holds the firstname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fpln01' => [
			'uid'               =>  'fpln01',
			'group'             =>  'personal',
			'name'              =>  'lastname',
			'description'       =>  'Holds the lastname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fpff01' => [
			'uid'               =>  'fpff01',
			'group'             =>  'personal',
			'name'              =>  'fullname',
			'description'       =>  'Holds the fullname of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fpts01' => [
			'uid'               =>  'fpts01',
			'group'             =>  'personal',
			'name'              =>  'initials',
			'description'       =>  'Holds the initials of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fpns01' => [
			'uid'               =>  'fpns01',
			'group'             =>  'personal',
			'name'              =>  'insertion',
			'description'       =>  'Holds the insertion of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'name',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fpsa01' => [
			'uid'               =>  'fpsa01',
			'group'             =>  'personal',
			'name'              =>  'salutation',
			'description'       =>  'Holds the salutation of a person',
			'field_function'    =>  'approach', // how to approach, address the person
			'storage_type'      =>  'text',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'gender',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'name',
		],

		'fpge01' => [
			'uid'               =>  'fpge01',
			'group'             =>  'personal',
			'name'              =>  'gender',
			'description'       =>  'Holds the gender of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'code',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'gender',

			'encryption_type'   => 'aes',
			'process'           => 'tolower',
			'validation'        => 'm-f-o-n',
		],

		'fpnt01' => [
			'uid'               =>  'fpnt01',
			'group'             =>  'personal',
			'name'              =>  'nationality',
			'description'       =>  'Holds the nationality of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'code',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'country',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'iso-3166',
		],

		'fplg01' => [
			'uid'               =>  'fplg01',
			'group'             =>  'personal',
			'name'              =>  'language',
			'description'       =>  'Holds the prefered language of a person',
			'field_function'    =>  'general',
			'storage_type'      =>  'code',

			'information_type'  => 'personia',
			'field_type'        => 'personal',
			'field_sub_type'    => 'language',

			'encryption_type'   => 'aes',
			'process'           => '',
			'validation'        => 'iso-639',
		],

	];
