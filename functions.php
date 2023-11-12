<?php
/**
 * Lunar functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lunar
 * @since 1.0.0
 */
if ( !defined ( 'LUNAR_VER' ) ) { define ( 'LUNAR_VER', time() ); }
// FAST LOADER References ( find @#id in DocBlocks )
// ------------------------- Actions ---------------------------
// A1
add_action( 'after_setup_theme',        'lunar_theme_setup' );
// A2
add_action( 'after_setup_theme',        'lunar_theme_content_width', 0 );
// A3
add_action( 'wp_enqueue_scripts',       'lunar_theme_enqueue_styles' );
// A4
add_action( 'widgets_init',             'lunar_theme_widgets_init' );

/**
 * Add backwards compatibility support for wp_body_open function.
 */
if ( ! function_exists( 'wp_body_open' ) ) 
{
    
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/** #A1
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own lunar_setup() function to override in a child theme.
 *
 * @since Classic Sixteen 1.0
 */
if ( ! function_exists( 'lunar_theme_setup' ) ) :

	function lunar_theme_setup() 
	{
		/*
		* Make theme available for translation.
		* Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
		* If you're building a theme based on lunar, use a find and replace
		* to change 'lunar' to the name of your theme in all the template files
		*/
		load_theme_textdomain( 'lunar', get_template_directory_uri() . '/languages' );
        /*
		 * Let ClassicPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Main Menu', 'lunar' ),
			)
		);
	}
endif;

/** #A2
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Classic Sixteen 1.0
 */
function solo_theme_content_width() 
{
	$GLOBALS['content_width'] = apply_filters( 'lunar_content_width', 640 );
}
	
	/** #A3
 * Enqueues scripts and styles.
 *
 * @since Classic Sixteen 1.0
 */
function lunar_theme_enqueue_styles() 
{
	wp_enqueue_style( 'lunar', get_stylesheet_uri(), array(), LUNAR_VER );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 
			'comment-reply' 
		);
    }
}
/** #A4
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Classic Sixteen 1.0
 */
function lunar_theme_widgets_init() 
{
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'lunar' ),
			'id'            => 'sidebar-page',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'lunar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer Section One', 'solo' ),
			'id'            => 'footer-one',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'solo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Section Two', 'solo' ),
			'id'            => 'footer-two',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'solo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => __( 'Footer Section Three', 'solo' ),
			'id'            => 'footer-three',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'solo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
} 

