<?php get_header(); ?>

	<h1 class="page-title">
		<?php if ( is_category() ) : ?>
			<?php printf( __( 'Category: %s', 'flat' ), single_cat_title( '', false ) ); ?>
		<?php elseif ( is_tag() ) : ?>
			<?php printf( __( 'Tag: %s', 'flat' ), single_tag_title( '', false ) ); ?>
		<?php elseif ( is_author() ) : ?>
			<?php
				the_post();
				printf( __( 'Author: %s', 'flat' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
				rewind_posts();
			?>
		<?php elseif ( is_day() ) : ?>
			<?php printf( __( 'Day: %s', 'flat' ), '<span>' . get_the_date() . '</span>' ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Month: %s', 'flat' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Year: %s', 'flat' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
		<?php elseif ( is_tax( 'post_format', 'post-format-aside' ) ) : ?>
			<?php _e( 'Asides', 'flat' ); ?>
		<?php elseif ( is_tax( 'post_format', 'post-format-image' ) ) : ?>
			<?php _e( 'Images', 'flat' ); ?>
		<?php elseif ( is_tax( 'post_format', 'post-format-video' ) ) : ?>
			<?php _e( 'Videos', 'flat' ); ?>
		<?php elseif ( is_tax( 'post_format', 'post-format-quote' ) ) : ?>
			<?php _e( 'Quotes', 'flat' ); ?>
		<?php elseif ( is_tax( 'post_format', 'post-format-link' ) ) : ?>
			<?php _e( 'Links', 'flat' ); ?>
		<?php else : ?>
			<?php _e( 'Archives', 'flat' ); ?>
		<?php endif; ?>
	</h1>

	<?php $term_description = term_description(); ?>

	<?php if ( ! empty( $term_description ) ) : ?>
		<?php printf( '<div class="taxonomy-description">%s</div>', $term_description ); ?>
	<?php endif; ?>

	<?php if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 80 ) ); ?>
			</div>
			<div class="author-description">
				<h4><?php printf( __( 'About %s', 'flat' ), get_the_author() ); ?></h4>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php flat_paging_nav(); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
	</div>

<?php get_footer(); ?>
