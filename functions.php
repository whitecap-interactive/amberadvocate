<?php
/**
 * amberadvocate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package amberadvocate
 */

if ( ! function_exists( 'amberadvocate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function amberadvocate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on amberadvocate, use a find and replace
	 * to change 'amberadvocate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'amberadvocate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'amberadvocate' ),
		'footer' => esc_html__( 'Footer Menu', 'amberadvocate' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'amberadvocate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'amberadvocate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amberadvocate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amberadvocate_content_width', 640 );
}
add_action( 'after_setup_theme', 'amberadvocate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amberadvocate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'amberadvocate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'amberadvocate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'amberadvocate_widgets_init' );


/**
* Add custom post types.
*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'state',
		array(
			'labels' => array(
				'name' => __( 'States' ),
				'singular_name' => __( 'State' )
			),
		'public' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'states'),  
		'supports' => array(
            'title',
            'excerpt',
            'editor',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author'),
        'taxonomies' => array('category', 'post_tag'),
        /*'show_in_nav_menus' => true*/
		)
	);
	register_post_type( 'partner-resource',
		array(
			'labels' => array(
				'name' => __( 'Partner Resources' ),
				'singular_name' => __( 'Partner Resource' )
			),
		'public' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'partner-resources'),  
		'supports' => array(
            'title',
            'excerpt',
            'editor',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author'),
        'taxonomies' => array(),
        /*'show_in_nav_menus' => true*/
		)
	);
	register_post_type( 'spanish-partner',
		array(
			'labels' => array(
				'name' => __( 'Spanish Speaking Partners' ),
				'singular_name' => __( 'Spanish Speaking Partner' )
			),
		'public' => true,
		'has_archive' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'enespanol/socio'),  
		'supports' => array(
            'title',
            'excerpt',
            'editor',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author'),
        'taxonomies' => array(),
        
		)
	);
} 



/**
 * Change the post type labels
 */
function change_post_type_labels() {
  global $wp_post_types;

  // Change the partner resource post labels
  $postLabels = $wp_post_types['partner-resource']->labels;
  $postLabels->name = 'Partner Resources';
  $postLabels->singular_name = 'Partner Resources';
  $postLabels->add_new = 'Add New Partner Resource';
  $postLabels->add_new_item = 'Add New Partner Resource';
  $postLabels->edit_item = 'Edit Partner Resource';
  $postLabels->new_item = 'Partner Resources';
  $postLabels->view_item = 'View Partner Resources';
  $postLabels->search_items = 'Search Partner Resources';
  $postLabels->not_found = 'No Partner Resources found';
  $postLabels->not_found_in_trash = 'No Partner Resources found in Trash';


  // Change the spanish partner post labels
  $postLabels = $wp_post_types['spanish-partner']->labels;
  $postLabels->name = 'Spanish Speaking Partners';
  $postLabels->singular_name = 'Spanish Speaking Partners';
  $postLabels->add_new = 'Add New Spanish Speaking Partner';
  $postLabels->add_new_item = 'Add New Spanish Speaking Partner';
  $postLabels->edit_item = 'Edit Spanish Speaking Partner';
  $postLabels->new_item = 'Spanish Speaking Partners';
  $postLabels->view_item = 'View Spanish Speaking Partners';
  $postLabels->search_items = 'Search Spanish Speaking Partners';
  $postLabels->not_found = 'No Spanish Speaking Partners found';
  $postLabels->not_found_in_trash = 'No Spanish Speaking Partners found in Trash';


  //Remove unnecessary fields
  remove_post_type_support( 'spanish-partner', 'editor');
  remove_post_type_support( 'spanish-partner', 'thumbnail');
  remove_post_type_support( 'spanish-partner', 'excerpt');
  remove_post_type_support( 'spanish-partner', 'trackbacks');
  remove_post_type_support( 'spanish-partner', 'custom-fields');
  remove_post_type_support( 'spanish-partner', 'comments');
  remove_post_type_support( 'spanish-partner', 'page-attributes');
  remove_post_type_support( 'spanish-partner', 'post-formats');
}
add_action( 'init', 'change_post_type_labels' );


/**
 * Enqueue scripts and styles.
 */
