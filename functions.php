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
// A3.1
//add_action( 'customize_preview_init', 'lunar_customizer_live_preview' );
// A4
add_action( 'widgets_init',             'lunar_theme_widgets_init' );
// A5
add_action( 'lunar_excerpt_inloop', 'lunar_excerpt_inloop_render' );

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
		
		add_theme_support( 'post-thumbnails', array( 'post', 'page') );
		// register new phone-landscape featured image size. @width, @height, and @crop
		add_image_size( 'lunar-featured', 480, 320, false);   
		//add_theme_support( 'automatic-feed-links' ); // rss feederz
		/*
		 * Enable support for custom logo.
		 *
		 *  @since Classic Sixteen 1.2
		 */
		add_theme_support( 'custom-logo' );

		//page background image and color support
		add_theme_support( 'custom-background', 
			array( 
		       'default-color'      => '#fefefe',
		       'default-image'       => '',
		       'wp-head-callback'     => '_custom_background_cb',
		       'admin-head-callback'   => '',
		       'admin-preview-callback' => ''
		    ) 
		);
		add_theme_support( 'custom-logo' );

		
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
function lunar_theme_content_width() 
{
	$GLOBALS['content_width'] = apply_filters( 'lunar_content_width', 480 );
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
    wp_enqueue_script( 
		'lunar-script', 
		get_template_directory_uri() . '/rels/lunar-scripts.js', 
		array(), 
		LUNAR_VER, 
		true 
	);
	
}

/** 3.1
 * Registers the Theme Customizer Preview JavaScript with WordPress.
 *
 * @since 1.0.0
 */


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
			'name'          => __( 'Footer Section One', 'lunar' ),
			'id'            => 'footer-one',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'lunar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Section Two', 'lunar' ),
			'id'            => 'footer-two',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'lunar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => __( 'Footer Section Three', 'lunar' ),
			'id'            => 'footer-three',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'lunar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
} 


/**
 * Support for logo upload, output. 
 *
 * @since 1.0.1 
 */
function lunar_theme_custom_logo() {
    $output = '';

    if ( function_exists( 'the_custom_logo' ) ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo           = wp_get_attachment_image_src( $custom_logo_id , 'full' );

        if ( has_custom_logo() ) {
            $output = '<div class="header-logo"><img src="'. esc_url( $logo[0] ) .'" 
            alt="'. get_bloginfo( 'name' ) .'"></div>'; 
        } else { 
            $output = ''; 
        }
    }

        // Output sanitized in header to assure all html displays.
        return $output;
}

/**
 * Strip content to only display x number of characters
 *
 * @since 1.0.0
 */
function lunar_excerpt_inloop_render()
{
    $charas = '300';
    $article_data = substr( get_the_content(), 0, $charas );
    echo esc_html( wp_strip_all_tags( $article_data ) );
}

