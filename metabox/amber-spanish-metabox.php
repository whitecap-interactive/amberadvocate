<?php
	$allstates = array_merge(AMBERGROUPS, MEXICANSTATES);
	$prefix = 'amber_';
	
    // Spanish Speaking Partner CUSTOM POST TYPE meta fields
    $meta_boxes[] = array(
        'title'      => __( 'Spanish Speaking Partner Information', 'amber' ),
        'post_types' => 'spanish-partner',
        'fields'     => array(
			// STATE SELECT BOX
			array(
				'name'        => __( 'State', 'amber' ),
				'id'          => "{$prefix}ss_state_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $allstates,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select State', 'amber' ),
			),
			// Email TEXT
			array(
				'name'  => __( 'Email', 'amber' ),
				'id'    => "{$prefix}ss_email_text",
				'desc'  => __( 'Partner Email Address', 'amber' ),
				'type'  => 'text',
			),
			// Office Phone TEXT
			array(
				'name'  => __( 'Office Phone', 'amber' ),
				'id'    => "{$prefix}ss_office_phone_text",
				'desc'  => __( 'Partner Office Phone', 'amber' ),
				'type'  => 'text',
			),
			// Cellular or Alternate Number TEXT
			array(
				'name'  => __( 'Cellular', 'amber' ),
				'id'    => "{$prefix}ss_cellular_text",
				'desc'  => __( 'Partner Cellular or Alternate Number', 'amber' ),
				'type'  => 'text',
			),
			// Rank or Title TEXT
			array(
				'name'  => __( 'Rank or Title', 'amber' ),
				'id'    => "{$prefix}ss_rank_text",
				'desc'  => __( 'Partner Rank or Title', 'amber' ),
				'type'  => 'text',
			),
			// Employing Agency TEXT
			array(
				'name'  => __( 'Employing Agency', 'amber' ),
				'id'    => "{$prefix}ss_agency_text",
				'desc'  => __( 'Partner Employing Agency', 'amber' ),
				'type'  => 'text',
			),
			// Employing Agency WYSIWYG
			array(
			    'name'    => "Bio",
			    'id'      => "{$prefix}ss_bio_wysiwyg",
			    'type'    => 'wysiwyg',

			    // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			    'raw'     => false,

			    // Editor settings, see https://codex.wordpress.org/Function_Reference/wp_editor
			    'options' => array(
			        'textarea_rows' => 4,
			        'teeny'         => true,
			    ),
			),
        )
    );
?>