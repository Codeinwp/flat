<?php get_header(); ?>
			<h1 class="page-title">
				<?php
				if ( is_category() ) :
					printf( __( 'Category: %s', 'flat' ), single_cat_title( '', false ) );

				elseif ( is_tag() ) :
					printf( __( 'Tag: %s', 'flat' ), single_tag_title( '', false ) );

				elseif ( is_author() ) :

					the_post();
					printf( __( 'Author: %s', 'flat' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
					
					rewind_posts();

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'flat' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'flat' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'flat' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'flat' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'flat');

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'flat' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'flat' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'flat' );

				else :
					_e( 'Archives', 'flat' );

				endif;
				?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
			<?php if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 80 ) ); ?>
				</div>
				<div class="author-description">
					<h4><?php printf( __( 'About %s', 'flat' ), get_the_author() ); ?></h4>
					<p>
						<?php the_author_meta( 'description' ); ?>
					</p>
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