<?php
/**
 * Comments display & submission form
 *
 * Handles entry feedback by displaying comments and the comment submission form.
 *
 * @package Pacific
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}

if ( post_password_required() || ! comments_open() ) {
	return;
}
?>

<?php pacific_hook_comments_before(); ?>

<div id="comments" class="comments-area">

	<?php pacific_hook_comments_top(); ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php comments_number( __( '<span itemprop="interactionCount">0</span> comment', 'pacific' ), __( '<span itemprop="interactionCount">1</span> comment', 'pacific' ), __( '<span itemprop="interactionCount">%</span> comments', 'pacific' ) ); ?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( apply_filters( 'pacific_list_comments_parameters', array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 80,
				) ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'pacific' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pacific' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pacific' ) ); ?></div>
		</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'pacific' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form( apply_filters( 'pacific_comment_form_parameters', array() ) ); ?>

	<?php pacific_hook_comments_bottom(); ?>

</div>

<?php pacific_hook_comments_after(); ?>