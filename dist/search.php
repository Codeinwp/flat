<?php get_header(); ?>
	<?php flat_hook_search_before(); ?>
	<div id="content" class="site-content" role="main">
		<?php flat_hook_search_top(); ?>

	<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'flat' ), get_search_query() ); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php flat_paging_nav(); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>

		<?php flat_hook_search_bottom(); ?>
	</div>
	<?php flat_hook_search_after(); ?>
<?php get_footer(); ?>