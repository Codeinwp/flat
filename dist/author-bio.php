<?php
/**
 * Author bio box
 *
 * Used to display a bit about the author, re-used in various templates.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}
?>
<div class="author-info" itemprop="author" itemscope itemtype="http://schema.org/Person">
	<div class="author-avatar" itemprop="image">
		<?php echo wp_kses( str_replace( '/>', 'itemprop=\'image\' />', get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'pacific_author_bio_avatar_size', 80 ) ) ), array( 'img' => array( 'src' => array(), 'itemprop' => array(), 'alt' => array(), 'class' => array(), 'height' => array(), 'width' => array() ) ) ); ?>
	</div>
	<div class="author-description">
		<h4><?php printf( esc_html__( 'About %s', 'pacific' ), '<span itemprop="name">' . get_the_author() . '</span>' ); ?></h4>
		<p>
			<?php $author_description = wptexturize( get_the_author_meta( 'description' ) ); ?>
			<span itemprop="description"><?php echo wp_kses( $author_description, wp_kses_allowed_html( 'pre_user_description' ) ); ?></span>
			<a itemprop="url" class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php
					# translators: 1: Author name, 2: Arrow icon
					printf( esc_html__( 'View all posts by %1$s %2$s', 'pacific' ), get_the_author(), '<i class="fa fa-angle-double-right meta-nav"></i>' );
				?>
			</a>
		</p>
	</div>
</div>