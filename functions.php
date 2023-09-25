<?php
/**
 * ktlc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ktlc
 */

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
function ktlc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ktlc, use a find and replace
		* to change 'ktlc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ktlc', get_template_directory() . '/languages' );

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
			'primary_menu' => esc_html__( 'Primary menu', 'ktlc' ),
			'top_menu'     => esc_html__( 'Top menu', 'ktlc' ),
			'footer_menu'  => esc_html__( 'Footer menu', 'ktlc' ),
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
			'ktlc_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 250,
			'width'                => 250,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ktlc_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ktlc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ktlc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ktlc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ktlc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ktlc_scripts() {
	// styles
    wp_enqueue_style( 'swiper-styles', get_template_directory_uri() . '/libraries/swiperjs/css/swiper-bundle.min.css', true );
    wp_enqueue_style( 'ktlc-main', get_template_directory_uri() . '/resources/dist/css/main.css', true );

	// scripts
	wp_enqueue_script( 'swiper-script', get_template_directory_uri() . '/libraries/swiperjs/js/swiper-bundle.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'gsap-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'gsap-ScrollTrigger-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/ScrollTrigger.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'ktlc-main-script', get_template_directory_uri() . '/resources/dist/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ktlc_scripts' );

/**
 * Include files
 */

require get_template_directory() . '/inc/template-functions.php';

require_once( get_template_directory() . '/inc/breadcrumbs.php' );

require_once( get_template_directory() . '/inc/carbon-fields.php');

require_once( get_template_directory() . '/inc/custom-post-types.php');

/**
 * Requires custom menu walkers.
 */
require_once 'inc/class-ktlc-walker-nav-menu-primary.php';

require_once 'inc/class-ktlc-walker-nav-menu-footer.php';

//====================================================================
// Add New Color Option in Existing Colors Section in Customizer
//====================================================================
 
function ktlc_customizer_add_colorPicker( $wp_customize ) {
	$wp_customize->add_setting( 'ktlc_theme_color', array(
		'default' => '#04bfbf',
	) );

	// Add Controls
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ktlc_theme_color', array(
		'label' => 'Theme Color',
		'section' => 'colors',
		'settings' => 'ktlc_theme_color'
	) ) );
}
add_action( 'customize_register', 'ktlc_customizer_add_colorPicker' );

function ktlc_generate_theme_option_css() {
    $themeColor = get_theme_mod('ktlc_theme_color');
 
    if ( ! empty( $themeColor ) ) :
		?>
		<style type="text/css" id="ktlc-theme-option-css">
			/* Define global colors */
			:root {
				--mainColor: <?php echo $themeColor; ?>;
			}
		</style>
		<?php
    endif;    
}
add_action( 'wp_head', 'ktlc_generate_theme_option_css' );