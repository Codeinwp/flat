<?php
/**
 * Single post framework
 *
 * Handles the overall scheme of single posts, calling more specific single
 * templates, such as `content-single.php` to handle the entry itself.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}

get_header();
?>
			<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'single' );

				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'pacific' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'pacific' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'pacific' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'pacific' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );

				comments_template();
			endwhile;
			?>
			</div>
<?php get_footer(); ?>