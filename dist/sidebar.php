<?php
/**
 * Sidebar display
 *
 * Displays the sidebar, using a couple default widgets if no dynamic ones are set.
 *
 * @package Flat
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	die();
}

flat_hook_sidebar_before();
?>
					<div id="main-sidebar" class="widget-area" role="complementary">
						<?php flat_hook_sidebar_top(); ?>
<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

						<aside id="archives" class="widget">
							<h3 class="widget-title"><?php _e( 'Archives', 'flat' ); ?></h3>
							<ul>
								<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
							</ul>
						</aside>

						<aside id="meta" class="widget">
							<h3 class="widget-title"><?php _e( 'Meta', 'flat' ); ?></h3>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<?php wp_meta(); ?>
							</ul>
						</aside>

<?php endif; ?>
						<?php flat_hook_sidebar_bottom(); ?>
					</div>
<?php flat_hook_sidebar_after(); ?>