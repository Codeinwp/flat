<?php
/**
 * Content display
 *
 * Handles content display in non-single instances, such as within archives.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}
?>
<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title" itemprop="name">
			<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'pacific' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php $archive_metadata = pacific_get_theme_option( 'archive_metadata', 1 ); ?>
		<?php if ( 1 != $archive_metadata ) : ?>
			<div class="entry-meta"><?php pacific_entry_meta(); ?></div>
		<?php endif; ?>
	</header>
	<?php $archive_featured_image = pacific_get_theme_option( 'archive_featured_image', 1 ); ?>
	<?php if ( has_post_thumbnail() && ! post_password_required() && 1 != $archive_featured_image ) : ?>
		<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'pacific' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'thumbnailUrl' ) ); ?></a></div>
	<?php endif; ?>
	<?php $archive_content = pacific_get_theme_option( 'archive_content', 1 ); ?>
		<?php pacific_hook_entry_before(); ?>
	<?php if ( 1 != $archive_content ) : ?>
		<div class="entry-content" itemprop="articleBody">
			<?php pacific_hook_entry_top(); ?>
			<?php the_content( __( 'Continue reading', 'pacific' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pacific' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			<?php pacific_hook_entry_bottom(); ?>
		</div>
	<?php else : ?>
		<div class="entry-summary" itemprop="description">
			<?php pacific_hook_entry_top(); ?>
			<?php the_excerpt(); ?>
			<?php pacific_hook_entry_bottom(); ?>
		</div>
	<?php endif; ?>
		<?php pacific_hook_entry_after(); ?>
</article>