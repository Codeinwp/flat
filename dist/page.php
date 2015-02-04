<?php get_header(); ?>
			<?php tha_entry_before(); ?>
			<div id="content" class="site-content" role="main">
				<?php tha_entry_top(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">...</span>', 'flat' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'flat' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div>
				</article>
				<?php comments_template(); ?>
			<?php endwhile; ?>
				<?php tha_entry_bottom(); ?>
			</div>
			<?php tha_entry_after(); ?>
<?php get_footer(); ?>
