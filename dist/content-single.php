<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php $single_metadata = flat_get_theme_option( 'single_metadata' ); ?>
		<?php if ( empty( $single_metadata ) ) : ?>
			<div class="entry-meta"><?php flat_entry_meta(); ?></div>
		<?php endif; ?>
	</header>
	<?php $single_featured_image = flat_get_theme_option( 'single_featured_image' ); ?>
	<?php if ( has_post_thumbnail() && ! post_password_required() && empty( $single_featured_image ) ) : ?>
		<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
	<?php endif; ?>

	<?php flat_hook_entry_before(); ?>

	<div class="entry-content">
		<?php flat_hook_entry_top(); ?>
		<?php the_content( __( 'Continue reading', 'flat' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'flat' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php flat_hook_entry_bottom(); ?>
	</div>
	<?php flat_hook_entry_after(); ?>
	<?php the_tags( '<div class="tags-links">', __( ' ', 'flat' ), '</div>' ); ?>
</article>
	<?php $single_author_box = flat_get_theme_option( 'single_author_box' ); ?>
	<?php if ( get_the_author_meta( 'description' ) && empty( $single_author_box ) ) : ?>
		<?php get_template_part( 'author-bio' ); ?>
	<?php endif; ?>
