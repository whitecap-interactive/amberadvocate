<?php
	$prefix = 'amber_';
    // ALLOW ATTACHMENT OF FILES TO Partner Resources CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Partner Resource File Attachment', 'amber' ),
        'post_types' => 'partner-resource',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'amber' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
				'max_file_uploads' => 1,
			),
			// STATE SELECT BOX
			array(
				'name'        => __( 'State', 'amber' ),
				'id'          => "{$prefix}state_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'AMBER Alert Staff/Associates' => __('AMBER Alert Staff/Associates', 'amber'),
					'Internation Centre for Missing and Exploited Children' => __('Internation Centre for Missing and Exploited Children', 'amber'),
					'National Criminal Justice Training Center Staff/Associates' => __('National Criminal Justice Training Center Staff/Associates', 'amber'),
					'National Center for Missing and Exploited Children' => __('National Center for Missing and Exploited Children', 'amber'),
					'US Department of Justice Officials/Staff' => __('US Department of Justice Officials/Staff', 'amber'),
					'Alabama' => __('Alabama', 'amber'),
					'Alaska' => __('Alaska', 'amber'),
					'American Samoa' => __('American Samoa', 'amber'),
					'Arizona' => __('Arizona', 'amber'),
					'Arkansas' => __('Arkansas', 'amber'),
					'California' => __('California', 'amber'),
					'Colorado' => __('Colorado', 'amber'),
					'Connecticut' => __('Connecticut', 'amber'),
					'Delaware' => __('Delaware', 'amber'),
					'District of Columbia' => __('District of Columbia', 'amber'),
					'Federated States of Micronesia' => __('Federated States of Micronesia', 'amber'),
					'Florida' => __('Florida', 'amber'),
					'Georgia' => __('Georgia', 'amber'),
					'Guam' => __('Guam', 'amber'),
					'Hawaii' => __('Hawaii', 'amber'),
					'Idaho' => __('Idaho', 'amber'),
					'Illinois' => __('Illinois', 'amber'),
					'Indiana' => __('Indiana', 'amber'),
					'Iowa' => __('Iowa', 'amber'),
					'Kansas' => __('Kansas', 'amber'),
					'Kentucky' => __('Kentucky', 'amber'),
					'Louisiana' => __('Louisiana', 'amber'),
					'Maine' => __('Maine', 'amber'),
					'Marshall Islands' => __('Marshall Islands', 'amber'),
					'Maryland' => __('Maryland', 'amber'),
					'Massachusetts' => __('Massachusetts', 'amber'),
					'Michigan' => __('Michigan', 'amber'),
					'Minnesota' => __('Minnesota', 'amber'),
					'Mississippi' => __('Mississippi', 'amber'),
					'Missouri' => __('Missouri', 'amber'),
					'Montana' => __('Montana', 'amber'),
					'Nebraska' => __('Nebraska', 'amber'),
					'Nevada' => __('Nevada', 'amber'),
					'New Hampshire' => __('New Hampshire', 'amber'),
					'New Jersey' => __('New Jersey', 'amber'),
					'New Mexico' => __('New Mexico', 'amber'),
					'New York' => __('New York', 'amber'),
					'North Carolina' => __('North Carolina', 'amber'),
					'North Dakota' => __('North Dakota', 'amber'),
					'Northern Mariana Islands' => __('Northern Mariana Islands', 'amber'),
					'Ohio' => __('Ohio', 'amber'),
					'Oklahoma' => __('Oklahoma', 'amber'),
					'Oregon' => __('Oregon', 'amber'),
					'Palau' => __('Palau', 'amber'),
					'Pennsylvania' => __('Pennsylvania', 'amber'),
					'Puerto Rico' => __('Puerto Rico', 'amber'),
					'Rhode Island' => __('Rhode Island', 'amber'),
					'South Carolina' => __('South Carolina', 'amber'),
					'South Dakota' => __('South Dakota', 'amber'),
					'Tennessee' => __('Tennessee', 'amber'),
					'Texas' => __('Texas', 'amber'),
					'Utah' => __('Utah', 'amber'),
					'Vermont' => __('Vermont', 'amber'),
					'Virgin Islands' => __('Virgin Islands', 'amber'),
					'Virginia' => __('Virginia', 'amber'),
					'Washington' => __('Washington', 'amber'),
					'West Virginia' => __('West Virginia', 'amber'),
					'Wisconsin' => __('Wisconsin', 'amber'),
					'Wyoming' => __('Wyoming', 'amber'),
					'Alberta' => __('Alberta', 'amber'),
					'British Columbia' => __('British Columbia', 'amber'),
					'Manitoba' => __('Manitoba', 'amber'),
					'New Brunswick' => __('New Brunswick', 'amber'),
					'Newfoundland and Labrador' => __('Newfoundland and Labrador', 'amber'),
					'Nova Scotia' => __('Nova Scotia', 'amber'),
					'Northwest Territories' => __('Northwest Territories', 'amber'),
					'Nunavut' => __('Nunavut', 'amber'),
					'Ontario' => __('Ontario', 'amber'),
					'Prince Edward Island' => __('Prince Edward Island', 'amber'),
					'Quebec' => __('Quebec', 'amber'),
					'Saskatchewan' => __('Saskatchewan', 'amber'),
					'Yukon' => __('Yukon', 'amber'),
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
			// REGION SELECT BOX
			array(
				'name'        => __( 'Region', 'amber' ),
				'id'          => "{$prefix}region_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'1' => __( '1', 'amber' ),
					'2' => __( '2', 'amber' ),
					'3' => __( '3', 'amber' ),
					'4' => __( '4', 'amber' ),
					'5' => __( '5', 'amber' ),
					'na' => __( 'N/A', 'amber' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select Region', 'amber' ),
			),
			// TOPIC SELECT BOX
			array(
				'name'        => __( 'Topic', 'amber' ),
				'id'          => "{$prefix}topic_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'AMBER Alert Plan' => __( 'AMBER Alert Plan', 'amber' ),
					'AMBER in Indian Country' => __( 'AMBER in Indian Country', 'amber' ),
					'CART Resource' => __( 'CART Resource', 'amber' ),
					'Map or Diagram' => __( 'Map or Diagram', 'amber' ),
					'Model Policy or Procedure' => __( 'Model Policy or Procedure', 'amber' ),
					'Operational Checklist or Tool' => __( ' Operational Checklist or Tool', 'amber' ),
					'Program Publication' => __( 'Program Publication', 'amber' ),
					'Other' => __( 'Other', 'amber' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select Topic', 'amber' ),
			),
			// DATE
			array(
				'name'       => __( 'Date Uploaded', 'amber' ),
				'id'         => "{$prefix}submitted_date",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'amber' ),
					'dateFormat'      => __( 'yy-mm-dd', 'amber' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// TEXT
			array(
				'name'  => __( 'Uploaded by:', 'amber' ),
				'id'    => "{$prefix}uploaded_by_text",
				'desc'  => __( 'Name of person that submitted this document', 'amber' ),
				'type'  => 'text',
			),
        )
    );
?>