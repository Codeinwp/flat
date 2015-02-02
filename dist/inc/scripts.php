<?php
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
add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' );
