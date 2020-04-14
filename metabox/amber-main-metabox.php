<?php
    $prefix = 'amber_';
    // Add Meta Boxes For Attached Documents (note: this applies to all images, pdfs, doc, and excel files)
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => __( 'Document Details', 'amber' ),
        'post_types' => array( 'attachment' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
			// HEADLINE TEXT
			array(
				'name' => __( 'File Name', 'amber' ),
				'id'   => "{$prefix}textarea1",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// SUBHEAD TEXT
			array(
				'name' => __( 'Submitted By', 'amber' ),
				'id'   => "{$prefix}textarea2",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// DESCRIPTION TEXT
			array(
				'name' => __( 'Submittion Date', 'amber' ),
				'id'   => "{$prefix}textarea3",
				'type' => 'date',
				'desc' => 'YYYY-MM-DD',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'your-prefix' ),
					'dateFormat'      => __( 'yy-mm-dd', 'your-prefix' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
        )
    );

    
    // Add Subhead Metabox for Page/Post
    $meta_boxes[] = array(
        'id'         => 'subhead',
        'title'      => __( 'Subhead', 'amber' ),
        'post_types' => array( 'post','page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
			// SUBHEAD TEXT
			array(
				'name' => __( 'Subhead', 'amber' ),
				'id'   => "{$prefix}subhead",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
        )
    );
?>