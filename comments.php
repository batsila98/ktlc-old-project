<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ktlc
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="commentsArea">
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="commentsArea__title">
			<?php
			$ktlc_comment_count = get_comments_number();
			if ( '1' === $ktlc_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'ktlc' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $ktlc_comment_count, 'comments title', 'ktlc' ) ),
					number_format_i18n( $ktlc_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<div class="commentsArea__comments">
			<?php
			wp_list_comments( 'type=comment&callback=ktlc_comments_list' );
			wp_list_comments( 'type=pings&callback=ktlc_comments_list' );
			?>
		</div>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="commentsArea__noComments"><?php esc_html_e( 'Comments are closed.', 'ktlc' ); ?></p>
			<?php
		endif;

	endif;
	?>

	<?php comment_form(
		array(
			'class_container'    => 'commentForm',
			'class_form'         => 'commentForm__form',
			'title_reply_before' => '<h3 id="reply-title" class="commentForm__title">',
		)
	); ?>
</div>
