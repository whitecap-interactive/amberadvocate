<?php
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
				'options'     => array(
					'AMBER Alert Staff/Associates' => __('AMBER Alert Staff/Associates', 'amber'),
					'Internation Centre for Missing and Exploited Children' => __('Internation Centre for Missing and Exploited Children', 'amber'),
					'National Criminal Justice Training Center Staff/Associates' => __('National Criminal Justice Training Center Staff/Associates', 'amber'),
					'National Center for Missing and Exploited Children' => __('National Center for Missing and Exploited Children', 'amber'),
					'US Department of Justice Officials/Staff' => __('US Department of Justice Officials/Staff', 'amber'),

					'Aguascalientes' => __('Aguascalientes', 'amber'),
					'Baja California' => __('Baja California', 'amber'),
					'Baja California Sur' => __('Baja California Sur', 'amber'),
					'Campeche' => __('Campeche', 'amber'),
					'Chiapas' => __('Chiapas', 'amber'),
					'Chihuahua' => __('Chihuahua', 'amber'),
					'Coahuila' => __('Coahuila', 'amber'),
					'Colima' => __('Colima', 'amber'),
					'Mexico City' => __('Mexico City', 'amber'),
					'Durango' => __('Durango', 'amber'),
					'Guanajuato' => __('Guanajuato', 'amber'),
					'Guerrero' => __('Guerrero', 'amber'),
					'Hidalgo' => __('Hidalgo', 'amber'),
					'Jalisco' => __('Jalisco', 'amber'),
					'México' => __('México', 'amber'),
					'Michoacán' => __('Michoacán', 'amber'),
					'Morelos' => __('Morelos', 'amber'),
					'Nayarit' => __('Nayarit', 'amber'),
					'Nuevo León' => __('Nuevo León', 'amber'),
					'Oaxaca' => __('Oaxaca', 'amber'),
					'Puebla' => __('Puebla', 'amber'),
					'Querétaro' => __('Querétaro', 'amber'),
					'Quintana Roo' => __('Quintana Roo', 'amber'),
					'San Luis Potosí' => __('San Luis Potosí', 'amber'),
					'Sinaloa' => __('Sinaloa', 'amber'),
					'Sonora' => __('Sonora', 'amber'),
					'Tabasco' => __('Tabasco', 'amber'),
					'Tamaulipas' => __('Tamaulipas', 'amber'),
					'Tlaxcala' => __('Tlaxcala', 'amber'),
					'Veracruz' => __('Veracruz', 'amber'),
					'Yucatán' => __('Yucatán', 'amber'),
					'Zacateca' => __('Zacateca', 'amber'),
				),
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