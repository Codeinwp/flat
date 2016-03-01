<?php
/**
 * Template for no content being found
 *
 * Used when accessing empty archives, null searches, or for when there is no
 * public content whatsoever to display (while not strictly being a "404 Not
 * Found" error.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}
?>
<h2 class="page-title">
<?php
if ( is_home() && current_user_can( 'publish_posts' ) ) :
	esc_html_e( 'Welcome to Your WordPress Site', 'pacific' );
else :
	echo esc_html( apply_filters( 'pacific_404_title', __( 'Not Found', 'pacific' ) ) );
endif;
?></h2>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php esc_html_e( 'Looks like there aren&apos;t any public posts to show. Ready to publish your first post?', 'pacific' ); ?></p>
	<p><a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php if ( is_rtl() ) : ?><i class="fa fa-angle-double-left"></i> <?php endif; esc_html_e( 'Get started here', 'pacific' ); if ( ! is_rtl() ) : ?> <i class="fa fa-angle-double-right"></i><?php endif; ?></a></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pacific' ); ?></p>

	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pacific' ); ?></p>

	<?php get_search_form(); ?>

	<?php endif; ?>
</div>