<?php 
if ( ! isset( $content_width ) )
	$content_width = 720;

function flat_setup() {
    load_theme_textdomain( 'flat', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'flat' ) );
	add_theme_support( 'post-thumbnails' );
	add_filter( 'use_default_gallery_style', '__return_false' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'assets/css/editor-style.css' ) );

	$custom_background_support = array(
		'default-color'          => '',
		'default-image'          => get_template_directory_uri() . '/assets/img/default-background.jpg',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $custom_background_support );
}
add_action( 'after_setup_theme', 'flat_setup' );

function flat_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_enqueue_style( 'flat-template', get_template_directory_uri() . '/assets/css/template.css', array(), '1.3.7' );
	wp_enqueue_style( 'flat-style', get_stylesheet_uri(), array(), '1.3.7' );
	wp_enqueue_script( 'flat-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap-3.1.1.min.js', array( 'jquery' ), '3.1.1', true );
    wp_enqueue_script( 'flat-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery', 'flat-bootstrap' ), '1.3.7', true );
}
add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' );

function flat_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/html5shiv.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'flat_ie_support_header' );

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
add_action( 'widgets_init', 'flat_widgets_init' );

function flat_entry_meta( $show_sep = true ) {
    // Set up and print post meta information.
	printf( __('<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> by <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>', 'flat'),
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);

    if( $show_sep == true ) echo '<span class="sep">&middot;</span>';
    echo '<span class="comments-link">'.comments_popup_link( __( '0 Comment', 'flat' ), __( '1 Comment', 'flat' ), __( '% Comments', 'flat' ) ) . '</span>';
}

function flat_paging_nav() {
  // Don't print empty markup if there's only one page.
  if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
    return;
  }

  $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
  $pagenum_link = html_entity_decode( get_pagenum_link() );
  $query_args   = array();
  $url_parts    = explode( '?', $pagenum_link );

  if ( isset( $url_parts[1] ) ) {
    wp_parse_str( $url_parts[1], $query_args );
  }

  $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
  $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

  $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
  $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

  // Set up paginated links.
  $links = paginate_links( array(
    'base'     => $pagenum_link,
    'format'   => $format,
    'total'    => $GLOBALS['wp_query']->max_num_pages,
    'current'  => $paged,
    'mid_size' => 4,
    'add_args' => array_map( 'urlencode', $query_args ),
    'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ),
    'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ),
  ) );

  if ( $links ) :

  ?>
  <nav class="navigation paging-navigation" role="navigation">
    <div class="nav-links">
      <?php echo $links; ?>
    </div>
  </nav>
  <?php
  endif;
}

if ( ! function_exists( 'flat_post_nav' ) ) :
function flat_post_nav() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'flat' ); ?></h1>
        <div class="nav-links">

            <?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'flat' ) ); ?>
            <?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'flat' ) ); ?>

        </div>
    </nav>
    <?php
}
endif;

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';
