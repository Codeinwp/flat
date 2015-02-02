<?php get_header(); ?>
			<div id="content" class="site-content" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'single' );

				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'flat' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'flat' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'flat' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'flat' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );

				comments_template();
			endwhile;
			?>
			</div>
<?php get_footer(); ?>