function amberadvocate_scripts() {

	wp_enqueue_style('slick',get_template_directory_uri().'/css/slick/slick.css');
	wp_enqueue_style('slick-theme',get_template_directory_uri().'/css/slick/slick-theme.css');
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('bootstrap-theme.min',get_template_directory_uri().'/css/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'amberadvocate-style', get_stylesheet_uri() );

	/*wp_enqueue_script( 'amberadvocate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );*/
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'amberadvocate-global', get_template_directory_uri() . '/js/amberadvocate.js', array(), '20170811', true );
	wp_enqueue_script( 'amberadvocate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'amberadvocate-flipclock', get_template_directory_uri() . '/js/flipclock.js', array(), '20170811', true );
    wp_enqueue_style('flipclock-css',get_template_directory_uri().'/css/flipclock.css');

}
add_action( 'wp_enqueue_scripts', 'amberadvocate_scripts' );

/*function counter_scripts() {
    if( is_page( array( 'home' ) ){
        wp_enqueue_script( 'amberadvocate-flipclock', get_template_directory_uri() . '/js/flipclock.js', array(), '20170811', true );
    	wp_enqueue_style('flipclock-css',get_template_directory_uri().'/css/flipclock.css');
    }
}
add_action( 'wp_enqueue_scripts', 'counter_scripts' );*/



/**
 * META BOXES
 */
add_filter( 'rwmb_meta_boxes', 'amber_register_meta_boxes' );
function amber_register_meta_boxes( $meta_boxes ) {
    
    
    // Get the users to display in the Admin Contact select box
    $amberusers = get_users( 'blog_id=1&orderby=nicename&role=member' );
    // Array of WP_User objects.
    $amber_admin = array();    
    foreach ( $amberusers as $amberuser ) $amber_admin[$amberuser->user_nicename] = $amberuser->user_firstname . ' ' . $amberuser->user_lastname;  
    
    
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

    // Spanish Speaking Partner CUSTOM POST TYPE meta fields
    $meta_boxes[] = array(
        'title'      => __( 'Spanish Speaking Partner Information', 'amber' ),
        'post_types' => 'spanish-partner',
        'fields'     => array(

			// Name TEXT
			// array(
			// 	'name'  => __( 'Name', 'amber' ),
			// 	'id'    => "{$prefix}ss_name_text",
			// 	'desc'  => __( 'Partner Name', 'amber' ),
			// 	'type'  => 'text',
			// ),
			// Email TEXT
			array(
				'name'  => __( 'Email', 'amber' ),
				'id'    => "{$prefix}ss_email_text",
				'desc'  => __( 'Partner Email Address', 'amber' ),
				'type'  => 'text',
			),
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

        )
    );
    return $meta_boxes;
}


//ADD SETTINGS PAGE FOR PARTNER LISTINGS ALERTS
add_filter( 'mb_settings_pages', 'global_docs_page' );
function global_docs_page( $settings_pages )
{
	$settings_pages[] = array(
		'id'          => 'amberadvocate',
		'option_name' => 'amberadvocate',
		'menu_title'  => __( 'Partner Alerts', 'amberadvocate' ),
		//'parent'      => 'themes.php',
	);
	return $settings_pages;
}

add_filter( 'rwmb_meta_boxes', 'global_settings_meta_boxes' );
function global_settings_meta_boxes( $meta_boxes )
{
    $meta_boxes[] = array(
        'id'         => 'global-settings',
        'title'      => __( 'Partner Alerts', 'amberadvocate' ),
        'settings_pages' => 'amberadvocate',
		'icon_url'      => 'dashicons-admin-page',
		'submit_button' => 'Save Alerts',
        'fields' => array(
            array(
                'id'     => 'standard',
                // Group field
                'type'   => 'group',
                // Clone whole group?
                'clone'  => true,
                // Drag and drop clones to reorder them?
                'sort_clone' => true,
                // Sub-fields
                'fields' => array(
                    array(
                        'name' => 'Alert Text',
                        'id'   => 'text-alert',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Button Text',
                        'id'   => 'text-button',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Link URL',
                        'id'   => 'text-url',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
    );    
    
	return $meta_boxes;
}




//ADD DESCRIPTION TEXT TO SINGLE FORUM PAGES
//filter to add description after forums titles on forum index
function rw_singleforum_description() {
  echo '<div class="bbp-forum-content">';
  echo bbp_forum_content();
  echo '</div>';
}
add_action( 'bbp_template_before_single_forum' , 'rw_singleforum_description');


//ADD DROPDOWN TO USER PROFILE THAT DISPLAYS STATES
/*add_filter( 'user_meta_field_config', 'user_meta_field_config_populate_categories', 10, 3 );
function user_meta_field_config_populate_categories( $field, $fieldID, $formName){ 
	//get list of states
	$args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'orderby'          => 'title',
		'order'            => 'ASC',
		'post_type'        => 'State',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $args );

    if( $fieldID != '52') // This has to match the Field ID of the User Meta Dropdown
        return $field;
 	
    $output = null;
    $output .= 'other=Other,';
    foreach( $posts_array as $post ):
        $output .= $post->ID.'='.$post->post_title.',';
    endforeach;
    $output = ',' . trim( $output, ',' );
 
    $field['options'] = $output;
 
    return $field;
}	
*/

// change base of author pages- need to save permalinks to take effect
function wpa_82004(){
    global $wp_rewrite;
    $wp_rewrite->author_base = 'partner'; // or whatever
}
add_action('init','wpa_82004');

//List of admin email notification recipients
function changeUMPAdminEmail( $adminEmails ) {
    //return array( 'amberadvocate@ncjtc.org' );
    return array( 'brian@whitecap.io', 'david@whitecap.io', 'amberadvocate@ncjtc.org' );
}
add_filter( 'user_meta_admin_email_recipient', 'changeUMPAdminEmail' );	


add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});



function new_modify_user_table( $column ) {
    $column['state'] = 'State';
    //$column['xyz'] = 'XYZ';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'state' :
            return get_the_author_meta( 'state', $user_id );
            break;
        //case 'xyz' :
        //    return '';
        //    break;
        default:
    }
    return $val;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
