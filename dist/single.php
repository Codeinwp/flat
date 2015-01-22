<?php get_header(); ?>

			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php flat_post_nav(); ?>

				<?php comments_template(); ?>
				
			<?php endwhile; ?>

			</div>

<?php get_footer(); ?>