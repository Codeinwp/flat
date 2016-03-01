<?php
/**
 * The template for displaying the footer
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}
?>
			<?php if ( apply_filters( 'show_pacific_credits', true ) ) : ?>
				<?php pacific_hook_footer_before(); ?>
				<footer class="site-info" itemscope itemtype="http://schema.org/WPFooter">
					<?php pacific_hook_footer_top(); ?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'pacific' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'pacific' ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'pacific' ), 'WordPress' ); ?></a>.
					<?php printf( esc_html__( 'Theme: %1$s %2$s by %3$s.', 'pacific' ), 'pacific', esc_html( wp_get_theme( get_template() )->get( 'Version' ) ), '<a href="' . esc_url( 'https://rickbeckman.com/' ).'" title="' . esc_attr__( 'Pacific WordPress Theme' ).'">Rick Beckman</a>' ); ?>
				</footer>
				<?php pacific_hook_footer_after(); ?>
			<?php endif; ?>
				<?php pacific_hook_content_bottom(); ?>
			</div>
			<?php pacific_hook_content_after(); ?>
		</div>
	</div>
</div>
<?php pacific_hook_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>