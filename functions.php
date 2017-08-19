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
} 


/**
 * Enqueue scripts and styles.
 */
function amberadvocate_scripts() {

	wp_enqueue_style('font-awesome',get_template_directory_uri().'/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('bootstrap-theme.min',get_template_directory_uri().'/css/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'amberadvocate-style', get_stylesheet_uri() );

	/*wp_enqueue_script( 'amberadvocate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );*/
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'amberadvocate-global', get_template_directory_uri() . '/js/amberadvocate.js', array(), '20170811', true );


	wp_enqueue_script( 'amberadvocate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amberadvocate_scripts' );


/**
 * META BOXES
 */
add_filter( 'rwmb_meta_boxes', 'tribal_register_meta_boxes' );
function tribal_register_meta_boxes( $meta_boxes ) {
    
    
    // Get the users to display in the Admin Contact select box
    $tribalusers = get_users( 'blog_id=1&orderby=nicename&role=member' );
    // Array of WP_User objects.
    $tribal_admin = array();    
    foreach ( $tribalusers as $tribaluser ) $tribal_admin[$tribaluser->user_nicename] = $tribaluser->user_firstname . ' ' . $tribaluser->user_lastname;  
    
    
    $prefix = 'amber_';
    // Add Meta Boxes For Attached Documents (note: this applies to all images, pdfs, doc, and excel files)
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => __( 'Document Details', 'tribal' ),
        'post_types' => array( 'attachment' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
			// HEADLINE TEXT
			array(
				'name' => __( 'File Name', 'tribal' ),
				'id'   => "{$prefix}textarea1",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// SUBHEAD TEXT
			array(
				'name' => __( 'Submitted By', 'tribal' ),
				'id'   => "{$prefix}textarea2",
				'type' => 'textarea',
				'cols' => 10,
				'rows' => 1,
			),
			// DESCRIPTION TEXT
			array(
				'name' => __( 'Submittion Date', 'tribal' ),
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
    // META BOXES FOR ORGANIZATION CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'State Details', 'tribal' ),
        'post_types' => 'State',
        'fields'     => array(
			// TEXT
			array(
				'name' => __( 'Primary Phone', $prefix ),
				'id'   => "{$prefix}primary_phone",
				'type' => 'text',
			),
			// TEXT
			array(
				'name' => __( 'Secondary Phone', $prefix ),
				'id'   => "{$prefix}secondary_phone",
				'type' => 'text',
			),
			// TEXT
			array(
				'name' => __( 'Fax', $prefix ),
				'id'   => "{$prefix}fax",
				'type' => 'text',
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'Region', $prefix ),
				'id'          => "{$prefix}region",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'Alaska' => esc_html__( 'Alaska', $prefix ),
                    'Eastern' => esc_html__( 'Eastern', $prefix ),
                    'Eastern Oklahoma' => esc_html__( 'Eastern Oklahoma', $prefix ),
                    'Great Plains' => esc_html__( 'Great Plains', $prefix ),
                    'Midwest' => esc_html__( 'Midwest', $prefix ),
                    'Navajo' => esc_html__( 'Navajo', $prefix ),
                    'Northwest' => esc_html__( 'Northwest', $prefix ),
                    'Pacific' => esc_html__( 'Pacific', $prefix ),
					'Southern Plains' => esc_html__( 'Southern Plains', $prefix ),
					'Southwest' => esc_html__( 'Southwest', $prefix ),
					'Rocky Mountain' => esc_html__( 'Rocky Mountain', $prefix ),
                    'Western' => esc_html__( 'Western', $prefix ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select a Region', $prefix ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Address 1', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}address_1",
				'type'  => 'text',
                'attributes' => array(
                    'size' => '50',
                ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Address 2', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}address_2",
				'type'  => 'text',
                'attributes' => array(
                    'size' => '50',
                ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'City', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}city",
				'type'  => 'text',
			),
			// SELECT BOX
			array(
				'name'        => esc_html__( 'State', $prefix ),
				'id'          => "{$prefix}state",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'AL' => esc_html__( 'Alabama', $prefix ),
                    'AK' => esc_html__( 'Alaska', $prefix ),
                    'AZ' => esc_html__( 'Arizona', $prefix ),
                    'AR' => esc_html__( 'Arkansas', $prefix ),
                    'CA' => esc_html__( 'California', $prefix ),
                    'CO' => esc_html__( 'Colorado', $prefix ),
                    'CT' => esc_html__( 'Connecticut', $prefix ),
                    'DE' => esc_html__( 'Delaware', $prefix ),
                    'DC' => esc_html__( 'District Of Columbia', $prefix ),
                    'FL' => esc_html__( 'Florida', $prefix ),
                    'GA' => esc_html__( 'Georgia', $prefix ),
                    'HI' => esc_html__( 'Hawaii', $prefix ),
                    'ID' => esc_html__( 'Idaho', $prefix ),
                    'IL' => esc_html__( 'Illinois', $prefix ),
                    'IN' => esc_html__( 'Indiana', $prefix ),
                    'IA' => esc_html__( 'Iowa', $prefix ),
                    'KS' => esc_html__( 'Kansas', $prefix ),
                    'KY' => esc_html__( 'Kentucky', $prefix ),
                    'LA' => esc_html__( 'Louisiana', $prefix ),
                    'ME' => esc_html__( 'Maine', $prefix ),
                    'MD' => esc_html__( 'Maryland', $prefix ),
                    'MA' => esc_html__( 'Massachusetts', $prefix ),
                    'MI' => esc_html__( 'Michigan', $prefix ),
                    'MN' => esc_html__( 'Minnesota', $prefix ),
                    'MS' => esc_html__( 'Mississippi', $prefix ),
                    'MO' => esc_html__( 'Missouri', $prefix ),
                    'MT' => esc_html__( 'Montana', $prefix ),
                    'NE' => esc_html__( 'Nebraska', $prefix ),
                    'NV' => esc_html__( 'Nevada', $prefix ),
                    'NH' => esc_html__( 'New Hampshire', $prefix ),
                    'NJ' => esc_html__( 'New Jersey', $prefix ),
                    'NM' => esc_html__( 'New Mexico', $prefix ),
                    'NY' => esc_html__( 'New York', $prefix ),
                    'NC' => esc_html__( 'North Carolina', $prefix ),
                    'ND' => esc_html__( 'North Dakota', $prefix ),
                    'OH' => esc_html__( 'Ohio', $prefix ),
                    'OK' => esc_html__( 'Oklahoma', $prefix ),
                    'OR' => esc_html__( 'Oregon', $prefix ),
                    'PA' => esc_html__( 'Pennsylvania', $prefix ),
                    'RI' => esc_html__( 'Rhode Island', $prefix ),
                    'SC' => esc_html__( 'South Carolina', $prefix ),
                    'SD' => esc_html__( 'South Dakota', $prefix ),
                    'TN' => esc_html__( 'Tennessee', $prefix ),
                    'TX' => esc_html__( 'Texas', $prefix ),
                    'UT' => esc_html__( 'Utah', $prefix ),
                    'VT' => esc_html__( 'Vermont', $prefix ),
                    'VA' => esc_html__( 'Virginia', $prefix ),
                    'WA' => esc_html__( 'Washington', $prefix ),
                    'WV' => esc_html__( 'West Virginia', $prefix ),
                    'WI' => esc_html__( 'Wisconsin', $prefix ),
                    'WY' => esc_html__( 'Wyoming', $prefix ),                    
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select a State', $prefix ),
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Zip', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}zip",
				'type'  => 'text',
			),
			// TEXT
			array(
				'name'  => esc_html__( 'Website', $prefix ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}website",
				'type'  => 'text',
			),
        )
    );
    // ALLOW ATTACHMENT OF FILES TO ORGANIZATION CUSTOM POST TYPE
    $meta_boxes[] = array(
        'title'      => __( 'Assessments & Attached Files', 'tribal' ),
        'post_types' => 'State',
        'fields'     => array(
            // FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Upload', 'tribal' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
        )
    );
    return $meta_boxes;
}

//ADD DROPDOWN TO USER PROFILE THAT DISPLAYS STATES
add_filter( 'user_meta_field_config', 'user_meta_field_config_populate_categories', 10, 3 );
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

    if( $fieldID != '14') // This has to match the Field ID of the User Meta Dropdown
        return $field;
 	
    $output = null;
    $output .= 'other=Other,';
    foreach( $posts_array as $post ):
        $output .= $post->ID.'='.$post->post_name.',';
    endforeach;
    $output = ',' . trim( $output, ',' );
 
    $field['options'] = $output;
 
    return $field;
}	

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
