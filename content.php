<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'flat' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; ?>
		<div class="entry-meta">
			<?php flat_entry_meta(); ?>
		</div>
	</header>

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">...</span>', 'flat' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'flat' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div>
	<?php endif; ?>

	<?php
	$tag_list = get_the_tag_list( '', __( ', ', 'flat' ) );
	if ( $tag_list && is_single() ) {
		echo '<i class="icon-tag"></i> <span class="tags-links">' . $tag_list . '</span>';
	} ?>
</article>

<?php if ( is_single() && get_the_author_meta( 'description' ) ) : ?>
	<?php get_template_part( 'author-bio' ); ?>
<?php endif; ?>