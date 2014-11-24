<?php

/**
 * List of included files
 */
$flat_includes = array(
	'inc/init.php',
	'inc/scripts.php',
	'inc/customize.php',
	'inc/template-tags.php',
);

/**
 * Include necessary files
 */
foreach ( $flat_includes as $file ) {
	if ( ! $filepath = locate_template( $file, true ) ) {
		trigger_error( sprintf( __( 'Error locating <b>%s</b> for inclusion', 'flat' ), $file ), E_USER_ERROR );
	}
}

# Cleanup variables
unset( $file, $filepath ); ?>