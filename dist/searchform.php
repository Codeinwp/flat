<?php
/**
 * Search form display
 *
 * Replaces WordPress' default search form to ensure continuity with Flat's styling.
 *
 * @package Flat
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}
?>
	<form method="get" role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'flat' ); ?></label>
		<input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'flat' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_x( 'Search', 'submit button', 'flat' ); ?>" />
	</form>