<?php
/**
 * Static page display
 *
 * For entries outside of the "blog" chronology, this template will be used.
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
			<?php pacific_hook_page_before(); ?>
			<div itemscope itemtype="http://schema.org/Article" id="content" class="site-content" role="main">
				<?php pacific_hook_page_top(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
					</header>
					<?php pacific_hook_entry_before(); ?>
					<div class="entry-content" itemprop="articleBody">
						<?php pacific_hook_entry_top(); ?>
						<?php the_content( __( 'Continue reading<span class="meta-nav">&hellip;</span>', 'pacific' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pacific' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						<?php pacific_hook_entry_bottom(); ?>
					</div>
					<?php pacific_hook_entry_after(); ?>
				</article>
				<?php comments_template(); ?>
			<?php endwhile; ?>

				<?php pacific_hook_page_bottom(); ?>
			</div>
			<?php pacific_hook_page_after(); ?>
<?php get_footer(); ?>