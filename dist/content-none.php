<h2 class="page-title"><?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) :
		esc_html_e( 'Welcome to Your WordPress Site', 'flat' );
	else :
		echo esc_html( apply_filters( 'flat_404_title', __( 'Not Found', 'flat' ) ) );
	endif;
?></h2>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php esc_html_e( 'Looks like there aren&apos;t any public posts to show. Ready to publish your first post?', 'flat' ); ?></p>
	<p><a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php if ( is_rtl() ) : ?><i class="fa fa-angle-double-left"></i> <?php endif; esc_html_e( 'Get started here', 'flat' ); if ( ! is_rtl() ) : ?> <i class="fa fa-angle-double-right"></i><?php endif; ?></a></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'flat' ); ?></p>

	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'flat' ); ?></p>

	<?php get_search_form(); ?>

	<?php endif; ?>
</div>