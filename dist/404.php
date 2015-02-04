<?php get_header(); ?>
	<?php do_action( 'tha_entry_before' ); ?>
	<div id="content" class="site-content" role="main">
		<?php do_action( 'tha_entry_top' ); ?>
		<h2 class="page-title"><?php _e( 'Not Found', 'flat' ); ?></h2>
		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'flat' ); ?></p>
			<?php get_search_form(); ?>
		</div>
		<?php do_action( 'tha_entry_bottom' ); ?>
	</div>
	<?php do_action( 'tha_entry_after' ); ?>
<?php get_footer(); ?>