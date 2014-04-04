<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'flat' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php endif; ?>
        <?php if ( flat_show_metadata(is_single()) ) : ?>
            <div class="entry-meta">
                <?php flat_entry_meta(); ?>
            </div>
        <?php endif; ?>
	</header>

	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<?php if ( ! is_single() && flat_get_theme_option('archive_featured_image') == '1' ) { ?>
			<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'flat' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></div>
		<?php } else if ( is_single() && flat_get_theme_option('single_featured_image') == '1' ) { ?>
			<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
		<?php } ?>
  <?php endif; ?>

	<?php if ( is_search() || ( !is_single() && flat_get_theme_option('archive_content') == '0' ) ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading', 'flat' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'flat' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div>
	<?php endif; ?>

	<?php
	$tag_list = get_the_tag_list( '', __( ' ', 'flat' ) );
	if ( $tag_list && is_single() ) {
		echo '<div class="tags-links">' . $tag_list . '</div>';
	} ?>
</article>

<?php if ( is_single() && get_the_author_meta( 'description' ) && flat_get_theme_option('single_author_box') == '1' ) : ?>
	<?php get_template_part( 'author-bio' ); ?>
<?php endif; ?>