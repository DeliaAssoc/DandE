<?php
/**
 * D and E Consulting functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package D_and_E_Consulting
 */

if ( ! function_exists( 'dae_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dae_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on D and E Consulting, use a find and replace
		 * to change 'dae' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dae', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'dae' ),
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
		add_theme_support( 'custom-background', apply_filters( 'dae_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'dae_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dae_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dae_content_width', 640 );
}
add_action( 'after_setup_theme', 'dae_content_width', 0 );

/**
 * Widget Sidebars.
 */
function dae_sidebars() {

	$args = array(
		'id'            => 'footer_menu',
		'class'         => 'footer-menu',
		'name'          => __( 'Footer Menu Area', 'text_domain' ),
		'description'   => __( 'Right side of main footer area', 'text_domain' ),
		'before_title'  => ' ',
		'after_title'   => ' ',
		'before_widget' => ' ',
		'after_widget'  => ' ',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'dae_sidebars' );

/**
 * Enqueue scripts and styles.
 */
function dae_scripts() {

	// Add slick.css
	wp_enqueue_style( 'dae-slick-style', get_template_directory_uri() . '/css/slick.css' );

	// Add slick-theme.css
	wp_enqueue_style( 'dae-slicktheme-style', get_template_directory_uri() . '/css/slick-theme.css' );

	// Add font-awesome.css
	wp_enqueue_style( 'dae-fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'dae-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dae-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dae-custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	wp_enqueue_script( 'dae-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dae_scripts' );

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

/**
 * Hide admin Bar
 */
show_admin_bar(false);

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Recent Posts Options',
		'menu_title'	=> 'Recent Posts Options',
		'menu_slug' 	=> 'recent-posts-slider-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-admin-post',
		'position'		=> 5
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Contact Section Module',
		'menu_title'	=> 'Contact Section Module',
		'menu_slug' 	=> 'contact-section-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-email-alt',
		'position'		=> 15
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Client Slider Options',
		'menu_title'	=> 'Client Slider Options',
		'menu_slug' 	=> 'client-slider-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-id',
		'position'		=> 6
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials Slider Options',
		'menu_title'	=> 'Testimonials Slider Options',
		'menu_slug' 	=> 'testimonials-slider-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-testimonial',
		'position'		=> 8
	));

}