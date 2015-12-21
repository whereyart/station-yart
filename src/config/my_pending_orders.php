<?php

	/**
	* This is a panel-level configuration
	*/

	return [
			'panel_options'	=> [
				'table'					=> 'orders',
				'single_item_name'		=> 'Pending Order',
				'has_timestamps'		=> TRUE,
				'default_order_by'		=> 'name',
				'where' 				=> 'artist_id = "%user_id%" AND (paypal_status = "COMPLETED" OR stripe_status = "COMPLETED") AND (shipping_date="0000-00-00" OR shipping_date IS NULL)',
				'trigger'				=> ['pre'=>['U'=>'WorkController@emailShippingConf']],
				'no_data_alert' 		=> [

					'header' 	=> 'No Pending Orders At The Moment',
					'body' 		=> 'You do not have any pending orders right now. You will receive an email when an order comes in. '
								. 'Check back here to mark when you have fulfilled an order.'
				]
			],
			
			'elements'	=> [
				
				'user_id'	=> [
					'label'			=> 'user_id',
					'type'			=> 'integer',
					'attributes'	=> 'index',
					'rules'			=>	'required',
					'display'		=>	'CRD',
				],
				'order_num'	=> [
					'label'			=> '#',
					'type'			=> 'text',
					'attributes'	=> 'index',
					'length'		=> 100,
					'rules'			=>	'',
					'display'		=>	'CRDL'
				],
				'order_date'	=> [
					'label'			=> 'Order Date',
					'type'			=> 'date',
					'attributes'	=> '',
					'rules'			=>	'required', 
					'display'		=>	'CRDL'
				],
				'shipping_data'	=> [
					'label'			=> 'Shipping Data',
					'type'			=> 'virtual',
					'concat' 		=> 'shipping_one, "<br />", shipping_two, " ", '
										. 'shipping_three, "<br />", shipping_city, ", ", shipping_state, " ", shipping_zip, "<br />",'
										. 'shipping_name, "<br />", shipping_phone',
					'display'		=>	'L'
				],
				'work_quantity'	=> [
					'label'			=> 'Qty',
					'type'			=> 'integer',
					'rules'			=>	'required',
					'display'		=>	'CRUDL'
				],
				'shipping_date'	=> [
					'label'			=> 'Shipped Date',
					'help'			=> 'Date work is shipped. When this is filled out, email is sent to customer.',
					'type'			=> 'date',
					'attributes'	=> '',
					'rules'			=>	'required', 
					'display'		=>	'CRUD'
				],
				'shipping_tracking'	=> [
					'label'			=> 'Tracking Num',
					'type'			=> 'text',
					'help'			=> 'ex. UPS: 1Z9999999999999999',
					'length'		=> 499,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'artist_shipping_notes'	=> [
					'label'			=> 'Shipped Message',
					'help' 			=> 'A short message accompanying the buyers email',
					'type'			=> 'textarea',
					'rows' 			=> 9,
					'attributes'	=> '',
					'rules'			=> '',
					'display'		=> 'CRUD'
				],
				'session_id'	=> [
					'label'			=> 'Session ID',
					'type'			=> 'text',
					'length'		=> 100,
					'attributes'	=> 'index',
					'rules'			=>	'',
					'display'		=>	'CRD'
				],
				'work_id'	=> [
					'label'			=> 'work_id',
					'type'			=> 'integer',
					'rules'			=>	'required',
					'display'		=>	'CRD'
				],
				'work_option_id'	=> [
					'label'			=> 'work_option_id',
					'type'			=> 'integer',
					'rules'			=>	'required',
					'display'		=>	'CRD'
				],
				'work_option_name'	=> [
					'label'			=> 'option name',
					'type'			=> 'text',
					'length'		=> 299,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRD'
				],
				'work_name'	=> [
					'label'			=> 'Work Name',
					'type'			=> 'text',
					'length'		=> 255,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUDL'
				],
				'work_img'	=> [
					'label'			=> 'Image',
					'type'			=> 'image',
					'length'		=> 299,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'RL'
				],
				'work_dimension'	=> [
					'label'			=> 'work dimension',
					'type'			=> 'text',
					'length'		=> 299,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'artist_id'	=> [
					'label'			=> 'Artist',
					'type'			=> 'select',
					'attributes'	=> 'index',
					'rules'			=> 'required',
					'display'		=> 'CRDL',
					'data'			=> [
						'join'		=> TRUE,
						'relation'	=> 'belongsTo',
						'table'		=> 'users',
						'display'	=> ['users.first_name', ' ', 'users.last_name'],
						'order'		=> 'users.last_name'
					]
				],
				'work_quantity'	=> [
					'label'			=> 'Quantity',
					'type'			=> 'integer',
					'rules'			=>	'required',
					'display'		=>	'CRUDL'
				],			
				'additional_info'	=> [
					'label'			=> 'Additional Information',
					'help' 			=> '',
					'type'			=> 'textarea',
					'rows' 			=> 4,
					'attributes'	=> '',
					'rules'			=> '',
					'display'		=> 'CRUD'
				],				
				'shipping_price'	=> [
					'label'			=> 'Shipping Cost',
					'type'			=> 'float',
					'format' 		=> 'money',
					'prepend'  		=> '$',
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRD'
				],
				'work_price'	=> [
					'label'			=> 'Price',
					'type'			=> 'float',
					'format' 		=> 'money',
					'prepend'  		=> '$',
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRD'
				],

				'shipping_email'	=> [
					'label'			=> 'Contact Email',
					'type'			=> 'email',
					'length'		=> 90,
					'attributes'	=> '',
					'rules'			=>	'required|email|max:90',
					'display'		=>	'CRUD'
				],

				'shipping_phone'	=> [
					'label'			=> 'Contact Phone',
					'type'			=> 'text',
					'length'		=> 90,
					'attributes'	=> '',
					'rules'			=> '',
					'display'		=> 'CRUD'
				],
				
				'shipping_one'	=> [
					'label'			=> 'Ship to Name',
					'type'			=> 'text',
					'length'		=> 499,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'shipping_two'	=> [
					'label'			=> 'Ship to Address',
					'type'			=> 'text',
					'length'		=> 499,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'shipping_three'	=> [
					'label'			=> 'Address Line 2',
					'type'			=> 'text',
					'length'		=> 499,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'shipping_city'	=> [
					'label'			=> 'City',
					'type'			=> 'text',
					'length'		=> 499,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'shipping_state'	=> [
					'label'			=> 'State',
					'type'			=> 'text',
					'length'		=> 10,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'shipping_zip'	=> [
					'label'			=> 'Zip Code',
					'type'			=> 'text',
					'length'		=> 20,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CRUD'
				],
				'shipping_notes'	=> [
					'label'			=> 'Shipping Notes',
					'help' 			=> '',
					'type'			=> 'textarea',
					'rows' 			=> 4,
					'attributes'	=> '',
					'rules'			=> '',
					'display'		=> 'CRUD'
				],
				'paypal_status'	=> [
					'label'			=> 'PayPal Status',
					'type'			=> 'text',
					'length'		=> 199,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CR'
				],
				'paypal_paykey'	=> [
					'label'			=> 'PayPal payKey',
					'type'			=> 'text',
					'length'		=> 199,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CR'
				],
				'paypal_transactionid'	=> [
					'label'			=> 'PayPal transactionId',
					'type'			=> 'text',
					'length'		=> 199,
					'attributes'	=> '',
					'rules'			=>	'',
					'display'		=>	'CR'
				]
			]
	];