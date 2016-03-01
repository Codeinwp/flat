<?php
/**
 * Archive pages.
 *
 * Used on generic month, category, tag, tax, and author archives if no
 * more specific template is present (such as in a child theme).
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
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
	<?php if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pacific_author_bio_avatar_size', 80 ) ); ?>
			</div>
			<div class="author-description">
				<h4><?php printf( esc_html__( 'About %s', 'pacific' ), get_the_author() ); ?></h4>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>
	<?php endif; ?>

	<?php pacific_hook_archive_before(); ?>

	<div id="content" class="site-content" role="main">
		<?php pacific_hook_archive_top(); ?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'pacific' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'pacific' ) ) ); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
		<?php pacific_hook_archive_bottom(); ?>
	</div>

	<?php pacific_hook_archive_after(); ?>
<?php get_footer(); ?>