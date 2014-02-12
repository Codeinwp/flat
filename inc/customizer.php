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
}
add_action( 'customize_register', 'flat_customize_register' );

/**
 * Sanitize Settings
 */
function flat_sanitize_header_display( $header_display ) {
  if ( ! in_array( $header_display, array( 'site_title', 'site_logo' ) ) ) {
    $header_display = 'site_title';
  }
  return $header_display;
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
 * Display Logo
 */
function flat_logo() {
  $header_display = (flat_get_theme_option( 'header_display', 'site_title') == 'site_title') ? 'display-title' : 'display-logo';
  $logo = esc_url(flat_get_theme_option( 'logo' ));
  $tagline = get_bloginfo( 'description' );

  echo '<h1 class="site-title '.$header_display.'"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
  if ($header_display == 'display-logo') {
    echo '<img alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" src="'.$logo.'" />';
  } else {
    echo get_bloginfo( 'name' );
  }
  echo '</a></h1>';

  if($tagline)
    echo '<h2 class="site-description">'.$tagline.'</h2>';
}