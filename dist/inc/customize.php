<?php
/**
 * Extend Textarea Customize Control
 */
include_once ABSPATH . WPINC . '/class-wp-customize-control.php';

/**
 * Register customizer controls
 *
 * @param object $wp_customize The WordPress customizer object
 */
function flat_customize_register( $wp_customize ) {
	// Logo
	$wp_customize->add_setting( 'flat_theme_options[logo]', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label' => __( 'Site Logo', 'flat' ),
		'section' => 'title_tagline',
		'settings' => 'flat_theme_options[logo]',
	) ) );

	// Site Title Font Family
	$wp_customize->add_setting( 'flat_theme_options[site_title_font_family]', array(
		'default' => 'yesteryear',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_site_title_font_family',
	) );
	$wp_customize->add_control( 'site_title_font_family', array(
		'settings' => 'flat_theme_options[site_title_font_family]',
		'label' => __( 'Site Title Font Family', 'flat' ),
		'section' => 'title_tagline',
		'type' => 'select',
		'choices' => array(
			'Amatic+SC' => 'Amatic SC',
			'Yesteryear' => 'Yesteryear',
			'Pacifico' => 'Pacifico',
			'Dancing+Script' => 'Dancing Script',
			'Satisfy' => 'Satisfy',
			'Handlee' => 'Handlee',
			'Lobster' => 'Lobster',
			'Lobster+Two' => 'Lobster Two',
		),
	) );

	// Header Display
	$wp_customize->add_setting( 'flat_theme_options[header_display]', array(
		'default' => 'site_title',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_header_display',
	) );
	$wp_customize->add_control( 'header_display', array(
		'settings' => 'flat_theme_options[header_display]',
		'label' => 'Display as',
		'section' => 'title_tagline',
		'type' => 'select',
		'choices' => array(
			'site_title' => __( 'Site Title', 'flat' ),
			'site_logo' => __( 'Site Logo', 'flat' ),
			'both_title_logo' => __( 'Both Title &amp; Logo', 'flat' ),
		),
	) );

	// Favicon
	$wp_customize->add_setting( 'flat_theme_options[favicon]', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon', array(
		'label' => __( 'Site Favicon', 'flat' ),
		'section' => 'title_tagline',
		'settings' => 'flat_theme_options[favicon]',
	) ) );

	// Color
	$wp_customize->add_setting( 'flat_theme_options[sidebar_background_color]', array(
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'default' => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_background_color', array(
		'label' => __( 'Sidebar Background Color', 'flat' ),
		'section' => 'colors',
		'settings' => 'flat_theme_options[sidebar_background_color]',
	) ) );

	// Background Size
	$wp_customize->add_setting( 'flat_theme_options[background_size]', array(
		'default' => 'cover',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_background_size',
	) );
	$wp_customize->add_control( 'background_size', array(
		'settings' => 'flat_theme_options[background_size]',
		'label' => __( 'Background size', 'flat' ),
		'section' => 'background_image',
		'type' => 'radio',
		'choices' => array(
			'cover' => __( 'Cover', 'flat' ),
			'contain' => __( 'Contain', 'flat' ),
			'initial' => __( 'Initial', 'flat' ),
		),
	) );

	// Typography
	$wp_customize->add_section( 'typography', array(
		'title' => __( 'Typography', 'flat' ),
		'priority' => 50,
	) );

	// Global Font Family
	$wp_customize->add_setting( 'flat_theme_options[global_font_family]', array(
		'default' => 'Roboto',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_global_font_family',
	) );
	$wp_customize->add_control( 'global_font_family', array(
		'settings' => 'flat_theme_options[global_font_family]',
		'label' => __( 'Global Font Family', 'flat' ),
		'section' => 'typography',
		'type' => 'select',
		'choices' => array(
			'Roboto:400,700' => 'Roboto',
			'Lato:400,700' => 'Lato',
			'Droid+Sans:400,700' => 'Droid Sans',
			'Open+Sans:400,700' => 'Open Sans',
			'PT+Sans:400,700' => 'PT Sans',
			'Source+Sans+Pro:400,700' => 'Source Sans Pro',
		),
	) );

	// Heading Font Family
	$wp_customize->add_setting( 'flat_theme_options[heading_font_family]', array(
		'default' => 'Roboto Slab',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_heading_font_family',
	) );
	$wp_customize->add_control( 'heading_font_family', array(
		'settings' => 'flat_theme_options[heading_font_family]',
		'label' => __( 'Heading Font Family', 'flat' ),
		'section' => 'typography',
		'type' => 'select',
		'choices' => array(
			'Roboto+Slab' => 'Roboto Slab',
			'Droid+Serif' => 'Droid Serif',
			'Lora' => 'Lora',
			'Bitter' => 'Bitter',
			'Arvo' => 'Arvo',
			'PT+Serif' => 'PT Serif',
			'Rokkitt' => 'Rokkitt',
			'Open+Sans+Condensed' => 'Open Sans Condensed',
		),
	) );

	// Sub-Heading Font Family
	$wp_customize->add_setting( 'flat_theme_options[sub_heading_font_family]', array(
		'default' => 'Roboto Condensed',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_subheading_font_family',
	) );
	$wp_customize->add_control( 'sub_heading_font_family', array(
		'settings' => 'flat_theme_options[sub_heading_font_family]',
		'label' => __( 'Sub-Heading Font Family', 'flat' ),
		'section' => 'typography',
		'type' => 'select',
		'choices' => array(
			'Roboto+Condensed' => 'Roboto Condensed',
			'Open+Sans+Condensed' => 'Open Sans Condensed',
			'PT+Sans+Narrow' => 'PT Sans Narrow',
			'Dosis' => 'Dosis',
			'Abel' => 'Abel',
			'News+Cycle' => 'News Cycle',
		),
	) );

	// Single Post Settings
	$wp_customize->add_section( 'layout_single', array(
		'title' => __( 'Single Post', 'flat' ),
		'priority' => 110,
	) );

	// Single Featured Image
	$wp_customize->add_setting( 'flat_theme_options[single_featured_image]', array(
		'default' => '1',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_featured_image', array(
		'label' => __( 'Hide Featured Image', 'flat' ),
		'section' => 'layout_single',
		'settings' => 'flat_theme_options[single_featured_image]',
		'type' => 'checkbox',
	) );

	// Single Metadata
	$wp_customize->add_setting( 'flat_theme_options[single_metadata]', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_metadata', array(
		'label' => __( 'Hide Metadata', 'flat' ),
		'section' => 'layout_single',
		'settings' => 'flat_theme_options[single_metadata]',
		'type' => 'checkbox',
	) );

	// Single Author Box
	$wp_customize->add_setting( 'flat_theme_options[single_author_box]', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'single_author_box', array(
		'label' => __( 'Hide Author Box', 'flat' ),
		'section' => 'layout_single',
		'settings' => 'flat_theme_options[single_author_box]',
		'type' => 'checkbox',
	) );

	// Archive Settings
	$wp_customize->add_section( 'layout_archive', array(
		'title' => __( 'Archive Pages', 'flat' ),
		'priority' => 100,
	) );

	// Archive Featured Image
	$wp_customize->add_setting( 'flat_theme_options[archive_featured_image]', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_featured_image', array(
		'label' => __( 'Hide Featured Image', 'flat' ),
		'section' => 'layout_archive',
		'settings' => 'flat_theme_options[archive_featured_image]',
		'type' => 'checkbox',
	) );

	// Archive Metadata
	$wp_customize->add_setting( 'flat_theme_options[archive_metadata]', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_metadata', array(
		'label' => __( 'Hide Metadata', 'flat' ),
		'section' => 'layout_archive',
		'settings' => 'flat_theme_options[archive_metadata]',
		'type' => 'checkbox',
	) );

	// Archive Content
	$wp_customize->add_setting( 'flat_theme_options[archive_content]', array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'flat_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'archive_content', array(
		'label' => __( 'Show Post Excerpt', 'flat' ),
		'section' => 'layout_archive',
		'settings' => 'flat_theme_options[archive_content]',
		'type' => 'checkbox',
	) );
}
add_action( 'customize_register', 'flat_customize_register' );

