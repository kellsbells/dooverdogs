<?php
/****
 ** dod functions and definitions
 *
 ** @package dod
****/

define( 'ASSETS_VERSION', '1.0.0' );

if ( ! function_exists( 'dod_setup' ) ) :
/****
 ** Sets up theme defaults and registers support for various WordPress features.
 *
 ** Note that this function is hooked into the after_setup_theme hook, which
 ** runs before the init hook. The init hook is too late for some features, such
 ** as indicating support for post thumbnails.
****/
function dod_setup() {
	/*
	 ** Make theme available for translation.
	 ** Translations can be filed in the /languages/ directory.
	 ** If you're building a theme based on dod, use a find and replace
	 ** to change 'dod' to the name of your theme in all the template files
	****/
	load_theme_textdomain( 'dod', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	// Allow shortcodes in Contact Form 7
	// */
	function shortcodes_in_cf7( $form ) {
		$form = do_shortcode( $form );
		return $form;
	}
	add_filter( ‘wpcf7_form_elements’, ‘shortcodes_in_cf7’ );

		

	/*
	 ** Let WordPress manage the document title.
	 ** By adding theme support, we declare that this theme does not use a
	 ** hard-coded <title> tag in the document head, and expect WordPress to
	 ** provide it for us.
	****/
	add_theme_support( 'title-tag' );

	add_image_size( 'square', 300, 300, true );
	add_image_size( 'hero', 900, 300, true );

	/*
	 ** Enable support for Post Thumbnails on posts and pages.
	 *
	 ** @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	****/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dod' ),
	) );

	/*
	 ** Switch default core markup for search form, comment form, and comments
	 ** to output valid HTML5.
	****/
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 ** Enable support for Post Formats.
	 ** See http://codex.wordpress.org/Post_Formats
	****/
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dod_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // dod_setup
add_action( 'after_setup_theme', 'dod_setup' );

/****
 ** Set the content width in pixels, based on the theme's design and stylesheet.
 *
 ** Priority 0 to make it available to lower priority callbacks.
 *
 ** @global int $content_width
****/
function dod_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dod_content_width', 640 );
}
add_action( 'after_setup_theme', 'dod_content_width', 0 );

/****
 ** Register widget area.
 *
 ** @link http://codex.wordpress.org/Function_Reference/register_sidebar
****/
function dod_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dod' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'dod_widgets_init' );



function cmb2_output_file_list( $file_list_meta_key, $img_size = 'square' ) {

	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

	echo '<div class="file-list-wrap">';
	// Loop through them and output an image

	$index = 0;

	foreach ( (array) $files as $attachment_id => $attachment_url ) {
		if($index == 0) {
			echo '<div class="file-list-image active">';
		} else {
			echo '<div class="file-list-image">';
		}

		echo wp_get_attachment_image( $attachment_id, $img_size );
		echo '</div>';
		$index++;
	}

	echo '</div>';
}





/****
 ** Enqueue scripts and styles.
****/
function dod_scripts() {
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/vendor/modernizr/modernizr.js', array(), '2.8.3', false );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/vendor/waypoints/lib/jquery.waypoints.min.js', array( 'jquery' ), '2.8.3', false );
	wp_enqueue_script( 'waypoints-inview', get_template_directory_uri() . '/assets/vendor/waypoints/lib/shortcuts/inview.min.js', array( 'jquery' ), '2.8.3', false );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array( 'jquery' ), '2.8.3', false );




	wp_enqueue_style( 'dod-style-dev', get_stylesheet_directory_uri() . '/assets/build/styles.css', array(), ASSETS_VERSION );
		wp_enqueue_script( 'dod-scripts-dev', get_template_directory_uri() . '/assets/build/scripts.js', array( 'modernizr', 'jquery', 'waypoints', 'slick'), ASSETS_VERSION, true );

	// if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {


		
	// 	// wp_enqueue_style( 'dod-style-dev', get_stylesheet_directory_uri() . '/assets/scss/styles.css', array(), ASSETS_VERSION );
	// 	// wp_enqueue_script( 'dod-scripts-dev', get_template_directory_uri() . '/assets/js/scripts.js', array( 'modernizr', 'jquery', 'waypoints', 'slick'), ASSETS_VERSION, true );




		

	// 	wp_enqueue_style( 'dod-style-dev', get_stylesheet_directory_uri() . '/assets/build/styles.css', array(), ASSETS_VERSION );
	// 	wp_enqueue_script( 'dod-scripts-dev', get_template_directory_uri() . '/assets/build/scripts.js', array( 'modernizr', 'jquery', 'waypoints', 'slick'), ASSETS_VERSION, true );
	// } else {
	// 	wp_enqueue_style( 'dod-style', get_template_directory_uri() . '/assets/dist/styles.min.css', array(), ASSETS_VERSION );
	// 	wp_enqueue_script( 'dod-scripts', get_template_directory_uri() . '/assets/dist/scripts.min.js', array( 'modernizr', 'jquery', 'waypoints', 'slick'), ASSETS_VERSION, true );
	// }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dod_scripts' );

/****
 ** Implement the Custom Header feature. 
****/
require get_template_directory() . '/inc/custom-header.php';

/****
 ** Custom template tags for this theme.
****/
require get_template_directory() . '/inc/template-tags.php';

/****
 ** Custom functions that act independently of the theme templates.
****/
require get_template_directory() . '/inc/extras.php';

/****
 ** Customizer additions.
****/
require get_template_directory() . '/inc/customizer.php';

/****
 ** Load Jetpack compatibility file.
****/
require get_template_directory() . '/inc/jetpack.php';

/****
 ** Implement the Custom Data.
****/
require get_template_directory() . '/inc/custom-data.php';

/****
 ** Hide admin bar
****/
show_admin_bar( false );
