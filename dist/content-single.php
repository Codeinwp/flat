<?php
/**
 * Single post display
 *
 * Used to output single post entries, unless a more specific template
 * is found, such as `content-link.php`, in a child theme.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}

# Whether to show an author postbox or not
$author_postbox = ( get_the_author_meta( 'description' ) && 1 != pacific_get_theme_option( 'single_author_box', 1 ) ) ? true : false;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
		<?php $single_metadata = pacific_get_theme_option( 'single_metadata', 1 ); ?>
		<?php if ( 1 != $single_metadata ) : ?>
			<div class="entry-meta"><?php pacific_entry_meta( true, $author_postbox ); ?></div>
		<?php endif; ?>
	</header>
	<?php $single_featured_image = pacific_get_theme_option( 'single_featured_image', 1 ); ?>
	<?php if ( has_post_thumbnail() && ! post_password_required() && 1 != $single_featured_image ) : ?>
		<div class="entry-thumbnail"><?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'thumbnailUrl' ) ); ?></div>
	<?php endif; ?>

	<?php pacific_hook_entry_before(); ?>

	<div class="entry-content" itemprop="articleBody">
		<?php pacific_hook_entry_top(); ?>
		<?php the_content( __( 'Continue reading<span class="meta-nav">&hellip;</span>', 'pacific' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links" itemprop="pagination"><span class="page-links-title">' . __( 'Pages:', 'pacific' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php pacific_hook_entry_bottom(); ?>
	</div>
	<?php pacific_hook_entry_after(); ?>
	<?php the_tags( '<div class="tags-links">', __( ' ', 'pacific' ), '</div>' ); ?>
</article>
	<?php if ( $author_postbox ) : ?>
		<?php get_template_part( 'author-bio' ); ?>
	<?php endif; ?>