/**
 * Sanitize Settings
 */
function flat_sanitize_site_title_font_family( $site_title_font_family ) {
	if ( ! in_array( $site_title_font_family, array( 'Amatic+SC', 'Yesteryear', 'Pacifico', 'Dancing+Script', 'Satisfy', 'Handlee', 'Lobster', 'Lobster+Two' ) ) ) {
		$site_title_font_family = 'Yesteryear';
	}

	return $site_title_font_family;
}

function flat_sanitize_global_font_family( $global_font_family ) {
	if ( ! in_array( $global_font_family, array( 'Roboto:400,700', 'Lato:400,700', 'Droid+Sans:400,700', 'Open+Sans:400,700', 'PT+Sans:400,700', 'Source+Sans+Pro:400,700' ) ) ) {
		$global_font_family = 'Roboto:400,700';
	}

	return $global_font_family;
}

function flat_sanitize_heading_font_family( $heading_font_family ) {
	if ( ! in_array( $heading_font_family, array( 'Roboto+Slab', 'Droid+Serif', 'Lora', 'Bitter', 'Arvo', 'PT+Serif', 'Rokkitt', 'Open+Sans+Condensed' ) ) ) {
		$heading_font_family = 'Roboto+Slab';
	}

	return $heading_font_family;
}

function flat_sanitize_subheading_font_family( $subheading_font_family ) {
	if ( ! in_array( $subheading_font_family, array( 'Roboto+Condensed', 'Open+Sans+Condensed', 'PT+Sans+Narrow', 'Dosis', 'Abel', 'News+Cycle' ) ) ) {
		$subheading_font_family = 'Roboto+Condensed';
	}

	return $subheading_font_family;
}

function flat_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

