<?php
/**
 * Extend Textarea Customize Control
 */
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

/**
 * Register Customize
 */
function flat_customize_register( $wp_customize ) {
  $wp_customize->add_setting('flat_theme_options[logo]', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo', array(
    'label' => __('Site Logo', 'flat'),
    'section' => 'title_tagline',
    'settings' => 'flat_theme_options[logo]',
  )));
  $wp_customize->add_setting('flat_theme_options[header_display]', array(
    'default'        => 'site_title',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'sanitize_callback' => 'flat_sanitize_header_display',
  ));
  $wp_customize->add_control( 'header_display', array(
    'settings' => 'flat_theme_options[header_display]',
    'label'   => 'Display as',
    'section' => 'title_tagline',
    'type'    => 'select',
    'choices'    => array(
      'site_title' => 'Site Title',
      'site_logo' => 'Site Logo',
      'both_title_logo' => 'Both Title & Logo',
    ),
  ));
  $wp_customize->add_setting('flat_theme_options[favicon]', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon', array(
    'label' => __('Site Favicon', 'flat'),
    'section' => 'title_tagline',
    'settings' => 'flat_theme_options[favicon]',
  )));
  $wp_customize->add_setting('flat_theme_options[sidebar_background_color]', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
    'default' => '#333',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebar_background_color', array(
    'label' => __('Sidebar Background Color', 'flat'),
    'section' => 'colors',
    'settings' => 'flat_theme_options[sidebar_background_color]',
  )));
  $wp_customize->add_setting('flat_theme_options[background_size]', array(
    'default'        => 'cover',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'sanitize_callback' => 'flat_sanitize_background_size',
  ));
  $wp_customize->add_control( 'background_size', array(
    'settings' => 'flat_theme_options[background_size]',
    'label'   => 'Background size',
    'section' => 'background_image',
    'type'    => 'radio',
    'choices'    => array(
      'cover' => 'Cover',
      'contain' => 'Contain',
      'initial' => 'Initial',
    ),
  ));
}
add_action( 'customize_register', 'flat_customize_register' );

/**
 * Sanitize Settings
 */
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
  if( isset($options[$option_name]) ) {
    return $options[$option_name];
  }
  return $default;
}

/**
 * Change Favicon
 */
function flat_favicon() {
  $iconPath = esc_url(flat_get_theme_option('favicon'));
  if( !empty($iconPath) ) {
    echo '<link type="image/x-icon" href="'.$iconPath.'" rel="shortcut icon">';
  }
}
add_action( 'wp_head', 'flat_favicon' );

/**
 * Custom CSS
 */
function flat_custom_css() {
  $custom_style = '<style type="text/css">';
  $sidebar_background_color = flat_get_theme_option('sidebar_background_color');
  if( !empty($sidebar_background_color) ) {
    $custom_style.= '#page:before, .sidebar-offcanvas, #secondary { background-color: '.$sidebar_background_color.'; }';
    $custom_style.= '@media (max-width: 1199px) { #page > .container { background-color: '.$sidebar_background_color.'; } }';
  }
  $background_size = flat_get_theme_option('background_size');
  if( !empty($background_size) ) {
    $custom_style.= 'body { background-size: '.$background_size.'; }';
  }
  $custom_style.= '</style>';
  echo $custom_style;
}
add_action( 'wp_head', 'flat_custom_css' );

/**
 * Display Logo
 */
function flat_logo() {
  $header_display = flat_get_theme_option( 'header_display', 'site_title' );

  if($header_display == 'both_title_logo') {
    $header_class = 'display-title-logo';
  } else if ($header_display == 'site_logo') {
    $header_class = 'display-logo';
  } else {
    $header_class = 'display-title';
  }

  $logo = esc_url(flat_get_theme_option( 'logo' ));
  $tagline = get_bloginfo( 'description' );

  echo '<h1 class="site-title '.$header_class.'"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
  if ( $header_class != 'display-title' ) {
    echo '<img alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="'.$logo.'" />';
  }
  if ( $header_class != 'display-logo' ) {
    echo get_bloginfo( 'name' );
  }
  echo '</a></h1>';

  if($tagline)
    echo '<h2 class="site-description">'.$tagline.'</h2>';
}