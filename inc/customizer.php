<?php
/**
 * Extend Textarea Customize Control
 */
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class Flat_Textarea_Custom_Control extends WP_Customize_Control {

  public $type = 'textarea';
  public $statuses;
  public function __construct( $manager, $id, $args = array() ) {

  $this->statuses = array( '' => __( 'Default', 'flat' ) );
    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {
    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
        <?php echo esc_textarea( $this->value() ); ?>
      </textarea>
    </label>
    <?php
  }
}

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

  // CUSTOM CODE --------------------------------------------------------------------------------------
  $wp_customize->add_section('flat_custom_code', array(
    'title'    => __('Custom Code', 'flat'),
    'priority' => 200,
  ));
  $wp_customize->add_setting('flat_theme_options[header_code]', array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'type' => 'option',
  ));
  $wp_customize->add_control( new Flat_Textarea_Custom_Control($wp_customize, 'header_code', array(
    'label'    => __('Header Code', 'flat'),
    'section'  => 'flat_custom_code',
    'settings' => 'flat_theme_options[header_code]',
  )));
  $wp_customize->add_setting('flat_theme_options[footer_code]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new Flat_Textarea_Custom_Control($wp_customize, 'footer_code', array(
    'label'    => __('Footer Code', 'flat'),
    'section'  => 'flat_custom_code',
    'settings' => 'flat_theme_options[footer_code]'
  )));
}
add_action( 'customize_register', 'flat_customize_register' );

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
  $iconPath = flat_get_theme_option('favicon');
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
  $logo = flat_get_theme_option( 'logo' );
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

/**
 * Header Code
 */
function flat_custom_header_code() {
  echo flat_get_theme_option( 'header_code' );
}
add_action('wp_head', 'flat_custom_header_code');

/**
 * Footer Code
 */
function flat_custom_footer_code() {
  echo flat_get_theme_option( 'footer_code' );
}
add_action('wp_footer', 'flat_custom_footer_code');