<?php
/**
 * Home page/blog template
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
	<?php pacific_hook_index_before(); ?>
	<div id="content" class="site-content" role="main">
		<?php pacific_hook_index_top(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'pacific' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'pacific' ) ) ); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>

		<?php pacific_hook_index_bottom(); ?>
	</div>
	<?php pacific_hook_index_after(); ?>
<?php get_footer(); ?>