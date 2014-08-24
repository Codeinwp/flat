<?php
$roots_includes = array(
	'inc/init.php',
	'inc/scripts.php',
	'inc/customize.php',
	'inc/template-tags.php',
);

foreach ( $roots_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'flat' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath ); ?>
