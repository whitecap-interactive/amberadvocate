<?php
	$prefix = 'amber_';
	    // META BOXES FOR STATE CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'State Details', 'amber' ),
        'post_types' => 'State',
        'fields'     => array(
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Region', $prefix ),
				'id'          => "{$prefix}region",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'1' => esc_html__( '1', $prefix ),
                    '2' => esc_html__( '2', $prefix ),
                    '3' => esc_html__( '3', $prefix ),
                    '4' => esc_html__( '4', $prefix ),
                    '5' => esc_html__( '5', $prefix ),
                    'N/A-Staff' => esc_html__( 'N/A-Staff', $prefix ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select a Region', $prefix ),
			),
			// TEXT
			array(
				'name' => __( 'AMBER Alert Program Phone Number', $prefix ),
				'id'   => "{$prefix}program_phone",
				'type' => 'text',
			),
			// EMAIL
			array(
				'name' => __( 'AMBER Alert Program Email', $prefix ),
				'id'   => "{$prefix}program_email",
				'type' => 'email',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'AMBER Alert Program Website', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}program_website",
				'type'  => 'text',
			),
			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'fake_divider_id', // Not used, but needed
			),
			// TEXT
			array(
				'name' => __( 'Missing Persons Clearinghouse Program Phone Number', $prefix ),
				'id'   => "{$prefix}mpch_phone",
				'type' => 'text',
			),
			// EMAIL
			array(
				'name' => __( 'Missing Persons Clearinghouse Program Email', $prefix ),
				'id'   => "{$prefix}mpch_email",
				'type' => 'email',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Missing Persons Clearinghouse Program Website', $prefix ),
				'id'    => "{$prefix}mpch_website",
				'type'  => 'text',
				'desc'  => 'Please include http:// or https:// in the URL',
			),
			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'fake_divider_id', // Not used, but needed
			),
			// TEXT
			array(
				'name' => __( 'AMBER Alert in Indian Country Phone Number', $prefix ),
				'id'   => "{$prefix}amberic_phone",
				'type' => 'text',
			),
			// EMAIL
			array(
				'name' => __( 'AMBER Alert in Indian Country Email', $prefix ),
				'id'   => "{$prefix}amberic_email",
				'type' => 'email',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'AMBER Alert in Indian Country Website', $prefix ),
				'id'    => "{$prefix}amberic_website",
				'type'  => 'text',
				'desc'  => 'Please include http:// or https:// in the URL',
			),
			// SUBHEAD TEXT
			array(
				'name' => __( 'Additional Notes', $prefix ),
				'id'   => "{$prefix}notes",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 6,
			),
        )
    );
    // ALLOW ATTACHMENT OF FILES TO State CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Assessments & Attached Files', 'amber' ),
        'post_types' => 'State',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'amber' ),
				'id'               => "{$prefix}state_file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
        )
    );
?>