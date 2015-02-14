<?php get_header(); ?>
			<div id="content" class="site-content" role="main" itemscope itemtype="http://schema.org/Article">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'single' );

				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'flat' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'flat' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'flat' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'flat' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );

				comments_template();
			endwhile;
			?>
			</div>
<?php get_footer(); ?>