<?php
/**
 * 404 Content Not Found template
 *
 * Used when users get lost along the way.
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
<section id="content" class="site-content error-404 not-found" role="main">
	<header>
		<h2 class="page-title"><?php echo esc_html( apply_filters( 'pacific_404_title', __( 'Not Found', 'pacific' ) ) ); ?></h2>
	</header>
	<div class="page-content">
		<?php pacific_hook_404_content(); ?>
	</div>
</section>
<?php get_footer(); ?>