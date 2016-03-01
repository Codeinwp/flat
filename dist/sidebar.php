<?php
/**
 * Sidebar display
 *
 * Displays the sidebar, using a couple default widgets if no dynamic ones are set.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}

pacific_hook_sidebar_before();
?>
					<div id="main-sidebar" class="widget-area" role="complementary">
						<?php pacific_hook_sidebar_top(); ?>
<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

						<aside id="archives" class="widget">
							<h3 class="widget-title"><?php _e( 'Archives', 'pacific' ); ?></h3>
							<ul>
								<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
							</ul>
						</aside>

						<aside id="meta" class="widget">
							<h3 class="widget-title"><?php _e( 'Meta', 'pacific' ); ?></h3>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<?php wp_meta(); ?>
							</ul>
						</aside>

<?php endif; ?>
						<?php pacific_hook_sidebar_bottom(); ?>
					</div>
<?php pacific_hook_sidebar_after(); ?>