<?php
	// META BOXES FOR CART CUSTOM POST TYPE
	$allstates = array_merge(USSTATES, CANADIANSTATES, MEXICANSTATES);
	$liaison = 'liaison';
    $meta_boxes[] = array(
        'title'      => __( 'Liaison Record', $liaison ),
        'id'         => 'liaison_record_metabox',
        'post_types' => 'liaison-record',
        'fields'     => array(
        	//Select Region
        	array(
			    'name'            => 'Select Region',
			    'id'              => $liaison . '_region_select',
			    'type'            => 'select',
			    // Array of 'value' => 'Label' pairs
			    'options'         => array(
			        '1' => esc_html__( '1', $liaison ),
                    '2' => esc_html__( '2', $liaison ),
                    '3' => esc_html__( '3', $liaison ),
                    '4' => esc_html__( '4', $liaison ),
                    '5' => esc_html__( '5', $liaison )
			    ),
			    // Allow to select multiple value?
			    'multiple'        => false,
			    // Placeholder text
			    'placeholder'     => 'Select a Region',
			    // Display "Select All / None" button?
			    'select_all_none' => false,
			),
        	//Activity Date
			array(
			    'name'       => 'Activity Date',
			    'id'         => $liaison . '_activity_date',
			    'type'       => 'date',

			    // Date picker options. See here http://api.jqueryui.com/datepicker
			    'js_options' => array(
			        'dateFormat'      => 'yy-mm-dd',
			        'showButtonPanel' => false,
			    ),

			    // Display inline?
			    'inline' => false,

			    // Save value as timestamp?
			    'timestamp' => false,
			),
			//Activity Type
        	array(
			    'name'            => 'Activity Type',
			    'id'              => $liaison . '_activity_type_select',
			    'type'            => 'select',
			    // Array of 'value' => 'Label' pairs
			    'options'         => array(
			        'onsite' => esc_html__( 'Onsite', $liaison ),
                    'offsite' => esc_html__( 'Offsite', $liaison )
			    ),
			    // Allow to select multiple value?
			    'multiple'        => false,
			    // Placeholder text
			    'placeholder'     => 'Select Activity Type',
			    // Display "Select All / None" button?
			    'select_all_none' => false,
			),
			// Tribal Contact
			array(
			    'name'    => ' Was this activity related to Indian Country and/or with a tribal member/contact? ',
			    'id'      => $liaison . '_tribal_contact_radio',
			    'type'    => 'radio',
			    'options' => array(
			        'yes' => 'Yes',
			        'no' => 'No',
			    ),
			    'inline' => false,
			),
			//Type of Contact
        	array(
			    'name'            => 'Type of Contact',
			    'id'              => $liaison . '_type_of_contact_select',
			    'type'            => 'select',
			    // Array of 'value' => 'Label' pairs
			    'options'         => array(
			        'phone' => esc_html__( 'Phone', $liaison ),
                    'single_email' => esc_html__( 'Single Email', $liaison ),
                    'group_email' => esc_html__( 'Group Email', $liaison ),
                    'in_person' => esc_html__( 'In Person / Onsite', $liaison ),
                    'n_a' => esc_html__( 'N/A - No Contact', $liaison )
			    ),
			    // Allow to select multiple value?
			    'multiple'        => false,
			    // Placeholder text
			    'placeholder'     => 'Select Type of Contact',
			    // Display "Select All / None" button?
			    'select_all_none' => false,
			),
			//Number of contacts on email
			array(
			    'name' => 'Number of contacts on email',
			    'id'   => $liaison . '_email_count_number',
			    'type' => 'number',

			    'min'  => 0,
			    'step' => 1,
			    'hidden' => array( 'liaison_type_of_contact_select', '!=', 'group_email' )
			),
			//Type of Work Performed
        	array(
			    'name'            => 'Type of Work Performed',
			    'id'              => $liaison . '_type_of_work_performed_select',
			    'type'            => 'checkbox_list',
			    // Array of 'value' => 'Label' pairs
			    'options'         => array(
			        'technical_assistance' => esc_html__( 'Technical Assistance', $liaison ),
                    'web_meeting' => esc_html__( 'Web Meeting', $liaison ),
                    'regional_in_person' => esc_html__( 'Regional In-Person Meeting', $liaison ),
                    'regional_teleconference' => esc_html__( 'Regional Teleconference/Update', $liaison ),
                    'onsite_meeting' => esc_html__( 'Onsite Meeting', $liaison ),
                    'national_symposium' => esc_html__( 'National Symposium/Conference', $liaison ),
                    'resource_work' => esc_html__( 'Resource Work/Distributed', $liaison ),
                    'tow_other' => esc_html__( 'Other (describe in notes field below)', $liaison ),
			    ),
			    // Allow to select multiple value?
			    'multiple'        => true,
			    // Placeholder text
			    'placeholder'     => 'Select Type of Work Performed',
			    // Display "Select All / None" button?
			    'select_all_none' => false,
			),
			//Number of contacts on email
			array(
			    'name' => 'Other',
			    'id'   => $liaison . '_type_of_work_other_text',
			    'type' => 'text',
			    'visible' => array( 'liaison_type_of_work_performed_select', 'contains', 'tow_other' )
			),


                	array(
					    'type' => 'heading',
					    'name' => 'SPECIFIC INDIVIDUAL CONTACTED/WORKED WITH',
					    //'desc' => 'SPECIFIC INDIVIDUAL CONTACTED/WORKED WITH',
					),
                	//Last Name
                    array(
                        'id' => $liaison . '_contact_last_name_text',
                        'type' => 'text',
                        'name' => 'Last Name',
                    ),
                    //First Name
                    array(
                        'id' => $liaison . '_contact_first_name_text',
                        'type' => 'text',
                        'name' => 'First Name',
                    ),
                    //Select State
		        	array(
					    'name'            => 'State',
					    'id'              => $liaison . '_contact_state_select',
					    'type'            => 'select',
					    // Array of 'value' => 'Label' pairs
					    'options'         => $allstates,
					    // Allow to select multiple value?
					    'multiple'        => false,
					    // Placeholder text
					    'placeholder'     => 'Select a State',
					    // Display "Select All / None" button?
					    'select_all_none' => false,
					),
                    //Role
		        	array(
					    'name'            => 'Role',
					    'id'              => $liaison . '_contact_role_select',
					    'type'            => 'select',
					    // Array of 'value' => 'Label' pairs
					    'options'         => array(
					        'cart' => esc_html__( 'CART', $liaison ),
		                    'aac' => esc_html__( 'AAC', $liaison ),
		                    'aac_chm' => esc_html__( 'AAC and CHM', $liaison ),
		                    'chm' => esc_html__( 'CHM', $liaison ),
		                    'aiic' => esc_html__( 'AIIC', $liaison ),
		                    'other' => esc_html__( 'Other', $liaison )
					    ),
					    // Allow to select multiple value?
					    'multiple'        => false,
					    // Placeholder text
					    'placeholder'     => 'Select Role of Contact',
					    // Display "Select All / None" button?
					    'select_all_none' => false,
					),
					array(
					    'name'    => 'Was training requested and/or referred with this activity?',
					    'id'      => $liaison . '_training_requested_radio',
					    'type'    => 'radio',
					    'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					    ),
					    'inline' => false,
					),
					array(
					    'name'        => 'Requestor',
					    'id'          => $liaison . '_requestor_text',
					    'type'        => 'text',
					    'visible'      => array( 'liaison_training_requested_radio', '=', 'yes' )
					),
					//Select State
		        	array(
					    'name'            => 'State',
					    'id'              => $liaison . '_contact_region_select_2',
					    'type'            => 'select',
					    // Array of 'value' => 'Label' pairs
					    'options'         => $allstates,
					    // Allow to select multiple value?
					    'multiple'        => false,
					    // Placeholder text
					    'placeholder'     => 'Select a State',
					    // Display "Select All / None" button?
					    'select_all_none' => false,
					    'visible'      => array( 'liaison_training_requested_radio', '=', 'yes' )
					),
					//Type of Training
		        	array(
					    'name'            => 'Type of Training',
					    'id'              => $liaison . '_type_of_training_select',
					    'type'            => 'checkbox_list',
					    // Array of 'value' => 'Label' pairs
					    'options'         => array(
					        'conference' => esc_html__( 'Conference', $liaison ),
		                    'in_person_training_meeting' => esc_html__( 'In Person Training/Meeting (onsite)', $liaison ),
		                    'regional_training_meeting' => esc_html__( 'Regional Training/Meeting (onsite or virtual)', $liaison ),
					    ),
					    // Allow to select multiple value?
					    'multiple'        => true,
					    // Placeholder text
					    'placeholder'     => 'Select Type of Training',
					    // Display "Select All / None" button?
					    'select_all_none' => false,
					    'visible'      => array( 'liaison_training_requested_radio', '=', 'yes' ),
					),
					//General Area of Training
		        	array(
					    'name'            => 'General Area of Training',
					    'id'              => $liaison . '_general_area_of_training_select',
					    'type'            => 'checkbox_list',
					    // Array of 'value' => 'Label' pairs
					    'options'         => array(
					    	'aiic' => esc_html__( 'AIIC', $liaison ),
					        'cart' => esc_html__( 'CART', $liaison ),
		                    'cst/hrv' => esc_html__( 'CST/HRV', $liaison ),
		                    'first_responder' => esc_html__( 'First Responder (IRST, TELMAC, PATMAC)', $liaison ),
		                    'other' => esc_html__( 'Other', $liaison ),
					    ),
					    // Allow to select multiple value?
					    'multiple'        => true,
					    // Placeholder text
					    'placeholder'     => 'Select general area of training',
					    // Display "Select All / None" button?
					    'select_all_none' => false,
					    'visible'      => array( 'liaison_training_requested_radio', '=', 'yes' ),
					),
					array(
					    'name'    => 'Was this activity one of your tri-annual regional contacts?',
					    'id'      => $liaison . '_tri_annual_contact_radio',
					    'type'    => 'radio',
					    'options' => array(
					        'yes' => 'Yes',
					        'no' => 'No',
					    ),
					    'inline' => false,
					),
					//General Notes
                    array(
                        'id' => $liaison . '_general_notes_text_area',
                        'type' => 'textarea',
                        'name' => 'General Notes',
                        'rows' => 10, 
                    ),
                    array(
					    'name' => 'I AM SUBMITTING THIS ENTRY AS FINAL',
					    'id'   => $liaison . '_final_submit_checkbox',
					    'type' => 'checkbox',
					    'std'  => 0, // 0 or 1
					),

        )//end fields
    );


?>