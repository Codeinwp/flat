<?php 
if ( ! isset( $content_width ) )
	$content_width = 604;

function flat_setup() {
    load_theme_textdomain( 'flat', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'flat' ) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 820, 480, true );
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'flat_setup' );

function flat_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_enqueue_style( 'flat-style', get_stylesheet_uri() );
    wp_enqueue_script( 'flat-bootstrap-transition', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap-transition.js', array( 'jquery' ), '20130419', true );
    wp_enqueue_script( 'flat-bootstrap-carousel', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap-carousel.js', array( 'jquery' ), '20130419', true );
	wp_enqueue_script( 'flat-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20130419', true );
}
add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' );

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
    echo '<span class="byline"><span class="author vcard"><a class="url fn n" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" rel="author">'.get_the_author().'</a></span></span>';
    if( $show_sep == true ) echo '<span class="sep">&middot;</span>';
    $categories_list = get_the_category_list( __( ', ', 'flat' ) );
    if ( $categories_list ) {
        echo '<span class="categories-links">' . $categories_list . '</span>';
        if( $show_sep == true ) echo '<span class="sep">&middot;</span>';
    }
    echo '<time class="entry-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>';
    if( $show_sep == true ) echo '<span class="sep">&middot;</span>';
    echo '<span class="comments-link">'.comments_popup_link( __( '0 Comment', 'flat' ), __( '1 Comment', 'flat' ), __( '% Comments', 'flat' ) ) . '</span>';
}

function paging_nav() {
	global $wp_query, $paged;

	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return; ?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<i class="icon-chevron-left"></i>', 'flat' ) ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<i class="icon-chevron-right"></i>', 'flat' ) ); ?></div>
			<?php endif; ?>
			<div class="nav-current-page"><?php echo sprintf( __( 'Page %1$s of %2$s', 'flat' ), $paged, $wp_query->max_num_pages ) ?></div>
		
		</div>
	</nav>
	<?php
}

function flat_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'flat' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'flat_wp_title', 10, 2 );

if ( ! function_exists( 'flat_post_nav' ) ) :
function flat_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
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

        </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}
endif;
/*
add_filter( 'post_gallery', 'flat_post_gallery', 10, 2 );
function flat_featured_gallery() {
    $pattern = get_shortcode_regex();

    if ( preg_match( "/$pattern/s", get_the_content(), $match ) && 'gallery' == $match[2] ) {
        echo do_shortcode_tag( $match );
    }
}

function flat_post_gallery() {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }
    if(isset($attr)) {
        extract(shortcode_atts(array(
            'order'      => 'ASC',
            'orderby'    => 'menu_order ID',
            'id'         => $post->ID,
            'itemtag'    => 'div',
            'icontag'    => 'div',
            'captiontag' => 'div',
            'columns'    => 3,
            'size'       => 'full',
            'include'    => '',
            'exclude'    => ''
        ), $attr));
    }
    
    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', '');

    $output.= "<div id='$selector' class='galleryid-{$id} gallery carousel slide'>";
    $output.= "<div class='carousel-inner'>";

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        if($i==0) {
            $output .= "<{$itemtag} class='item active'>";
        } else {
            $output .= "<{$itemtag} class='item'>";
        }
        
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='carousel-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";

        $i++;
    }

    $output .= "
            </div>
            <a class='carousel-control left' href='#$selector' data-slide='prev'>&lsaquo;</a>
            <a class='carousel-control right' href='#$selector' data-slide='next'>&rsaquo;</a>
        </div>\n";

    return $output;
}*/