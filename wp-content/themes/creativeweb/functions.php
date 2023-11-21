<?php
/**
 * creativeweb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creativeweb
 */

function creativeweb_enqueue_scripts(){
    wp_enqueue_style('creative-general', get_template_directory_uri().'/assets/css/general.css', array(), '1.0', 'all');
	
	wp_enqueue_script('creative-script',get_template_directory_uri().'/assets/js/script.js', array(), '1.0', true);
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

	// wp_register_style();
	// wp_register_script();
	
}
add_action('wp_enqueue_scripts', 'creativeweb_enqueue_scripts' );


function creativeweb_theme_init(){
	register_nav_menus(array(
		'header_nav' => 'Header Navigation',
		'footer_nav' => 'Footer Navigation'
	));
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	load_theme_textdomain( 'creativeweb', get_template_directory() . '/languages' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'post-formats', 
	array(
        'video',
		'quote',
		'image',
		'gallery',
	)
	);
	add_post_type_support('car', 'post-formats');
}
add_action('after_setup_theme', 'creativeweb_theme_init', 0 );

function creativeweb_custom_search($form) {
	$form = "html for form";
	return $form;
}
add_filter('get_search_form', 'creativeweb_custom_search');

function creativeweb_register_post_type() {
$args = array(
    'hierarchical' => false,
	'labels' => array(
		'name'              => esc_html_x( 'Brands', 'taxonomy general name', 'creativeweb' ),
		'singular_name'     => esc_html_x( 'Brand', 'taxonomy singular name', 'creativeweb'' ),
		'search_items'      => esc_html__( 'Search Brands', 'creativeweb' ),
		'all_items'         => esc_html__( 'All Brands', 'creativeweb' ),
		'parent_item'       => esc_html__( 'Parent Brand', 'creativeweb' ),
		'parent_item_colon' => esc_html__( 'Parent Brand:', 'creativeweb' ),
		'edit_item'         => esc_html__( 'Edit Brand', 'creativeweb' ),
		'update_item'       => esc_html__( 'Update Brand', 'creativeweb' ),
		'add_new_item'      => esc_html__( 'New Brand Name', 'creativeweb'' ),
		'menu_name'         => esc_html__( 'Brand', 'creativeweb' ),
	),
	'show_ui' => true,
	'rewrite' => array('slug' => 'brands'),
	'query_var' => true,
	'show_in_rest' => true,
);

	register_taxonomy('brand', array('car'), $args);

	unset($args);




	$args = array(
		'hierarchical' => true,
		'labels' => array(
			'name'              => esc_html_x( 'Manufactures', 'taxonomy general name', 'creativeweb' ),
			'singular_name'     => esc_html_x( 'Manufacture', 'taxonomy singular name', 'creativeweb' ),
			'search_items'      => esc_html__( 'Search Manufactures', 'creativeweb' ),
			'all_items'         => esc_html__( 'All Manufactures', 'creativeweb' ),
			'parent_item'       => esc_html__( 'Parent Manufacture', 'creativeweb' ),
			'parent_item_colon' => esc_html__( 'Parent Manufacture:', 'creativeweb' ),
			'edit_item'         => esc_html__( 'Edit Manufacture', 'creativeweb' ),
			'update_item'       => esc_html__( 'Update Manufacture', 'creativeweb' ),
			'add_new_item'      => esc_html__( 'New Manufacture Name', 'creativeweb' ),
			'menu_name'         => esc_html__( 'Manufacture', 'creativeweb' ),
			
		),
		'show_ui' => true,
		'rewrite' => array('slug' => 'manufacture'),
		'query_var' => true,
		'show_in_rest' => true,
	);
	
		register_taxonomy('manufacture', array('car'), $args);
	
		unset($args);
	

	
  $args = array(
	'label' => esc_html__('Cars', 'creativeweb'),
	 'labels' => array(
		'name'                  => esc_html_x( 'Cars', 'Post type general name', 'creativeweb' ),
		'singular_name'         => esc_html_x( 'Car', 'Post type singular name', 'creativeweb' ),
		'menu_name'             => esc_html_x( 'Cars', 'Admin Menu text', 'creativeweb' ),
		'name_admin_bar'        => esc_html_x( 'Car', 'Add New on Toolbar', 'creativeweb' ),
		'add_new'               => esc_html__( 'Add New', 'creativeweb' ),
		'add_new_item'          => esc_html__( 'Add New Car', 'creativeweb' ),
		'new_item'              => esc_html__( 'New Car', 'creativeweb' ),
		'edit_item'             => esc_html__( 'Edit Car', 'creativeweb' ),
		'view_item'             => esc_html__( 'View Car', 'creativeweb' ),
		'all_items'             => esc_html__( 'All Cars', 'creativeweb' ),
		'search_items'          => esc_html__( 'Search Cars', 'creativeweb' ),
		'parent_item_colon'     => esc_html__( 'Parent Cars:', 'creativeweb' ),
		'not_found'             => esc_html__( 'No Cars found.', 'creativeweb' ),
		'not_found_in_trash'    => esc_html__( 'No Cars found in Trash.', 'creativeweb' ),
		'featured_image'        => esc_html_x( 'Car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'creativeweb' ),
		'set_featured_image'    => esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'creativeweb' ),
		'remove_featured_image' => esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'creativeweb' ),
		'use_featured_image'    => esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'creativeweb' ),
		'archives'              => esc_html_x( 'Car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'creativeweb' ),
		'insert_into_item'      => esc_html_x( 'Insert into Car', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'creativeweb' ),
		'uploaded_to_this_item' => esc_html_x( 'Uploaded to this Car', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'creativeweb' ),
		'filter_items_list'     => esc_html_x( 'Filter Cars list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'creativeweb' ),
		'items_list_navigation' => esc_html_x( 'Cars list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'creativeweb' ),
		'items_list'            => esc_html_x( 'Cars list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'creativeweb' ),
	 ), 
	 'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'trackbacks', 'page-attributes', 'post-formats'),
	 'public' => true,
	 'publicly_queryable' => true,
	 'show_ui' => true,
	 'show_in_menu' => true,
	 'has_archive' => true,
	  'rewrite' => array('slug' => 'cars'),
	  'show_in_rest' => true,
	);	
  register_post_type('car', $args);
}
add_action('init', 'creativeweb_register_post_type');

function creativeweb_rewrite_rules() {
	creativeweb_register_post_type();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'creativeweb_rewrite_rules');













if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function creativeweb_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on creativeweb, use a find and replace
		* to change 'creativeweb' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'creativeweb', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'creativeweb' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'creativeweb_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'creativeweb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creativeweb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creativeweb_content_width', 640 );
}
add_action( 'after_setup_theme', 'creativeweb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creativeweb_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'creativeweb' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'creativeweb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'creativeweb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creativeweb_scripts() {
	wp_enqueue_style( 'creativeweb-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'creativeweb-style', 'rtl', 'replace' );

	wp_enqueue_script( 'creativeweb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creativeweb_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

