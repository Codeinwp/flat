<?php
function flat_entry_meta( $show_sep = true ) {
		// Set up and print post meta information.
	printf( __( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> by <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>', 'flat' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);

		if ( $show_sep == true ) 
			echo '<span class="sep">&middot;</span>';
		echo '<span class="comments-link">';
		comments_popup_link( __( '0 Comment', 'flat' ), __( '1 Comment', 'flat' ), __( '% Comments', 'flat' ) );
		echo '</span>';
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
		'base'			=> $pagenum_link,
		'format'		=> $format,
		'total'			=> $GLOBALS['wp_query']->max_num_pages,
		'current'		=> $paged,
		'mid_size'	=> 4,
		'add_args'	=> array_map( 'urlencode', $query_args ),
		'prev_text'	=> __( '<i class="fa fa-chevron-left"></i>', 'flat' ),
		'next_text'	=> __( '<i class="fa fa-chevron-right"></i>', 'flat' ),
	) );

	$allowed_html = array(
    'a' => array(
      'href' => array(),
      'class' => array()
    ),
    'span' => array(
      'class' => array()
    ),
    'i' => array(
      'class' => array()
    ),
	);

	if ( $links ) : ?>
		<nav class="navigation paging-navigation" role="navigation">
			<div class="nav-links">
				<?php echo wp_kses( $links, $allowed_html ); ?>
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

if ( ! function_exists( 'flat_wp_title' ) ) :
	function flat_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		$title .= get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		if ( $paged >= 2 || $page >= 2 ) {
			$title = sprintf( __( 'Page %s', 'flat' ), max( $paged, $page ) ) . esc_attr( " $sep $title" );
		}

		return $title;
	}
endif;
add_filter( 'wp_title', 'flat_wp_title', 10, 2 );
