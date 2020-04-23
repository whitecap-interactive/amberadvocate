<?php
	$prefix = 'amber_';
	$allstates = array_merge(AMBERGROUPS, USSTATES, CANADIANSTATES, MEXICANSTATES);
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
				'options'     => $allstates,
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