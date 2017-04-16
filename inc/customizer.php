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
  $wp_customize->add_setting('flat_theme_options[site_title_font_family]', array(
    'default'        => 'yesteryear',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'site_title_font_family', array(
    'settings' => 'flat_theme_options[site_title_font_family]',
    'label' => __('Site Title Font Family', 'flat'),
    'section' => 'title_tagline',
    'type'    => 'select',
    'choices'    => array(
      'Amatic SC' => 'Amatic SC',
      'Yesteryear' => 'Yesteryear',
      'Pacifico' => 'Pacifico',
      'Dancing Script' => 'Dancing Script',
      'Satisfy' => 'Satisfy',
      'Handlee' => 'Handlee',
      'Lobster' => 'Lobster',
      'Lobster Two' => 'Lobster Two'
    ),
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
  $wp_customize->add_setting('flat_theme_options[link_text_color]', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
    'default' => '#1abc9c',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_text_color', array(
    'label' => __('Link Text Color', 'flat'),
    'section' => 'colors',
    'settings' => 'flat_theme_options[link_text_color]',
  )));
  $wp_customize->add_setting('flat_theme_options[link_hover_color]', array(
    'capability' => 'edit_theme_options',
    'type' => 'option',
    'default' => '#117964',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_hover_color', array(
    'label' => __('Link Hover Color', 'flat'),
    'section' => 'colors',
    'settings' => 'flat_theme_options[link_hover_color]',
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
  $wp_customize->add_section('typography', array(
    'title'    => __('Typography', 'flat'),
    'priority' => 50,
  ));
  $wp_customize->add_setting('flat_theme_options[global_font_family]', array(
    'default'        => 'Roboto',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'global_font_family', array(
    'settings' => 'flat_theme_options[global_font_family]',
    'label' => __('Global Font Family', 'flat'),
    'section' => 'typography',
    'type'    => 'select',
    'choices'    => array(
      'Roboto' => 'Roboto',
      'Lato' => 'Lato',
      'Droid Sans' => 'Droid Sans',
      'Open Sans' => 'Open Sans',
      'PT Sans' => 'PT Sans',
      'Source Sans Pro' => 'Source Sans Pro'
    ),
  ));

  $wp_customize->add_setting('flat_theme_options[heading_font_family]', array(
    'default'        => 'Roboto Slab',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'heading_font_family', array(
    'settings' => 'flat_theme_options[heading_font_family]',
    'label' => __('Heading Font Family', 'flat'),
    'section' => 'typography',
    'type'    => 'select',
    'choices'    => array(
      'Roboto Slab' => 'Roboto Slab',
      'Droid Serif' => 'Droid Serif',
      'Lora' => 'Lora',
      'Bitter' => 'Bitter',
      'Arvo' => 'Arvo',
      'PT Serif' => 'PT Serif',
      'Rokkitt' => 'Rokkitt',
      'Open Sans Condensed' => 'Open Sans Condensed',
    ),
  ));
  $wp_customize->add_setting('flat_theme_options[sub_heading_font_family]', array(
    'default'        => 'Roboto Condensed',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'sub_heading_font_family', array(
    'settings' => 'flat_theme_options[sub_heading_font_family]',
    'label' => __('Sub-Heading Font Family', 'flat'),
    'section' => 'typography',
    'type'    => 'select',
    'choices'    => array(
      'Roboto Condensed' => 'Roboto Condensed',
      'Open Sans Condensed' => 'Open Sans Condensed',
      'PT Sans Narrow' => 'PT Sans Narrow',
      'Dosis' => 'Dosis',
      'Abel' => 'Abel',
      'News Cycle' => 'News Cycle'
    ),
  ));
  $wp_customize->add_section('layout_single', array(
    'title'    => __('Single Post', 'flat'),
    'priority' => 110,
  ));
  $wp_customize->add_setting('flat_theme_options[single_featured_image]', array(
    'default'        => '1',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control('single_featured_image', array(
    'label'      => __('Hide Featured Image', 'flat'),
    'section'    => 'layout_single',
    'settings'   => 'flat_theme_options[single_featured_image]',
    'type'       => 'checkbox'
  ) );
  $wp_customize->add_setting('flat_theme_options[single_metadata]', array(
    'default'        => '0',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control('single_metadata', array(
    'label'      => __('Hide Metadata', 'flat'),
    'section'    => 'layout_single',
    'settings'   => 'flat_theme_options[single_metadata]',
    'type'       => 'checkbox'
  ) );
  $wp_customize->add_setting('flat_theme_options[single_author_box]', array(
    'default'        => '0',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control('single_author_box', array(
    'label'      => __('Hide Author Box', 'flat'),
    'section'    => 'layout_single',
    'settings'   => 'flat_theme_options[single_author_box]',
    'type'       => 'checkbox'
  ) );
  $wp_customize->add_section('layout_archive', array(
    'title'    => __('Archive Pages', 'flat'),
    'priority' => 100,
  ));
  $wp_customize->add_setting('flat_theme_options[archive_featured_image]', array(
    'default'        => '0',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control('archive_featured_image', array(
    'label'      => __('Hide Featured Image', 'flat'),
    'section'    => 'layout_archive',
    'settings'   => 'flat_theme_options[archive_featured_image]',
    'type'       => 'checkbox'
  ) );
  $wp_customize->add_setting('flat_theme_options[archive_metadata]', array(
    'default'        => '0',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control('archive_metadata', array(
    'label'      => __('Hide Metadata', 'flat'),
    'section'    => 'layout_archive',
    'settings'   => 'flat_theme_options[archive_metadata]',
    'type'       => 'checkbox'
  ));
  $wp_customize->add_setting('flat_theme_options[archive_content]', array(
    'default'        => '0',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control('archive_content', array(
    'label'      => __('Show Post Excerpt', 'flat'),
    'section'    => 'layout_archive',
    'settings'   => 'flat_theme_options[archive_content]',
    'type'       => 'checkbox'
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
  $link_text_color = flat_get_theme_option('link_text_color');
  if( !empty($link_text_color) ) {
    $custom_style.= 'a { color: '.$link_text_color.'; }';
  }
  $link_hover_color = flat_get_theme_option('link_hover_color');
  if( !empty($link_hover_color) ) {
    $custom_style.= 'a:hover, a:focus { color: '.$link_hover_color.'; }';
  }
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
 * Custom Font
 */
function flat_custom_font() {
  $site_title_font_family = flat_get_theme_option('site_title_font_family');
  $global_font_family = flat_get_theme_option('global_font_family');
  $heading_font_family = flat_get_theme_option('heading_font_family');
  $sub_heading_font_family = flat_get_theme_option('sub_heading_font_family');

  if( !empty($site_title_font_family) || !empty($global_font_family) || !empty($heading_font_family) || !empty($sub_heading_font_family) ) {
    $font_import = '';
    $font_style = '';
    if( !empty($site_title_font_family) && $site_title_font_family != 'Amatic SC' ) {
      $font_import.= '|'.$site_title_font_family;
      $font_style.= "#masthead .site-title {font-family:".$site_title_font_family."}";
    }

    if( !empty($global_font_family) && $global_font_family != 'Roboto' ) {
      $font_import.= '|'.$global_font_family;
      $font_style.= "body {font-family:".$global_font_family."}";
    }

    if( !empty($heading_font_family) && $heading_font_family != 'Roboto Slab' ) {
      $font_import.= '|'.$heading_font_family;
      $font_style.= "h1,h2,h3,h4,h5,h6 {font-family:".$heading_font_family."}";
    }

    if( !empty($sub_heading_font_family) && $sub_heading_font_family != 'Roboto Condensed' ) {
      $font_import.= '|'.$sub_heading_font_family;
      $font_style.= "#masthead .site-description, .hentry .entry-meta {font-family:".$sub_heading_font_family."}";
    }

    if( !empty($font_import) ) {
      $font_import = str_replace('Open Sans Condensed','Open Sans Condensed:300', $font_import);
      $font_import = str_replace(' ', '+', $font_import);
      echo str_replace('family=|', 'family=', "<link href='//fonts.googleapis.com/css?family=".$font_import."' rel='stylesheet' type='text/css'>");
      echo "<style type='text/css'>".$font_style."</style>";
    }
    
  }
}
add_action( 'wp_head', 'flat_custom_font' );

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
