<div class="author-info">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 80 ) ); ?>
	</div>
	<div class="author-description">
		<h4><?php printf( __( 'About %s', 'flat' ), get_the_author() ); ?></h4>
		<p>
			<?php $author_description = apply_filters( 'the_content', get_the_author_meta( 'description' ) ); ?>
			<?php echo wp_kses( $author_description, wp_kses_allowed_html( 'pre_user_description' ) ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'flat' ), get_the_author() ); ?>
			</a>
		</p>
	</div>
</div>
