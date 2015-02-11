<?php get_header(); ?>
	<section id="content" class="site-content error-404 not-found" role="main">
		<header>
			<h2 class="page-title"><?php echo esc_html( apply_filters( 'flat_404_title', __( 'Not Found', 'flat' ) ) ); ?></h2>
		</header>
		<div class="page-content">
			<?php flat_hook_404_content(); ?>
		</div>
	</section>
<?php get_footer(); ?>
