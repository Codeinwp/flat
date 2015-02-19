<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'flat' ); ?></h1>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( esc_html__( 'Ready to publish your first post? %s', 'flat' ), printf( '<a href="%s">' . esc_html__( 'Get started here', 'flat' ) . '</a>', esc_url( admin_url( 'post-new.php' ) ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'flat' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'flat' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div>