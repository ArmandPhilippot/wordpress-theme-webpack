<?php
/**
 * Your-Package-Name functions and definitions.
 *
 * This file is read by WordPress to setup the theme and his additional
 * features.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package   Your-Package-Name
 * @author    Firstname Lastname <your@email.com>
 * @copyright 2021 Company Name
 * @license   GPL-2.0-or-later
 * @since     0.1.0
 */

/**
 * Currently theme version.
 */
define( 'YOURPREFIX_VERSION', '0.1.0' );

/**
 * Get current environment defined in .env file.
 *
 * @since 0.1.0
 *
 * @return string Current env or empty string.
 */
function yourprefix_get_current_env() {
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require_once __DIR__ . '/vendor/autoload.php';
		$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
		$dotenv->safeLoad();
		$current_env = $_ENV['WP_THEME_ENV'];
		return $current_env;
	} else {
		return '';
	}
}

if ( ! function_exists( 'yourprefix_setup' ) ) {
	/**
	 * Setup Your-Package-Name theme and registers support for various WordPress features.
	 *
	 * @since 0.1.0
	 */
	function yourprefix_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'yourTextDomain', get_template_directory() . '/languages' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 150,
				'height'      => 150,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		$editor_css_path = get_template_directory() . '/assets/css/editor-style.css';
		add_editor_style( $editor_css_path );

		// Switch default core markup to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'navigation-widgets',
				'script',
				'search-form',
				'style',
			)
		);

		// Add post-formats support.
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'audio',
				'chat',
				'gallery',
				'image',
				'link',
				'quote',
				'status',
				'video',
			)
		);

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Register custom menu.
		register_nav_menus(
			array(
				'main-menu'   => __( 'Main menu', 'yourTextDomain' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'yourprefix_setup' );

/**
 * Register and enqueue styles.
 *
 * @since 0.1.0
 */
function yourprefix_enqueue_styles() {
	$current_env = yourprefix_get_current_env();
	$style_path  = get_template_directory() . '/style.css';
	$style_uri   = get_template_directory_uri() . '/style.css';
	$print_path  = get_template_directory() . '/assets/css/print.css';
	$print_uri   = get_template_directory_uri() . '/assets/css/print.css';

	if ( 'development' !== $current_env ) {
		if ( file_exists( $style_path ) ) {
			wp_register_style( 'yourprefix-style', $style_uri, array(), YOURPREFIX_VERSION );
			wp_enqueue_style( 'yourprefix-style' );
			wp_style_add_data( 'yourprefix-style', 'rtl', 'replace' );
		}

		if ( file_exists( $print_path ) ) {
			wp_register_style( 'yourprefix-style-print', $print_uri, array(), YOURPREFIX_VERSION );
			wp_enqueue_style( 'yourprefix-style-print' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'yourprefix_enqueue_styles' );

/**
 * Register and enqueue scripts.
 *
 * @since 0.1.0
 */
function yourprefix_enqueue_scripts() {
	$current_env          = yourprefix_get_current_env();
	$webpack_runtime_path = get_template_directory() . '/assets/webpack/runtime.js';
	$webpack_runtime_uri  = get_template_directory_uri() . '/assets/webpack/runtime.js';
	$footer_scripts_path  = get_template_directory() . '/assets/js/footer.js';
	$footer_scripts_uri   = get_template_directory_uri() . '/assets/js/footer.js';
	$header_scripts_path  = get_template_directory() . '/assets/js/header.js';
	$header_scripts_uri   = get_template_directory_uri() . '/assets/js/header.js';

	if ( file_exists( $webpack_runtime_path ) ) {
		wp_register_script( 'yourprefix-webpack-runtime', $webpack_runtime_uri, array(), YOURPREFIX_VERSION, true );
		wp_enqueue_script( 'yourprefix-webpack-runtime' );
	}

	if ( file_exists( $footer_scripts_path ) ) {
		wp_register_script( 'yourprefix-footer', $footer_scripts_uri, array(), YOURPREFIX_VERSION, true );
		wp_enqueue_script( 'yourprefix-footer' );
	}

	if ( file_exists( $header_scripts_path ) ) {
		wp_register_script( 'yourprefix-header', $header_scripts_uri, array(), YOURPREFIX_VERSION, false );
		wp_enqueue_script( 'yourprefix-header' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( 'development' === $current_env ) {
		$webpack_style_path = get_template_directory() . '/assets/webpack/style.js';
		$webpack_style_uri  = get_template_directory_uri() . '/assets/webpack/style.js';
		$webpack_print_path = get_template_directory() . '/assets/webpack/print.js';
		$webpack_print_uri  = get_template_directory_uri() . '/assets/webpack/print.js';

		if ( file_exists( $webpack_style_path ) ) {
			wp_register_script( 'yourprefix-webpack-style', $webpack_style_uri, array(), YOURPREFIX_VERSION, true );
			wp_enqueue_script( 'yourprefix-webpack-style' );
		}

		if ( file_exists( $webpack_print_path ) ) {
			wp_register_script( 'yourprefix-webpack-print', $webpack_print_uri, array(), YOURPREFIX_VERSION, true );
			wp_enqueue_script( 'yourprefix-webpack-print' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'yourprefix_enqueue_scripts' );

/**
 * Register and enqueue editor assets.
 *
 * @since 0.1.0
 */
function yourprefix_enqueue_editor_assets() {
	$current_env         = yourprefix_get_current_env();
	$editor_scripts_path = get_template_directory() . '/assets/js/editor.js';
	$editor_scripts_uri  = get_template_directory_uri() . '/assets/js/editor.js';

	if ( file_exists( $editor_scripts_path ) ) {
		wp_register_style( 'yourprefix-editor', $editor_scripts_uri, array(), YOURPREFIX_VERSION, true );
		wp_enqueue_style( 'yourprefix-editor' );
	}

	if ( 'development' === $current_env ) {
		$webpack_editor_path = get_template_directory() . '/assets/webpack/editor-style.js';
		$webpack_editor_uri  = get_template_directory_uri() . '/assets/webpack/editor-style.js';

		if ( file_exists( $webpack_editor_path ) ) {
			wp_register_script( 'yourprefix-webpack-editor', $webpack_editor_uri, array(), YOURPREFIX_VERSION, true );
			wp_enqueue_script( 'yourprefix-webpack-editor' );
		}
	}
}
add_action( 'enqueue_block_editor_assets', 'yourprefix_enqueue_editor_assets' );

/**
 * Register sidebars.
 *
 * @since 0.1.0
 */
function yourprefix_widgets_init() {
	if ( function_exists( 'register_sidebar' ) ) {
		register_sidebar(
			array(
				'name'          => __( 'Blog sidebar', 'yourTextDomain' ),
				'id'            => 'sidebar__blog',
				'description'   => __( 'Add widgets here to appear in your blog sidebar.', 'yourTextDomain' ),
				'before_title'  => '<h2 class="widget__title">',
				'after_title'   => '</h2>',
				'before_widget' => '<div id="%1s" class="widget %2s">',
				'after_widget'  => '</div>',
			)
		);
	}
}
add_action( 'widgets_init', 'yourprefix_widgets_init' );

/**
 * REQUIRED FILES
 * Additional features and helpers functions.
 */
require get_parent_theme_file_path( '/inc/helpers.php' );
require get_parent_theme_file_path( '/inc/hooks.php' );
