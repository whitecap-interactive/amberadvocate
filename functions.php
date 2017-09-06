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
        'taxonomies' => array('category', 'post_tag'),
        /*'show_in_nav_menus' => true*/
		)
	);
} 
/**
 * Change the post type labels
 */
function change_post_type_labels() {
  global $wp_post_types;

  // Get the post labels
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
}
add_action( 'init', 'change_post_type_labels' );

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
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
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
