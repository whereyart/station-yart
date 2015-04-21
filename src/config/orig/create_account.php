<?php

	/**
	* This is the panel-level configuration for Users : Station
	*/

	return [
			'panel_options'	=> [
				'table'				=> 'users',	//if no tablename, uses panel name
				'single_item_name'	=> 'Account',
				'has_timestamps'	=> TRUE,	// Boolean for whether or not we'll be using timestamps
				'default_order_by'	=> 'username'
			],
			
			'elements'	=> [
				// These are the components that make up this panel
				'username'	=> [
					'label'			=> 'Username',
					'type'			=> 'text',
					'length'		=> 30,
					'attributes'	=> 'unique|index',
					'rules'			=>	'required|alpha_dash|unique:users,username|between:4,30', // this is wildcard for this table.
					'display'		=>	'CRUDL'
				],
				'password'	=> [
					'label'			=> 'Password',
					'type'			=> 'password',
					'inline_help' 	=> 'must be between 4 and 30 characters',
					'popover_help' 	=> '<b>html allowed</b>',
					'length'		=> 255, // important. must be greater than 60 characters
					'attributes'	=> '',
					'rules'			=>	'required|alpha_dash|between:4,30',
					'display'		=>	'CRUD'
				],
				'email'	=> [
					'label'			=> 'Email',
					'type'			=> 'email',
					'length'		=> 90,
					'attributes'	=> 'unique|index',
					'rules'			=>	'required|email|unique:users,email|max:90',
					'display'		=>	'CRUDL'
				],
				'first_name'	=> [
					'label'			=> 'First Name',
					'type'			=> 'text',
					'length'		=> 90,
					'attributes'	=> '',
					'rules'			=>	'required|max:90',
					'display'		=>	'CRUDL'
				],
				'last_name'	=> [
					'label'			=> 'Last Name',
					'type'			=> 'text',
					'length'		=> 90,
					'attributes'	=> '',
					'rules'			=>	'required|max:90',
					'display'		=>	'CRUDL'
				],
				'phone'	=> [
					'label'			=> 'Phone',
					'type'			=> 'text',
					'length'		=> 90,
					'attributes'	=> '',
					'rules'			=>	'required',
					'display'		=>	'CRUDL'
				],
				'groups'	=> [
					'label'			=> 'Groups',
					'type'			=> 'multiselect',
					'multiple'		=> TRUE,
					'display'		=>	'',
					'data'			=> [				
						'join'		=> FALSE,
						'relation'	=> 'belongsToMany', //possible vars are: 'hasOne','hasMany','belongsTo','belongsToMany' see: http://laravel.com/docs/eloquent#relationships
						'table'		=> 'groups',
						'pivot'		=> 'Canary\Station\Models\Group'

					]
				]
			]
	];