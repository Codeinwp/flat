<?php get_header(); ?>
	<div id="content" class="site-content" role="main">
		<h1 class="page-title"><?php _e( 'Not Found', 'flat' ); ?></h1>
		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'flat' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php get_footer(); ?>
