<div class="author-info" itemprop="author" itemscope itemtype="http://schema.org/Person">
	<div class="author-avatar" itemprop="image">
		<?php echo wp_kses( str_replace( '/>', 'itemprop=\'image\' />', get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'flat_author_bio_avatar_size', 80 ) ) ), array( 'img' => array( 'src' => array(), 'itemprop' => array(), 'alt' => array(), 'class' => array(), 'height' => array(), 'width' => array() ) ) ); ?>
	</div>
	<div class="author-description">
		<h4><?php printf( __( 'About <span itemprop="name">%s</span>', 'flat' ), get_the_author() ); ?></h4>
		<p>
			<?php $author_description = wptexturize( get_the_author_meta( 'description' ) ); ?>
			<span itemprop="description"><?php echo wp_kses( $author_description, wp_kses_allowed_html( 'pre_user_description' ) ); ?></span>
			<a itemprop="url" class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'flat' ), get_the_author() ); ?>
			</a>
		</p>
	</div>
</div>
