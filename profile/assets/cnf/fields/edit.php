<?php

	return 
	[
		[ 
			'type'     => 'uid:group.name',
			'label'    => 'UID',
			'model'    => 'field.uid',
			'relation' => ''
		],

		[
			'type'     => 'pulldown',
			'label'    => 'Group',
			'model'    => 'field.group',
			'relation' => 'field_groups'
		],

		[ 
			'type'     => 'text',
			'label'    => 'Name',
			'model'    => 'field.name',
			'relation' => '',
			'default'  => 'Name'
		],

		[ 
			'type'     => 'textarea',
			'label'    => 'Description',
			'model'    => 'field.description',
			'relation' => ''
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Information Type',
			'model'    => 'field.information_type',
			'relation' => 'field_information_types'
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Function of this field',
			'model'    => 'field.field_function',
			'relation' => 'field_functions'
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Main type',
			'model'    => 'field.field_type',
			'relation' => 'field_types'
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Sub type',
			'model'    => 'field.field_sub_type',
			'relation' => 'field_sub_types'
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Field storage type',
			'model'    => 'field.storage_type',
			'relation' => 'field_storage_types'
		],
		
		[ 
			'type'     => 'pulldown',
			'label'    => 'Encryption',
			'model'    => 'field.encryption_type',
			'relation' => 'field_encryptions'
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Process before saved',
			'model'    => 'field.process',
			'relation' => 'field_processes'
		],

		[ 
			'type'     => 'pulldown',
			'label'    => 'Validation',
			'model'    => 'field.validation',
			'relation' => 'field_validations'
		]
	];




