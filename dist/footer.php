<?php
/**
 * The template for displaying the footer
 */
?>
			<?php if ( apply_filters( 'show_flat_credits', true ) ) : ?>
				<?php flat_hook_footer_before(); ?>
				<footer class="site-info">
					<?php flat_hook_footer_top(); ?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'flat' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'flat' ); ?>"><?php printf( __( 'Proudly powered by %s', 'flat' ), 'WordPress' ); ?></a>.
					<?php printf( __( 'Theme: %1$s %2$s by %3$s.', 'flat' ), 'Flat', wp_get_theme()->get( 'Version' ), '<a href="'.esc_url( 'http://www.yoarts.com/blog/wordpress/free-flat-design-wordpress-theme.html' ).'" title="'.esc_attr( 'Flat WordPress Theme' ).'">YoArts</a>' ); ?>
				</footer>
				<?php flat_hook_footer_after(); ?>
			<?php endif; ?>
				<?php flat_hook_content_bottom(); ?>
			</div>
			<?php flat_hook_content_after(); ?>
		</div>
	</div>
</div>
<?php flat_hook_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>