				<?php if ( apply_filters( 'show_flat_credits', true ) ) { ?>
					<div class="site-info">
						<?php do_action( 'flat_credits' ); ?>
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'flat' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'flat' ); ?>"><?php printf( __( 'Proudly powered by %s', 'flat' ), 'WordPress' ); ?></a>.
						<?php printf( __( 'Theme: %1$s by %2$s.', 'flat' ), 'Flat', '<a href="'.esc_url( 'http://www.yoarts.com/' ).'" title="'.esc_attr( 'Webmaster Tutorials & Resources' ).'">YoArts</a>' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
