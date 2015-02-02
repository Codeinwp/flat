<?php
require get_template_directory() . '/inc/customize.php';

if ( ! isset( $content_width ) ) { $content_width = 720; }

if ( ! function_exists( 'flat_setup' ) ) :
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

		$custom_background_support = array(
			'default-color'          => '',
			'default-image'          => get_template_directory_uri() . '/assets/img/default-background.jpg',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $custom_background_support );
	}
endif;
add_action( 'after_setup_theme', 'flat_setup' );

if ( ! function_exists( 'flat_widgets_init' ) ) :
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
	function flat_scripts_styles() {
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
		wp_enqueue_script( 'flat-js', get_template_directory_uri() . $assets['js'], array( 'jquery' ), $version, true );
	}
endif;
add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' );

if ( ! function_exists( 'flat_entry_meta' ) ) :
function flat_entry_meta( $show_sep = true ) {
	printf( __( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> by <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>', 'flat' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);

	if ( true === $show_sep ) {
		echo '<span class="sep">&middot;</span>';
	}
		echo '<span class="comments-link">';
		comments_popup_link( __( '0 Comment', 'flat' ), __( '1 Comment', 'flat' ), __( '% Comments', 'flat' ) );
		echo '</span>';
}
endif;