function flat_sanitize_header_display( $header_display ) {
	if ( ! in_array( $header_display, array( 'site_title', 'site_logo', 'both_title_logo' ) ) ) {
		$header_display = 'site_title';
	}

	return $header_display;
}

function flat_sanitize_background_size( $background_size ) {
	if ( ! in_array( $background_size, array( 'cover', 'contain', 'initial' ) ) ) {
		$background_size = 'cover';
	}

	return $background_size;
}

/**
 * Get Theme Options
 */
function flat_get_theme_option( $option_name, $default = '' ) {
	$options = get_option( 'flat_theme_options' );

	if ( isset( $options[ $option_name ] ) ) {
		return $options[ $option_name ];
	}

	return $default;
}

/**
 * Change Favicon
 */
function flat_favicon() {
	$icon_path = esc_url( flat_get_theme_option( 'favicon' ) );

	if ( ! empty( $icon_path ) ) {
		echo '<link type="image/x-icon" href="' . esc_attr( $icon_path ) . '" rel="shortcut icon">';
	}
}
add_action( 'wp_head', 'flat_favicon' );

/**
 * Custom CSS
 */
function flat_custom_css() {
	echo '<style type="text/css">';
	$custom_style = '';
	$sidebar_background_color = flat_get_theme_option( 'sidebar_background_color' );

	if ( ! empty( $sidebar_background_color ) ) {
		$custom_style .= '#page:before, .sidebar-offcanvas, #secondary { background-color: ' . $sidebar_background_color . '; }';
		$custom_style .= '@media (max-width: 1199px) { #page > .container { background-color: ' . $sidebar_background_color . '; } }';
	}

	$background_size = flat_get_theme_option( 'background_size' );

	if ( ! empty( $background_size ) ) {
		$custom_style .= 'body { background-size: ' . $background_size . '; }';
	}

	echo esc_attr( $custom_style );
	echo '</style>';
}
add_action( 'wp_head', 'flat_custom_css' );

/**
 * Custom Font
 */
function flat_custom_font() {
	$site_title_font_family = flat_get_theme_option( 'site_title_font_family', 'Amatic+SC' );
	$global_font_family = flat_get_theme_option( 'global_font_family', 'Roboto:400,700' );
	$heading_font_family = flat_get_theme_option( 'heading_font_family', 'Roboto+Slab' );
	$sub_heading_font_family = flat_get_theme_option( 'sub_heading_font_family', 'Roboto+Condensed' );

	echo '<style type="text/css">';
		echo '#masthead .site-title {font-family:' . esc_attr( str_replace( array( '+', ':400,700'), array( ' ', '' ), $site_title_font_family ) ) . '}';
		echo 'body {font-family:' . esc_attr( str_replace( array( '+', ':400,700'), array( ' ', ' ' ), $global_font_family ) ) . '}';
		echo 'h1,h2,h3,h4,h5,h6 {font-family:' . esc_attr( str_replace( array( '+', ':400,700'), array( ' ', ' ' ), $heading_font_family ) ) . '}';
		echo '#masthead .site-description, .hentry .entry-meta {font-family:' . esc_attr( str_replace( array( '+', ':400,700'), array( ' ', ' ' ), $sub_heading_font_family ) ) . '}';
	echo '</style>';
}
add_action( 'wp_head', 'flat_custom_font' );

/**
 * Get Custom Fonts URL
 */
function flat_fonts_url() {
	$fonts_url = '';
	$fonts = array();
	$fonts[] = flat_get_theme_option( 'site_title_font_family', 'Amatic+SC' );
	$fonts[] = flat_get_theme_option( 'global_font_family', 'Roboto:400,700' );
	$fonts[] = flat_get_theme_option( 'heading_font_family', 'Roboto+Slab' );
	$fonts[] = flat_get_theme_option( 'sub_heading_font_family', 'Roboto+Condensed' );

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => esc_attr( implode( '%7C', $fonts ) )
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Display Logo
 */
function flat_logo() {
	$header_display = flat_get_theme_option( 'header_display', 'site_title' );

	if ( 'both_title_logo' === $header_display ) {
		$header_class = 'display-title-logo';
	} else if ( 'site_logo' === $header_display ) {
		$header_class = 'display-logo';
	} else {
		$header_class = 'display-title';
	}

	$logo = esc_url( flat_get_theme_option( 'logo' ) );
	$tagline = get_bloginfo( 'description' );

	echo '<h1 class="site-title ' . esc_attr( $header_class ) . '"><a href="' . esc_url( home_url( '/' ) ) . '" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';

	if ( 'display-title' !== $header_class ) {
		echo '<img alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" src="' . esc_attr( $logo ) . '" />';
	}
	if ( 'display-logo' !== $header_class ) {
		echo esc_attr( get_bloginfo( 'name' ) );
	}

	echo '</a></h1>';

	if ( $tagline ) {
		echo '<h2 class="site-description">' . esc_attr( $tagline ) . '</h2>';
	}
}