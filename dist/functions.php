<?php
/**
 * Flat initiation
 *
 * Initializes Flat's features and includes all necessary files.
 *
 * @package Flat
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	die( 'Direct access of this file is prohibited. Thank you.' );
}

require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/hooks.php';
require get_template_directory() . '/inc/template-tags.php';

/**
 * Set the content width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 720;
}

if ( ! function_exists( 'flat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function flat_setup() {
		load_theme_textdomain( 'flat', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'flat' ) );
		add_theme_support( 'post-thumbnails' );
		add_filter( 'use_default_gallery_style', '__return_false' );

		add_editor_style( array( 'assets/css/editor-style.css' ) );

		add_theme_support( 'title-tag' );
		add_theme_support( 'tha-hooks', array( 'all' ) );

		$custom_background_support = array(
			'default-color'          => '',
			'default-image'          => get_template_directory_uri() . '/assets/img/default-background.jpg',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $custom_background_support );

		# Add default theme blocks
		add_action( 'flat_html_before', 'flat_doctype' );
		add_action( 'flat_404_content', 'flat_output_404_content' );
	}
endif;
add_action( 'after_setup_theme', 'flat_setup' );

if ( ! function_exists( 'flat_widgets_init' ) ) :
	/**
	 * Registers our sidebar with WordPress
	 */
	function flat_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Main Widget Area', 'flat' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears in the sidebar section of the site', 'flat' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
endif;
add_action( 'widgets_init', 'flat_widgets_init' );

if ( ! function_exists( 'flat_scripts_styles' ) ) :
	/**
	 * Sets up necessary scripts and styles
	 */
	function flat_scripts_styles() {
		global $wp_version;

		$version = wp_get_theme()->get( 'Version' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
			$assets = array(
				'css' => '/assets/css/flat.css',
				'js'  => '/assets/js/flat.js',
			);
		} else {
			$assets = array(
				'css' => '/assets/css/flat.min.css',
				'js'  => '/assets/js/flat.min.js',
			);
		}

		wp_enqueue_style( 'flat-fonts', flat_fonts_url(), array(), null );
		wp_enqueue_style( 'flat-theme', get_template_directory_uri() . $assets['css'], array(), $version );
		wp_enqueue_style( 'flat-style', get_stylesheet_uri(), array(), $version );
		wp_enqueue_script( 'flat-js', get_template_directory_uri() . $assets['js'], array( 'jquery' ), $version, false );

		# If the `script_loader_tag` filter is unavailable, this script will be added via the `wp_head` hook
		if ( version_compare( '4.1', $wp_version, '<=' ) ) {
			wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.2', false );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' );

# The following function uses a filter introduced in WP 4.1
if ( version_compare( '4.1', $wp_version, '<=' ) ) :
	if ( ! function_exists( 'flat_filter_scripts' ) ) :
		/**
		 * Filters enqueued script output to better suit Flat's needs
		 */
		function flat_filter_scripts( $tag, $handle, $src ) {
			# Remove `type` attribute (unneeded in HTML5)
			$tag = str_replace( ' type=\'text/javascript\'', '', $tag );

			# Apply conditionals to html5shiv for legacy IE
			if ( 'html5shiv' === $handle ) {
				$tag = "<!--[if lt IE 9]>\n$tag<![endif]-->\n";
			}

			return $tag;
		}
	endif;
	add_filter( 'script_loader_tag', 'flat_filter_scripts', 10, 3 );
else : # If the `script_loader_tag` filter is unavailable...
	/**
	 * Adds html5shiv the "old" way (WP < 4.1)
	 */
	function flat_add_html5shiv() {
		echo "<!--[if lt IE 9]>\n<scr" . 'ipt src="' . esc_url( get_template_directory_uri() ) . '/assets/js/html5shiv.min.js"></scr' . "ipt>\n<![endif]-->";
	}
	add_action( 'wp_head', 'flat_add_html5shiv' );
endif;

if ( ! function_exists( 'flat_tha_support' ) ) :
	/**
	 * Allows support for Theme Hook Alliance hooks to be checked by plugins/customizers
	 */
	function flat_tha_support() {
		return true;
	}
endif;
add_filter( 'current_theme_supports-tha_hooks', 'flat_tha_support' );


add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
	return '<a class="btn btn-default btn-sm" href="' . get_permalink() . '">'.__( 'Continue reading', 'flat' ).' &#62;&#62;</a>';
}
