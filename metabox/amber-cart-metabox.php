<?php
	$prefix = 'amber_';
	// META BOXES FOR CART CUSTOM POST TYPE
	$cart = 'cart';
    $meta_boxes[] = array(
        'title'      => __( 'CART Information', $cart ),
        'id'         => 'cart_info_metabox',
        'post_types' => 'cart',
        'fields'     => array(
			// TEXT
			array(
				'name'  => __( 'CART Coordinator First Name', $cart  ),
				'id'    => "{$cart}_first_name",
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => __( 'CART Coordinator Last Name', $cart  ),
				'id'    => "{$cart}_last_name",
				'type'  => 'text',
			),
			// EMAIL
			array(
				'name' => __( 'CART Coordinator Email', $cart ),
				'id'   => "{$cart}_email",
				'type' => 'email',
			),
			// TEXTAREA
			array(
				'name'  => __( 'CART Physical Address', $cart  ),
				'id'    => "{$cart}_address",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 3,
			),
			// TEXT
			array(
				'name' => __( 'Program Primary Contact Phone Number', $cart ),
				'id'   => "{$cart}_primary_phone",
				'type' => 'text',
			),
			// STATE SELECT BOX
			array(
				'name'        => __( 'State of CART', $cart ),
				'id'          => "{$cart}_state_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => USSTATES,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',
				'placeholder' => __( 'Select State', $cart ),
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'CART AMBER Alert Region', $cart ),
				'id'          => "{$cart}_region",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'1' => esc_html__( '1', $cart ),
                    '2' => esc_html__( '2', $cart ),
                    '3' => esc_html__( '3', $cart ),
                    '4' => esc_html__( '4', $cart ),
                    '5' => esc_html__( '5', $cart )
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select a Region', $cart ),
			),
			// RADIO
			array(
				'name'        => esc_html__( 'Is CART Active?', $cart ),
				'id'          => "{$cart}_active",
				'type'        => 'radio',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Yes' => esc_html__( 'Yes', $cart ),
                    'No' => esc_html__( 'No', $cart )
				),
			),
			// RADIO
			array(
				'name'        => esc_html__( 'Is CART Certified?', $cart ),
				'id'          => "{$cart}_certified",
				'type'        => 'radio',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Yes' => esc_html__( 'Yes', $cart ),
                    'No' => esc_html__( 'No', $cart )
				),
			),
			// DATE
			array(
			    'name'       => esc_html__( 'Date of Original CART Certification', $cart ),
			    'id'         => "{$cart}_certification_date",
			    'type'       => 'date',
			    // Date picker options. See here http://api.jqueryui.com/datepicker
			    'js_options' => array(
			        'dateFormat'      => 'mm-dd-yy',
			        'showButtonPanel' => false,
			    ),
			    // Display inline?
			    'inline' => false,
			    // Save value as timestamp?
			    'timestamp' => false,
			    'desc' => 'MM-DD-YYYY'
			),
			// RADIO
			array(
				'name'        => esc_html__( 'Has the CART Recertified?', $cart ),
				'id'          => "{$cart}_recertified",
				'type'        => 'radio',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Yes' => esc_html__( 'Yes', $cart ),
                    'No' => esc_html__( 'No', $cart )
				),
			),
			// DATE
			array(
			    'name'       => esc_html__( 'Date of CART Recertification', $cart ),
			    'id'         => "{$cart}_recertification_date",
			    'type'       => 'date',
			    // Date picker options. See here http://api.jqueryui.com/datepicker
			    'js_options' => array(
			        'dateFormat'      => 'mm-dd-yy',
			        'showButtonPanel' => false,
			    ),
			    // Display inline?
			    'inline' => false,
			    // Save value as timestamp?
			    'timestamp' => false,
			    'desc' => 'MM-DD-YYYY'
			),
			// SELECT BOX
			array(
				'name'        => __( 'CART Type', $cart ),
				'id'          => "{$cart}_type",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Regional' => __( 'Regional', $cart ),
					'Statewide' => __( 'Statewide', $cart ),
					'County Wide' => __( 'County Wide', $cart ),
					'Single Agency' => __( 'Single Agency', $cart ),
					'Tribal' => __( 'Tribal', $cart ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select CART Type', $cart ),
			),
			// RADIO
			array(
				'name'        => esc_html__( 'Is your CART affiliated with a Tribal Organization?', $cart ),
				'id'          => "{$cart}_tribal_affiliation",
				'type'        => 'radio',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Yes' => esc_html__( 'Yes', $cart ),
                    'No' => esc_html__( 'No', $cart )
				),
			),
			// TEXTAREA
			array(
				'name'  => __( 'If yes, please provide Tribal Organization name', $cart  ),
				'id'    => "{$cart}_tribal_organization",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// RADIO
			array(
				'name'        => esc_html__( 'Number of agencies in CART Program', $cart ),
				'id'          => "{$cart}_number_agencies",
				'type'        => 'radio',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'1-10' => esc_html__( '1-10', $cart ),
                    '10-20' => esc_html__( '10-20', $cart ),
                    '20-30' => esc_html__( '20-30', $cart ),
                    '30-40' => esc_html__( '30-40', $cart ),
                    '40+' => esc_html__( '40+', $cart ),
				),
			),
			// TEXTAREA
			// array(
			// 	'name'  => __( 'List the names of agencies included in the CART', $cart  ),
			// 	'id'    => "{$cart}_agency_names",
			// 	'type' => 'textarea',
			// 	'cols' => 10,
			// 	'rows' => 5,
			// ),
			//FILE ADVANCED
			array(
			    'id'               => "{$cart}_documents",
			    'name'             => 'Upload documents related to the CART',
			    'type'             => 'file_advanced'
			),
			// WYSIWYG
			array(
			    'name'    => __( 'List the names of agencies included in the CART', $cart  ),
			    'id'      => "{$cart}_agency_names",
			    'type'    => 'wysiwyg',

			    // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			    'raw'     => false,

			    // Editor settings, see https://codex.wordpress.org/Function_Reference/wp_editor
			    'options' => array(
			        'textarea_rows' => 4,
			        'teeny'         => true,
			        'media_buttons' => false,
			    ),
			),

			array(
			    'name'    => __( 'Training Requested', $cart  ),
			    'id'      => "{$cart}_training_requested",
			    'type'    => 'checkbox_list',
			    // Options of checkboxes, in format 'value' => 'Label'
			    'options' => array(
			        'cart-basic' 						=> 'CART Basic (3 Day Training)',
			        'cart-table-top' 					=> 'CART Table-Top Exercise',
			        'cart-new-member'        			=> 'CART for New Members (online)',
			        'cart-commander-online'     		=> 'CART Commander (online)',
			        'cart-commander-onsite' 			=> 'CART Commander (onsite)',
			        'cart-certification'     			=> 'CART Certification',
			        'search-canvass'      				=> 'Search & Canvass',
			        'investigative-strategies'      	=> 'Investigative Strategies',
			        'interview-interrogation'      		=> 'Interview & Interrogation',
			        'long-term-missing-investigations'  => 'Long Term Missing Investigations',
			        'child-sex-trafficking'      		=> 'Child Sex Trafficking',
			        'digital-evidence-investigations'   => 'Digital Evidence Investigations',
			        //'other'      => 'Swift',
			    ),
			    // Display options in a single row?
			    // 'inline' => true,
			    // Display "Select All / None" button?
			    //'select_all_none' => true,
			),
			// TEXTAREA
			array(
				'name'  => __( 'Any other training needs?', $cart  ),
				'id'    => "{$cart}_training_other",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'fake_divider_id', // Not used, but needed
			),

			// GROUP
	    array(
	      'name'      => __( 'Triannual Activity Reporting', $cart ),
        'id' => 'biannual_activity_reporting', // ID group
        'type' => 'group', // Data of “Group”
        'clone' => true,
        'sort_clone' => true,

        // List of custom fields
				'fields' => array(
							// DATE
							array(
							    'name'       => esc_html__( 'Activity Report Date', $cart ),
							    'id'         => "{$cart}_liason_report_date",
							    'type'       => 'date',
							    // Date picker options. See here http://api.jqueryui.com/datepicker
							    'js_options' => array(
							        'dateFormat'      => 'mm-dd-yy',
							        'showButtonPanel' => false,
							    ),
							    // Display inline?
							    'inline' => false,
							    // Save value as timestamp?
							    'timestamp' => false,
							),
							// SELECT BOX
							array(
								'name'        => esc_html__( 'Region', $cart ),
								'id'          => "{$cart}_liason_region",
								'type'        => 'select',
								// Array of 'value' => 'Label' pairs for select box
								'options'     => array(
									'1' => esc_html__( '1', $cart ),
				                    '2' => esc_html__( '2', $cart ),
				                    '3' => esc_html__( '3', $cart ),
				                    '4' => esc_html__( '4', $cart ),
				                    '5' => esc_html__( '5', $cart )
								),
								// Select multiple values, optional. Default is false.
								'multiple'    => false,
								'placeholder' => esc_html__( 'Select a Region', $cart ),
							),
							// TEXT
							array(
								'name'  => __( 'Liason Name', $cart  ),
								'id'    => "{$cart}_liason_name",
								'type'  => 'text',
							),
							// SELECT BOX
							array(
								'name'        => esc_html__( 'Method', $cart ),
								'id'          => "{$cart}_liason_method",
								'type'        => 'select',
								// Array of 'value' => 'Label' pairs for select box
								'options'     => array(
									'Phone' => esc_html__( 'Phone', $cart ),
				                    'Email' => esc_html__( 'Email', $cart ),
								),
								// Select multiple values, optional. Default is false.
								'multiple'    => false,
								'placeholder' => esc_html__( 'Select a Method', $cart ),
							),
							// TEXTAREA
							array(
								'name'  => __( 'CART Member Contacted', $cart  ),
								'id'    => "{$cart}_liason_member",
								'type' => 'textarea',
								'cols' => 10,
								'rows' => 2,
							),
							// RADIO
							array(
								'name'        => esc_html__( 'Training Requested?', $cart ),
								'id'          => "{$cart}_liason_training",
								'type'        => 'radio',
								// Array of 'value' => 'Label' pairs for select box
								'options'     => array(
									'Yes' => esc_html__( 'Yes', $cart ),
				                    'No' => esc_html__( 'No', $cart )
								),
							),
							// TEXTAREA
							array(
								'name'  => __( 'Notes/Summary', $cart  ),
								'id'    => "{$cart}_liason_notes",
								'type' => 'textarea',
								'cols' => 10,
								'rows' => 5,
							),
							// TEXTAREA
							array(
								'name'  => __( 'General Notes', $cart  ),
								'id'    => "{$cart}_general_notes",
								'type' => 'textarea',
								'cols' => 10,
								'rows' => 5,
							),
            ),
	        ),
					// TEXTAREA
					array(
						'name'  => __( 'Detailed Notes', $cart  ),
						'id'    => "{$cart}_detailed_notes",
						'type' => 'textarea',
						'cols' => 10,
						'rows' => 10,
						'clone' => true,
		        		'sort_clone' => true,

					),
        )
    );
?>